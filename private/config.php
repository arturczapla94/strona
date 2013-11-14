<?php

class Config {
    
    public static $startPage = "cotophp";
    const DEFAULT_ACTION = "index";
    public static $menu = array(
                                /*array("Co to jest PHP?","podstrona",true),*/
                                array("Serwisy:","",2),
                                array("PHP01 Zmienne","php01zmienne",1),
                                array("PHP02 Funkcje","php02funkcje",1),
                                array("PHP03 Tablice","php03tablice",1),
                                array("PHP04 Data i Czas","php04czas",1),
                                array("PHP05 Formularze","php05formularze",1),
                                array("PHP07 Pliki","php07pliki",1),
        
                                array("Projektowanie:","",2),
                                array("JS 01 tabelka css","js01skrypty",1),
                                array("JS 02 zdarzenia","js02zdarzenia",1),
                                array("JS 03 elementy DOM","js03elementy_dom",1),
                                array("JS 04 menu","js04menu",1));
}


?>