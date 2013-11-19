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

define('BASEDIR',__DIR__); //public_html/
define('DS',DIRECTORY_SEPARATOR);// /
define('PRIV_DIR',BASEDIR.DS.'private');// public_html/private
define('PUB_DIR',BASEDIR.DS.'public');// public_html/public
define('PUB_RES_DIR',PUB_DIR.DS.'res');// public_html/public/res
define('PRIV_RES_DIR',PRIV_DIR.DS.'res');// public_html/private/res
define('PRIV_THEMES_DIR',PRIV_DIR.DS.'themes');// public_html/private/themes
define('APPS_DIR',PRIV_DIR.DS.'apps');// public_html/private
//const BASEDIR = __DIR__;
//const DS = __DIR__;
//const PRIV_DIR = BASEDIR.DS.'private';

include(PRIV_THEMES_DIR.DS.'RontaBlueTheme.php');

define('CUR_THEME','RontaBlueTheme');

if(empty($_GET['str']) )
{
    $_GET['str']=\Config::$startPage;
    include('private/sites/'.$_GET['str'].'.php');
}
else {
    $matches;
    if(preg_match('/^([a-zA-Z_]+[0-9a-zA-Z_]*)-/D', $_GET['str'], $matches) )
    {//JEŻELI specjalna strona lub kontroler
        if(strpos($matches[1],"c")===0)
        { //JEŻELI zaczyna się od "c" - KONTROLER
            $action="";
        
            if((!isset($_GET['action']) && $action = \Config::DEFAULT_ACTION) || ( preg_match('/^[0-9a-zA-Z_-]+$/D', $_GET['action']) && $action = $_GET['action']))
            {//Jeżeli nie istnieje action, albo jeżeli istnieje i pasuje do wzoru
                $files = scandir(APPS_DIR);
                $znaleziono =false;
                foreach($files as $file)
                {
                    if($file=='.' || $file=='..')
                    {
                        continue;
                    }
                    
                    $id = $matches[1];
                    $controllerName = $file.'Controller';
                    if(is_dir(APPS_DIR.DS.$file) && strpos($file,$matches[1])===0)
                    {
                        define('CUR_APP_DIR', APPS_DIR.DS.$file);
                        define('CUR_APP_NAME', $file);
                        if(is_file(CUR_APP_DIR.DS.$controllerName.'.php'))
                        {
                            $znaleziono = true;
                            include CUR_APP_DIR.DS.$controllerName.'.php';
                            if(class_exists($controllerName))
                            {
                                $kontroler = new $controllerName();
                                if(method_exists($kontroler, $action.'Action'))
                                {
                                    $method = $action.'Action';
                                    $kontroler->$method();
                                }
                                else
                                {
                                    \inc\System::error(108);
                                }
                                //TODO:
                                // wywowływanie akcji
                            }
                            else
                            {
                                 \inc\System::error(105);
                            }

                            break;
                        }
                        else
                        {
                            \inc\System::error(104);
                            break;
                        }
                    }
                    
                }
                if(!$znaleziono)
                {
                    \inc\System::error(107);
                }
                
                
            }
            else
            {
                \inc\System::error(106);
                
            }
        }
        else
        { //NIE ROZPOZNANO IDENTYFIKATORA
            \inc\System::error(103);
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
            \inc\System::error(101);
        }
    }
    else
    {
        \inc\System::error(102);
    }
}	



?>
