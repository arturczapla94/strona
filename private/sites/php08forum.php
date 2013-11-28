<?php

//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
$parametry = array();
$parametry['baned']=array('192.168.10.105', '192.168.10.19');

$plik = PRIV_RES_DIR.DS.'forum.txt';
    if(!is_dir(PRIV_RES_DIR))
        mkdir (PRIV_RES_DIR);
   
    if(is_writable(dirname($plik)) && !is_file($plik))
    {
        
        touch($plik);
    }

if(array_search($_SERVER['REMOTE_ADDR'], $parametry['baned'] )==false
        && isset($_POST['uwagi']) 
        && trim($_POST['uwagi'])!=false 
        && trim($_POST['uzytkownik'])!=false )
{
    $user = substr(trim(strip_tags($_POST['uzytkownik'])),0,40);
    $uwagi = nl2br(substr(trim(strip_tags($_POST['uwagi'])),0,1000));
    $dane = $user."§".$_SERVER['REMOTE_ADDR']."§".date("c")."§".$uwagi."\n";
    $file = fopen($plik, "a");
    flock($file, 2);
    fwrite($file,$dane);
    flock($file,3);
    fclose($file);

}

$tekst=file($plik);
$tekst=array_reverse($tekst);


$parametry['tekst']=$tekst;





//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////


class php08forumView extends \inc\ViewBasic {
    function __construct($widok) {
        $this->dane = $widok;
        $this->customHeaders = '<link rel="stylesheet" href="public/res/zphp08/php08forum.css" type="text/css" />';
        //    . '<script type="text/javascript" src=""> </script>';
        
        $this->description = "Forum";
        $this->title = "Forum";
        $this->header = "Forum";
    }
    
    
    public function write()
    {
        ?>
<section class="block-block"><header class="block-top"><?php echo $this->header; ?></header> <div class="block-contents">
    <?php
       if(array_search($_SERVER['REMOTE_ADDR'],$this->dane['baned'])==false)
       {
echo '<form action="'.gen_link_var("str","php08forum").'" enctype="multipart/form-data" method="post">'
         ?>
    <label for="uwagi">Uwagi:</label>
    <textarea name="uwagi" id="uwagi"></textarea><br />
    <label for="uzytkownik">Użytkownik:</label>
    <input type="text" name="uzytkownik" id="uzytkownik">
    <br />
    
    <input type="submit" name="submit" value="Zapisz" />
  
</form>
    <?php
       }
        else {
           echo '<h1>You are permanently baned for 10minutes! (reason: spam!)</h1>';
       }
        //var_dump($_SERVER);
        foreach($this->dane['tekst'] as $post )
        {
            $podzial = explode('§', $post, 4);
            echo '<hr />';
            echo '<strong>'.$podzial[0].'</strong><span>&nbsp;&nbsp;&nbsp;'.(isset($podzial[2]) ? $podzial[2] : '').' & '.(isset($podzial[1]) ? $podzial[1] : '').'<br>';
            echo '<span>'.trim($podzial[3]).'</span>';
            echo '</span>';
        }
        ?>
</div>
</section>
<?php
    }
    

}

$widok = new php08forumView($parametry);
$klasa = CUR_THEME;
$szablon = new $klasa($widok);



?>