<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////


$parametry = array();





//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////


class js06animacje2View extends inc\ViewBasic {
    function __construct($widok) {
        $this->dane = $widok;
        $this->customHeaders = ''
            . '<link rel="stylesheet" href="public/res/zjs07/js07ui.css" type="text/css" />'
            . '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />'
            . '<script type="text/javascript" src="public/res/zjs07/js07ui.js"> </script>'
                . '';
        
        $this->description = "User interface";
        $this->title = "User interface";
    }
    
    
    public function write()
    {
        ?>
        <article class="news-block block-block">
    <header class="block-top">
        <h3>jQuery User Interaface</h3>
    </header>
    <div class="block-contents">
        
        <div class="news-in2">
            <div class="news-tags">
                 <span class="news-categories">
           <span class="category"></span>
                
            </div> 
            <section class="news-content">
                
                <div id="dr-container" class="widget-block">
                    
                    <div id="dr-block" class="widget-block-in"><h3>Przeciągalny blok:</h3>
<pre>$(document).ready(function(){
    $('#dr-block').draggable({containment: "parent"});
});</pre>
                    </div>
                    
                    
                </div>
                
                
                    <div id="resizable-block" class="widget-block-in"><h3>Sesje w PHP</h3><p>Protokół HTTP jest protokołem bezstanowym. Oznacza to, że serwer WWW rozpatruje każde żądanie niezależnie od innych, nie szukając żadnych powiązań w stylu wysyłania ich przez tego samego internautę. Utrudnia to teoretycznie tworzenie wszelkich systemów autoryzacji, które wymagają śledzenia poczynań użytkownika na naszej stronie i przenoszenia jego danych autoryzacyjnych między kolejnymi żądaniami, czyli krótko mówiąc - wymagają obecności systemu sesji. Używając PHP lub innego dynamicznego języka server-side można je jednak zasymulować. "Nasz" język jest o tyle prosty, iż posiada już zaimplementowane stosowne funkcje. My tylko musimy zacząć ich używać.
                            Działanie sesji w PHP jest bardzo proste. W momencie pierwszego trafienia na stronę interpreter tworzy specjalny, losowy oraz unikalny identyfikator przesyłany między żądaniami za pomocą ciastek lub parametru PHPSESSID doklejanego automatycznie do adresów URL. Na jego podstawie odczytywany jest później odpowiedni plik z danymi sesji zapisany gdzieś na serwerze. Pod koniec przetwarzania żądania wszystkie wprowadzone przez skrypt zmiany są z powrotem zapisywane do wspomnianego pliku tak, aby były widoczne przy wejściu na kolejną podstronę. I tak to się toczy.</p></div>
                
                
                
                <div id="selectable-container" class="widget-block">
                    <h3>Zaznacz gdzie byłeś:</h3>
                    <ul id="selectable" class="ui-lista">
                        <li>Kraków</li>
                        <li>Warszawa</li>
                        <li>Gdańsk</li>
                        <li>Lódź</li>
                        <li>Zakopane</li>
                    </ul>
                </div>
                
                <div id="sortable-container" class="widget-block">
                    <h3>ułóż od najmniejszej do największej</h3>
                    <h4>Postęp: <span id="sl-postep"></span>%</h4>
                    <div id="sl-progressbar"></div>
                    <h3 id="sl-komunikat"></h3>
                    <ul id="sortable" class="ui-lista">
                        <li id="sl-1">564</li>
                        <li id="sl-2">946</li>
                        <li id="sl-3">894</li>
                        <li id="sl-4">235</li>
                        <li id="sl-5">621</li>
                        <li id="sl-6">451</li>
                        <li id="sl-7">594</li>
                    </ul>
                </div>
                
                
                <p>Data: <input type="text" id="datepicker"></p>
                
            </section>
        </div>
    </div>
</article>




<?php
    }
}


$widok = new js06animacje2View($parametry);
$klasa = CUR_THEME;
$szablon = new $klasa($widok);

