<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
$parametry = array();

//$users = array(
//    array('jan','kowalski',1),
//    array('ryszard','kowalski',1)
//);
$users = file(PRIV_RES_DIR.DS.'users.txt');
for($i=0;$i<count($users);$i++)
{
    $users[$i] = explode("§", $users[$i]);
}

/**
 * 
 * @param type $users tablica uzytkowników
 * @return int 0 - zalogowano, 1- nie wysłano danych, 2-błędne hasło/user
 */
function zaloguj($users)
{
    if(isset($_SERVER['PHP_AUTH_USER'])&&strlen($_SERVER['PHP_AUTH_USER'])>0)
    {
        foreach($users as $user)
        {
            if(strcasecmp($user[0],$_SERVER['PHP_AUTH_USER']))
            {
                 
                if(hash('sha256', \Config\Config::$salt.$_SERVER['PHP_AUTH_PW'].\Config\Config::$salt) == $user[1])
                {
                    return 0;
                }
                else
                {
                    return 2;
                    
                }
            }
            
        }
        
        return 2;

    }
    else
    {
        
        return 1;
    }
}

$parametry['logowanie'] = zaloguj($users);

if ($parametry['logowanie']==1 || $parametry['logowanie']==2)
{
    header('WWW-Authenticate:Basic Realm="Tajneee! Zaloguj się lub nie!"');
    header('HTTP/1.0 401 Unauthorized');
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
        
        $this->description = "Serwer";
        $this->title = "Serwer";
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
               
               echo 'twój nr ip: '.$_SERVER['REMOTE_ADDR'].'<br>';
               echo 'nazwa serwera: '.$_SERVER['SERVER_NAME'].'<br>';
               echo 'skrypt: '.$_SERVER['PHP_SELF'].'<br>';
               
               if($this->dane['logowanie']==0)
               {
                   echo "<h2>Zalogowano!</h2>";
               }
               else if($this->dane['logowanie']==2)
               {
                   echo "<h2>Błędne Dane!!!</h2>";
               }
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