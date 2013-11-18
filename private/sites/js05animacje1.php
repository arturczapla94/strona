<?php

$parametry = array();







//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////
include(PRIV_THEMES_DIR.DS.'RontaBlueTheme.php');

class Php07plikiView extends inc\ViewBasic {
    function __construct($data) {
        $this->dane = $data;
        $this->customHeaders = '<link rel="stylesheet" href="public/res/zjs05/js05style.css" type="text/css" />'
            . '<script type="text/javascript" src="public/res/zjs05/js05.js"> </script>';
    }
    public $description = "Animacje w JS";
    public $title = "Animacje w JS";
    
    public function write()
    {
?>
   <h2>Czym jest programowanie obiektowe?</h2>
<p>Rola języków programowania to komunikacja na linii człowiek - komputer.
Jak Wam zapewne wszystkim wiadomo, dla komputera najbardziej czytelnym językiem
jest język maszynowy w postaci binarnej. Człowiek od początku opracowywał
kolejne języki, aby były one czytelne właśnie dla człowieka, bo to on 
przecież tworzy i pisze programy. Pierwszym ogółem podejść do
problemu programowania był paradygmat imperatywny. Nas jako
programistów php najbardziej interesuje właśnie paradygmat imperatywny 
(czyli tzw. "programowanie strukturalne") oraz obiektowy (programowanie zorientowane obiektowo).
</p>
        <span class="pokaz">Pokaż więcej...</span><span class="ukryj">ukryj</span>
<p class="dlugi">
Czym się różnią te dwa podejścia? Różnice są w strukturze programu/aplikacji 
oraz podejściu do problemu. Programowanie strukturalne opiera się na wykonywaniu
kolejnych instrukcji ze stosu, wykorzystując imperatywne pętle, instrukcje warunkowe. 
Część kodu może być grupowana w procedurach lub funkcjach. W programowaniu
obiektowym zaś program to zbiór obiektów, które są w jakiś sposób ze sobą powiązane 
i w pewnym stopniu ze sobą oddziałują. Obiekt to dane, a więc program to zbiór 
danych na których operujemy. Człowiek dąży do tego aby język programowania
był jak najbardziej dla niego naturalny, właśnie programowanie obiektowe to umożliwia.
   </p>
        
    <br ><br><br>
    <span id="test06"> LOGO </span>     
        <br ><br><br>
   <img id="test02" src="public/images/czaplaphp03.png" /><span id="test02a">Akcja</span>
        <br ><br><br>
        
        <img id="test03" src="public/images/czaplaphp03.png" /><span id="test03a">Pokaz</span><br><span id="test03b">Ukryj</span>
        <br ><br><br><br>
        
        Rozwijanie:
        <img id="test04" src="public/images/czaplaphp03.png" /><br>
        <span id="test04a">Pokaz</span><br><span id="test04b">Ukryj</span>
        <br ><br><br>
        
        
        
        
        
        
<?php
        
    }//Koniec funkcji write
    
}//koniec widoku

$widok = new Php07plikiView($parametry);
$szablon = new RontaBlueTheme($widok);

