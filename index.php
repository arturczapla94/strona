<?php
date_default_timezone_set("Europe/Warsaw");
require_once('private/config.php');
require_once('private/inc.php');
if(!isset($_GET['str']) )
{
    $_GET['str']='home';
    include('private/sites/'.$_GET['str'].'.php');
}
else {
    if(preg_match('/^[0-9a-zA-Z_-]+$/D', $_GET['str']) )
    {
        if(is_file('private/sites/'.$_GET['str'].'.php'))
        {
            include('private/sites/'.$_GET['str'].'.php');
        }
        else
        {
            echo "<strong>Strona nie istnieje!!!!!</strong>";
        }
    }
    else
    {
        echo "<strong>Strona nie istnieje!!!!!</strong>";
    }
}	

?>
