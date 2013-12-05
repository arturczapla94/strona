<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
$parametry = array();

if(!isset($_COOKIE['wizyta']))
{
    setcookie('wizyta',time(),time()+30*86400);
    $parametry['wizyta']= "witaj gościu!<br>";
    
}
else
{
    $parametry['wizyta']= "witaj, ostatnio odwiedziłeś nas: "
    .date('d.m.Y, H:i',$_COOKIE['wizyta'])."<br>";
    setcookie('wizyta',time(),time()+30*86400);
}


//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////

class CView extends inc\ViewBasic {
    function __construct($widok) {
        $this->dane = $widok;
        $this->customHeaders = '' //'<link rel="stylesheet" href="public/res/zhome/home.css" type="text/css" />'
            //. '<script type="text/javascript" src="public/res/zhome/home.js"> </script>'
                . '';
        
        $this->description = "Cookie";
        $this->title = "Cookie";
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
        
        <div class="news-in2">
            <div class="news-tags">

            </div> 
            <section class="news-content">
               <?php
               echo "<h3>".$this->dane['wizyta']."</h3>";
               
               echo '<h4>Id sesji:'.  session_id().'</h4>';
               
               echo 'twój nr ip: '.$_SERVER['REMOTE_ADDR'].'<br>';
               echo 'nazwa serwera: '.$_SERVER['SERVER_NAME'].'<br>';
               echo 'skrypt: '.$_SERVER['PHP_SELF'].'<br>';
               
               
               ?>
            </section>
        </div>
    </div>
</article>
<?php
    }
}

$widok = new CView($parametry);
$klasa = CUR_THEME;
$szablon = new $klasa($widok);



?>