<?php
function licznik()
{
    $filename = 'licznik.txt';
    $fileadress = PRIV_RES_DIR.DS.$filename;
    if(is_file($fileadress))
    {
        $file = fopen($fileadress,'r');
        $count = fgets($file, 101);
        fclose($file);
        
        $count+=1;
        
        $file = fopen($fileadress, "w");
        if(!flock($file, LOCK_EX)){
            fclose($file);
            return;
        }
        else { // Jeśli nie jest zablokowany, to następuje blokada i zapis danych
            fputs($file, $count);
            flock($file, LOCK_UN);
            fclose($file);
        }
        return $count;
    }
    else
    { // TWORZENIE PLIKU!
        $file = fopen($fileadress,'w');
        fputs($file, "1");
        fclose($file);
    }
    
}
$parametry = array();
$parametry['licznik'] = licznik();


if(isset($_POST['wyslano'])) {
    $parametry['wyslano']=true;
    if(isset($_POST['wiersz'])) {
        $wybor=$_POST['wiersz'];
        $jest = false;
        switch($wybor){
            case '01len' :
                $jest = true;
                $plik='01.txt';
                $parametry['title'] = "Leń";
                $parametry['autor'] = "Jan Brzechwa";
                break;
            case '02kruklis' :
                $jest = true;
                $plik='02.txt';
                $parametry['title'] = "Kruk i lis";
                $parametry['autor'] = "Jean de La Fontaine";
                break;
            default :
                $parametry['error'] = "Nie wybrano wiersza!";
        }
        
        if($jest)
        {
            if(is_file(PUB_RES_DIR.DS.'zphp07'.DS.$plik))
            {
                $file = fopen(PUB_RES_DIR.DS.'zphp07'.DS.$plik,"r");
                $parametry['wiersz'] = "";
                while(!feof($file))
                {
                    $linia = fgets($file);
                    $parametry['wiersz'].=$linia."\n";

                }
                fclose($file);
            }
            else
            {
                $parametry['error'] = "Nie znaleziono pliku!";
            }

        }
    }
    else
    {
        $parametry['error'] = "Nie zaznaczono!";
    }

}
else {
    $parametry['wyslano']=false;
}



//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////
include(PRIV_THEMES_DIR.DS.'RontaBlueTheme.php');

class Php07plikiView extends inc\ViewBasic {
    function __construct($data) {
        $this->dane = $data;
    }
    
    public $description = "Obługa plików w php";
    public $title = "Obługa plików w php";
    
    public function write()
    {
        echo '<form action="'.gen_link_var("str","php07pliki").'" method="post" >'
                . '<input type="radio" name="wiersz" value="01len" id="01len"> '
                . '<label for"01len"> <span>"Leń"</span> <i>Jan Brzechwa</i></label><br />'
                . '<input type="radio" name="wiersz" value="02kruklis" id="02kruklis"> '
                . '<label for"02kruklis"> <span>"Kruk i Lis"</span> <i>Jean de La Fontaine</i></label><br />'
                . ' <input type="submit" name="wyslano" value="Wyślij" />'
                . '</form>';
        
        
        
        if($this->dane['wyslano'])
        {
            if( isset($this->dane['title']))
            {
                echo '<h2>'.$this->dane['title'].' <i> '.$this->dane['autor'].'</i></h2>';
                
            }
            if( isset($this->dane['wiersz']))
            {
                echo '<p>'.nl2br(preg_replace("/\\n\\n/","\n",$this->dane['wiersz'])).'</p>';
                
            }
            if (isset($this->dane['error']))
            {
                echo '<p class="error"> '.$this->dane['error'].'</p>';
            }
        }
        echo "<hr />";
        echo 'odwiedzin: '.$this->dane['licznik'];
        if ($this->dane['licznik'] % 10 == 0 )
        {
            echo " wow, strona taka popularna!";
        }
        
    }//Koniec funkcji write
    
}//koniec widoku

$widok = new Php07plikiView($parametry);
$szablon = new RontaBlueTheme($widok);

