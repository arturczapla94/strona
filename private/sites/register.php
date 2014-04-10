<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////

$parametry = array();

$parametry['msg'] = "";
$parametry['submit']='non';
if(isset($_POST['submit']) && strcasecmp($_POST['submit'],"sent")==0 )
{
    $parametry['submit']='sent';
    $user   = $_POST['name'];
    $dn     = $_POST['displayname'];
    $email  = $_POST['email'];
    $passwd = $_POST['password'];
    $hash   = $_POST['hash'];
    if(strlen($user)> 2 && strlen($passwd)>0)
    {
        
        if (sys\authentication\UserLib::createUser($user, $passwd, $hash, $email, $dn))
        {
            $parametry['res'] = "ok";
        }
        else
        {
            $parametry['res'] = "error";
        }
    }
    else
    {
        $parametry['res'] = "error";
    }
    
}
//$parametry['res'] = 'ok';
            
    



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
   form#f1 label {
                display: inline-block;
                width:150px;
                }
</style>
EOT;
        
        $this->description = "Rejestracja";
        $this->title = "Rejestracja";
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
<?php

if($this->dane['submit']!='sent' || $parametry['res'] == "error" )
{
    if($parametry['res'] == "error")
    {
        echo "<h3>błąd!</h3>";
    }


echo  ' <form name="f1" id="f1" action="'
        .System::$system->site->gen_link(array('str'=>'register'))
        .'" method="post" > '
. <<<EOT
        <fieldset style="border:none">
        <label for="name">Nazwa użytkownika: </label><input type="text" name="name" id="name" /><br>
        <label for="displayname">Nazwa wyświetlana: </label><input type="text" name="displayname" id="displayname" /><br>
        <label for="email">E-mail: </label><input type="text" name="email" id="email" /><br>
        <label for="password">Hasło: </label><input type="password" name="password" id="password" /><br>
        <label for="hash">Algorytm hashujący: </label>
        <select name="hash" id="hash" >
            <option value="md5" > md5 </option>
            <option value="sha1" > sha1 </option>
            <option selected="selected" value="sha256" > sha256 </option>
            <option value="whirlpool" > whirlpool </option>
            <option value="tiger192,3" > tiger192,3 </option>
            <option value="haval128,4" > haval128,4  </option>
        </select><br>
        <button type="submit" name="submit" value="sent" >Wyślij</button>
        </fieldset>
    </form>
EOT;
        
}
 else {
    echo "Utworzono nowego użytkownika!";
}
        
        



?>
        
    </div>
</article>
<?php
    }
}

System::$system->getWidok()->display(new CView($parametry));



?>