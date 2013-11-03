<?php
namespace index;
date_default_timezone_set("Europe/Warsaw");
$debug=false;
if(isset($_GET['debug']) && $_GET['debug']==1)
{ //Włącz debugowanie
    $debug=true;
    ini_set('display_errors',1);
    error_reporting(E_ALL);
}
else
{ //debugowanie wyłączone
    ini_set('display_errors',0);
    error_reporting(0);
}
require_once('private/config.php');
require_once('private/inc.php');

define('BASEDIR',__DIR__);
define('DS',DIRECTORY_SEPARATOR);
define('PRIV_DIR',BASEDIR.DS.'private');

if(empty($_GET['str']) )
{
    $_GET['str']=Config::$startPage;
    include('private/sites/'.$_GET['str'].'.php');
}
else {
    $matches;
    if(preg_match('/^([a-zA-Z_]+[0-9a-zA-Z_]*)-/D', $_GET['str'], $matches) )
    {//JEŻELI specjalna strona lub kontroler
        if(strpos($matches[1],"c")===0)
        { //JEŻELI zaczyna się od "c" - KONTROLER
            $files = scandir(PRIV_DIR.DS.'apps');
            foreach($files as $file)
            {
                if($file=='.' || $file=='..')
                {
                    continue;
                }
                $currentAppDir =PRIV_DIR.DS.'apps'.DS.$file;
                $id = $matches[1];
                $controllerName = $file.'Controller';
                if(is_dir($currentAppDir) && strpos($file,$matches[1])===0 && is_file($currentAppDir.DS.$controllerName.'.php'))
                {
                    include $currentAppDir.DS.$file.'Controller.php';
                    //TODO:
                    // tworzenie klasy!
                    break;
                }
                else
                {
                    echo "<strong>STRONA NIE ISTNIEJE!</strong> błąd nr 104 ";
                }
            }
        }
        else
        { //NIE ROZPOZNANO IDENTYFIKATORA
            echo "<strong>STRONA NIE ISTNIEJE!</strong> błąd nr 103 ";
        }
    }           
    else if(preg_match('/^[0-9a-zA-Z_-]+$/D', $_GET['str']) )
    {//jeżeli zwykła strona
        if(is_file('private/sites/'.$_GET['str'].'.php'))
        {
           
                include('private/sites/'.$_GET['str'].'.php');
            
        }
        else
        {
            echo "<strong>Strona nie istnieje!!!!!</strong> (101)";
        }
    }
    else
    {
        echo "<strong>Strona nie istnieje!!!!!</strong> (102)";
    }
}	

?>
