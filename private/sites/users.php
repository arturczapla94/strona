<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
//use sys\authentication\User;
use sys\authentication\UserLib;
$parametry = array();

System::$globalParameters[]='action';


$parametry['title'] = 'lista użytkowników';

$parametry['users'] = UserLib::getAllUsersSimple();
$parametry['res'] = 'ok';
            
    



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
. <<<EOT
<style>
   
</style>
EOT;
        
        $this->description = $this->dane['title'];
        $this->title = $this->dane['title'];
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
<?php

    foreach ($this->dane['users'] as $user)
    {
        echo '<a href="'
                .System::$system->site->gen_link(array('str'=>'profil','u'=>$user['name']))
                .'" >'.$user['displayname'].'('.$user['name'].')</a> ['.$user['groupname'].'] <br />'."\n";
    }
        

        
        



?>
        
    </div>
</article>
<?php
    }
}

System::$system->getWidok()->display(new CView($parametry));



?>