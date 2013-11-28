<?php
function licznik()
{
    $filename = 'licznik.txt';
    if(!is_dir(PRIV_RES_DIR))
        mkdir (PRIV_RES_DIR);
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

$parametry['txt_wszystkie'] = array(
    '01len' => array(
        'file' => '01.txt',
        'title'=> 'Leń',
        'autor'=> 'Jan Brzechwa'
    ),
    '02kruklis' => array(
        'file' => '02.txt',
        'title'=> 'Kruk i lis',
        'autor'=> 'Jean de La Fontaine'
    ),
    '03romantycznosc' => array(
        'file' => '03.txt',
        'title'=> 'ROMANTYCZNOŚĆ',
        'autor'=> 'Mickiewicz'
    ),
    '04wstepdobajek' => array(
        'file' => '04.txt',
        'title'=> 'Wstęp do bajek',
        'autor'=> 'Ignacy Krasicki'
    ),
    '05' => array(
        'file' => '05.txt',
        'title'=> 'O wiośnie',
        'autor'=> 'Ewa Zawadzka'
    ),
    '06' => array(
        'file' => '06.txt',
        'title'=> 'Pierwszy kwiat wiosny',
        'autor'=> 'Stefania Kossuth'
    ),
    '07' => array(
        'file' => '07.txt',
        'title'=> 'Wiosna',
        'autor'=> 'Joanna Kulmowa'
    ),
    '08' => array(
        'file' => '08.txt',
        'title'=> 'Skąpiec',
        'autor'=> 'Fontaine La de Jean'
    ),
    '09' => array(
        'file' => '09.txt',
        'title'=> 'Bajka',
        'autor'=> 'Baczyński Krzysztof Kamil'
    ),
    '10' => array(
        'file' => '10.txt',
        'title'=> 'Idź',
        'autor'=> 'Wiedźma Marta'
    ),
   
);

if(isset($_POST['wyslano']) || (isset($_GET['wiersz']) && strlen(trim($_GET['wiersz']))>0) ) {
    $parametry['wyslano']=true;
    $wiersz = isset($_POST['wyslano']) ? (isset($_POST['wiersz']) ? $_POST['wiersz'] : null ) : trim($_GET['wiersz']);
    if($wiersz!=null) {
        $wybor;
        if(isset($parametry['txt_wszystkie'][$wiersz]))
        {
            $jest=true;
            $wybor = $parametry['txt_wszystkie'][$wiersz];
            $parametry['txt_wybrany']=$wybor;
        }
        else
        {
            $jest = false;
        }
        
        
        
        if($jest)
        {
            if(is_file(PUB_RES_DIR.DS.'zphp07'.DS.$wybor['file']))
            {
                $file = fopen(PUB_RES_DIR.DS.'zphp07'.DS.$wybor['file'],"r");
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

class Php07plikiView extends inc\ViewBasic {
    function __construct($data) {
        $this->dane = $data;
    }
    
    public $description = "Obługa plików w php";
    public $title = "Obługa plików w php";
    
    public function write()
    {
        ?>
<section class="block-block"><header class="block-top"><?php ?>
    </header>
    <div class="block-contents">
        <?php
        echo '<form action="'.gen_link_var("str","php07pliki").'" method="post" >';
        foreach($this->dane['txt_wszystkie'] as $key => $value)
        {
                echo '<input type="radio" name="wiersz" value="'.$key.'" id="'.$key.'"> '
        . '<label for"'.$key.'"> <span>"'.$value['title'].'"</span> <i>'.$value['autor'].'</i></label><br />';
        }
                echo ' <input type="submit" name="wyslano" value="Wyślij" />'
                . '</form>';
        
                if($debug)
                {
                    echo '<br><br>Debug:';
                    var_dump($_POST);
                    echo '<br>'; 
                }
        
        if($this->dane['wyslano'])
        {
            if( isset($this->dane['txt_wybrany']['title']))
            {
                echo '<h2 id="wiersz-title">'.$this->dane['txt_wybrany']['title'].' <i id="wiersz-autor"> '.$this->dane['txt_wybrany']['autor'].'</i></h2>';
                
            }
            if( isset($this->dane['wiersz']))
            {
                echo '<p id="wiersz-wiersz">'.nl2br(preg_replace("/\\n\\n/","\n",$this->dane['wiersz'])).'</p>';
                
            }
            if (isset($this->dane['error']))
            {
                echo '<p class="error"> '.$this->dane['error'].'</p>';
            }
        }
        echo "<hr />";
        echo 'odwiedzin: '.$this->dane['licznik'];
        echo "</div></div>";
    }//Koniec funkcji write
    
}//koniec widoku
if(isset($_GET['typ']) && $_GET['typ']=='json')
{
    header('Content-type: application/json');
    echo json_encode($parametry);
}
else
{
    $widok = new Php07plikiView($parametry);
    $klasa = CUR_THEME;
    $szablon = new $klasa($widok);
}
