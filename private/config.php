<?php
namespace Config;
class Config {
    
    public static $startPage = "home";
    const DEFAULT_ACTION = "index";
    
    const SITE_TITLE = "PHP Czapla";
    const SITE_logo = "czaplaphp03.png";
    
    public static $menu = array(
            /*array("Co to jest PHP?","podstrona",true),*/
            array("Serwisy:","",2),
            array("PHP01 Zmienne","php01zmienne",1),
            array("PHP02 Funkcje","php02funkcje",1),
            array("PHP03 Tablice","php03tablice",1),
            array("PHP04 Data i Czas","php04czas",1),
            array("PHP05 Formularze","php05formularze",1),
            array("PHP07 Pliki","php07pliki",1),
            array("PHP08 Forum na plikach","php08forum",1),
            array("PHP09 Serwer, autoryzacja","php09serwer",1),
            array("PHP10 Cookies","php10serwer2",1),
            array("PHP11 Obrazki","php11obrazki",1),


            array("Projektowanie:","",2),
            array("JS 01 tabelka css","js01skrypty",1),
            array("JS 02 zdarzenia","js02zdarzenia",1),
            array("JS 03 elementy DOM","js03elementy_dom",1),
            array("JS 04 menu","js04menu",1),
            array("JS 05 Animacje 1","js05animacje1",1),
            array("JS 06 Animacje 2","js06animacje2",1),
            array("JS 07 jQuery UserIface","js07ui",1)
        );
    public static $salt = 'BV1WSYUB[-pF-a,#|';
    
    public static $logsalt = 'bKD)G-}E&LUsc+[';
    
    public static $dbhost = 'localhost';
    public static $dbname = 'czapar';
    public static $dbuser = 'czapar';
    public static $dbpass = '123';
    public static $dbprefix = 'str_';
    
}


?>