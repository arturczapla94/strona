<?php//////////////////////////////////////////////        L  O  G  I  K  A////////////////////////////////////////////'new' ( tytuł, krótki opis,autor,data,kategoria, obrazek, dluga treść)$parametry = array( 'news' =>array(    array(        'title'  =>"Stabilna Opera 18 już ma skórki, w 19 będzie synchronizacja i lepszy pasek zakładek",        'content'=>"Na blogu desktopowej Opery, który przed planowanym zamknięciem My Opera dostępny jest pod nowym adresem, znalazło się podsumowanie nowości w świeżo wydanej stabilnej Operze 18 dla systemów Windows i OS X, a także nieco starsza zapowiedź zmian w testowanej obecnie Operze 19. Jak już informowaliśmy kiedy wersja 18",        'autor' =>"Anna Rymsza (Xyrcon)",        'date'  =>"19.11.2013",        'tags'  =>array("kategoria taka dobra!"),        'image' =>'i001opera.png'    ),array(        'title' =>"Ashampoo Burning Studio 14 beta z nowym funkcjami",        'content'=>"Firma Ashampoo powstała w 1999 roku i od tego czasu zajmuje się tworzeniem oraz dystrybuowaniem drogą elektroniczną różnego rodzaju oprogramowania. Jedną z najpopularniejszych aplikacji stworzonych przez niemiecką firmę jest bez wątpienia Ashampoo Burning Studio. Dzisiaj udostępniono pierwszą publiczną betę",        'autor' =>"Kuba Pawlak (qbap)",        'date'  =>"19.11.2013",        'tags'  =>array("kategoria taka dobra!"),        'image' =>'i001opera.png'    ),array(        'title' =>"Spór o dystrybucje: Mint niebezpieczny, czy Ubuntu niestabilne?",        'content'=>"Linux Mint jest prawdopodobnie najważniejszym konkurentem Ubuntu, dystrybucją wybieraną przez znaczną część tych, których rozczarowała polityka Canonicala i forsowanie ujednoliconego dla wszystkich ekranów interfejsu użytkownika Unity. Wybierając Minta, otrzymują w zasadzie ten sam, dobrze sobie znany system,",        'autor' =>"Adam Golański (eimi)",        'date'  =>"19.11.2013",        'tags'  =>array("kategoria taka dobra!"),        'image' =>'i001opera.png'    )));//////////////////////////////////////////////        W  I  D  O  K//////////////////////////////////////////class homeView extends inc\ViewBasic {    function __construct($widok) {        $this->dane = $widok;        $this->customHeaders = '<link rel="stylesheet" href="public/res/style/style.css" type="text/css" />'            . '<script type="text/javascript" src="public/res/snews/news.js"> </script>';                $this->description = "Strona Główna";        $this->title = "Strona Główna";    }            public function write()    {        if(count($this->dane['news'])<=0)        {            foreach($this->dane['news'] as $news)            {                echo '<article class="news">'                . '<header><h3>'.$news['title'].'</h3></header>'                . '<div class="news-in">'                . '     <figure class="figure"></figure>'                . '     <div class="news-in2">'                . '         <div class="news-tags">'                . '             <span class="news-categories">';                foreach ($news['tags'] as $category)                {                    echo '<span class="category">'.htmlspecialchars($category).'</span>';                }                                echo '             '                . '         </div>'                . '         <section class="news-content">'                . '         </section>'                . '     </div>'                . '</div>'                . '</article>';            }        }        else        {            echo '<h3>Brak Newsów!</h3>';        }    }}$widok = new homeView($parametry);$klasa = CUR_THEME;$szablon = new $klasa($widok);?>