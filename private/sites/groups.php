<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
//use sys\authentication\User;
use sys\authentication\UserLib;
$parametry = array();

$parametry['title'] = 'lista użytkowników';

$parametry['groups'] = UserLib::getGroups();
$parametry['res'] = 'groups';
            
    



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
        
        $this->description = "grupy";
        $this->title = "grupy";
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
<?php

    if(strcasecmp($this->dane['res'],"groups")===0)
    foreach ($this->dane['groups'] as $id => $group)
    {
        echo '<a href="'
                .System::$system->site->gen_link(array('str'=>'groups','group'=>$id))
                .'" >'.$id.". ".$group.'</a><br />'."\n";
    }
        

        
        



?>
        
    </div>
</article>
<?php
    }
}

System::$system->getWidok()->display(new CView($parametry));



?>