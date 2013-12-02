<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////



//'new' ( tytuł, krótki opis,autor,data,kategoria, obrazek, dluga treść)
$parametry = array( 'news' =>array(
    array(
        'title'  =>"Stabilna Opera 18 już ma skórki, w 19 będzie synchronizacja i lepszy pasek zakładek",
        'content'=>"Na blogu desktopowej Opery, który przed planowanym zamknięciem My Opera dostępny jest pod nowym adresem, znalazło się podsumowanie nowości w świeżo wydanej stabilnej Operze 18 dla systemów Windows i OS X, a także nieco starsza zapowiedź zmian w testowanej obecnie Operze 19.",
        'more'  =>'Jak już informowaliśmy kiedy wersja 18 przeglądarki była testowana, powraca możliwość personalizowania jej wyglądu za pomocą skórek. Można je pobrać ze strony z dodatkami: addons.opera.com/pl/themes/. Ponadto, do zubożonej po przejściu na WebKit przeglądarki trafiła możliwość przeciągania kart między oknami programu. Oczywiście nie dotyczy to przeciągania między oknem zwykłym, a pracującym w trybie chroniącym prywatność. Dzięki integracji mikrofonu i kamerki internetowej przez getUserMedia i WebRTC można bez dodatkowych wtyczek korzystać z nich w aplikacjach webowych (czaty, skanery kodów kreskowych i QR, rozpoznawanie kolorów itp.), czego przykłady można znaleźć na stronie Shiny Demos w dziale poświęconym getUserMedia. Wreszcie, osobom korzystającym z wielu silników wyszukiwania przyda się możliwość szybkiego definiowania nowych słów kluczowych do wykorzystania w pasku adresu, prosto z menu kontekstowego.',
        'autor' =>"dobreprogramy.pl Anna Rymsza (Xyrcon)",
        'date'  =>"19.11.2013",
        'tags'  =>array("Oprogramowanie"),
        'image' =>'i001opera.png'
    ),array(
        'title' =>"Ashampoo Burning Studio 14 beta z nowym funkcjami",
        'content'=>"Firma Ashampoo powstała w 1999 roku i od tego czasu zajmuje się tworzeniem oraz dystrybuowaniem drogą elektroniczną różnego rodzaju oprogramowania. Jedną z najpopularniejszych aplikacji stworzonych przez niemiecką firmę jest bez wątpienia Ashampoo Burning Studio. Dzisiaj udostępniono pierwszą publiczną betę",
        'more'  =>'Dzisiaj udostępniono pierwszą publiczną betę narzędzia oznaczoną numerkiem 14. Spostrzegawczy zauważą, że producent postanowił przeskoczyć od razu z wersji 12 na 14 nie tylko ze względu na pechowość liczby 13, ale przede wszystkim z powodu 14 rocznicy powstania firmy. Na przestrzeni ostatnich lat Ashampoo Burning Studio uzyskało miano jednego z lepszych narzędzi do wypalania płyt, z którego korzysta dzisiaj przeszło 30 mln użytkowników na całym świecie. Najbardziej rzucającą się zmianą w Ashampoo Burning Studio 14 jest oczywiście nowy interfejs użytkownika. Pojawiły się nowe animacje, a dostęp do poszczególnych funkcji programu jest szybszy niż w poprzednich odsłonach programu. Poza zmianami wizualnymi wersja 14 oferuje również kilka nowych funkcji. Jedna z nich jest możliwość nagrywania zaszyfrowanych nośników za pomocą algorytmu AES-256. Ashampoo Burning Studio 14 pozwala również na automatyczne pobieranie okładek dla rippowanych płyt Audio oraz umożliwia tworzenie kopii zapasowych urządzeń mobilnych. Aktualnie obsługiwane są telefony i tablety z systemem Android i iOS. Kolejną nowością jest tryb kompakt, pozwalający na szybkie nagrywanie danych.',
        'autor' =>"dobreprogramy.pl Kuba Pawlak (qbap)",
        'date'  =>"19.11.2013",
        'tags'  =>array("Oprogramowanie"),
        'image' =>'i002ashampoo.png'
    ),array(
        'title' =>"Spór o dystrybucje: Mint niebezpieczny, czy Ubuntu niestabilne?",
        'content'=>"Linux Mint jest prawdopodobnie najważniejszym konkurentem Ubuntu, dystrybucją wybieraną przez znaczną część tych, których rozczarowała polityka Canonicala i forsowanie ujednoliconego dla wszystkich ekranów interfejsu użytkownika Unity.",
        'more'  =>"Zaczęło się dość niewinnie: niejaki Ben Tinner ogłosił powstanie kolejnej odmiany Ubuntu – MATE Remix. Bazująca na wydaniu Ubuntu 13.10 dystrybucja miała połączyć system Canonicala z naśladującym klasyczne Gnome 2 desktopem MATE, stworzonym notabene przez deweloperów Minta. Docelowo jednak jej bazą miało stać się opracowywane obecnie Ubuntu 14.04 LTS – wydanie o przedłużonym okresie wsparcia, więc Tinner wezwał użytkowników do pomocy w pracach nad przeniesieniem MATE na nową wersję OS-a.

Komunikat spotkał się z mieszanymi reakcjami. Wielu użytkowników zaczęło się zastanawiać, po co komu kolejny remiks Ubuntu, i to jeszcze taki, który w praktyce nie będzie niczym się różnił od Linux Minta, którego jedna z oficjalnych odmian wykorzystuje właśnie MATE jako domyślne środowisko graficzne.

W sukurs Tinnerowi przyszedł jeden z rdzennych deweloperów Ubuntu, Oliver Grawert, który stwierdził, że taka odmiana Ubuntu jednak ma sens, gdyż opiekunowie Minta blokują aktualizacje licznych kluczowych dla systemu pakietów, narażając użytkowników na ataki. Powiedziałbym, że utrzymywanie podatnego na atak jądra, przeglądarki czy xorga zamiast przyjęcia przygotowanych aktualizacji bezpieczeństwa otwiera system na atak – sam bym na Mincie nie robił bankowych przelewów – podsumował Grawert, spotykając się z poparciem innych deweloperów Canonicala.

Komentarze te nie pozostały bez reakcji twórcy Minta, Clementa Lefebvre'a. Uważa on, że łatek dostarczanych przez Canonicala nie można stosować na ślepo, gdyż grozi to nieprzewidywalnymi regresjami. Już w 2007 roku wyjaśnialiśmy, jakie konsekwencje niesie stosowanie wszystkich poprawek z Ubuntu na oślep. Dlatego wprowadziliśmy rozwiązanie, z którego jesteśmy bardzo zadowoleni (…) każdy korzystający z Minta może uruchomić Menedżera Aktualizacji i włączyć aktualizacje poziomu 4 i 5, czyniąc ze swojego systemu coś równie „bezpiecznego” i „niestabilnego”jak Ubuntu – wyjaśnił Lefebvre.",
        'autor' =>"dobreprogramy.pl Adam Golański (eimi)",
        'date'  =>"19.11.2013",
        'tags'  =>array("Ubuntu"),
        'image' =>'i003ubuntu.png'
    )
)
);





//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////


class js06animacje2View extends inc\ViewBasic {
    function __construct($widok) {
        $this->dane = $widok;
        $this->customHeaders = '<link rel="stylesheet" href="public/res/zhome/home.css" type="text/css" />'
            . '<link rel="stylesheet" href="public/res/zjs06/js06animacje2.css" type="text/css" />'
            . ''
            . '<script type="text/javascript" src="public/res/zhome/home.js"> </script>'
                . '<script type="text/javascript" src="public/res/zjs06/js06animacje2.js"> </script>';
        
        $this->description = "Strona Główna";
        $this->title = "Strona Główna";
    }
    
    
    public function write()
    {
        ?>
        <article class="news-block block-block">
    <header class="block-top">
        <h3></h3>
    </header>
    <div class="block-contents">
        
        <div class="news-in2">
            <div class="news-tags">
                 <span class="news-categories">
           <span class="category"></span>
                
            </div> 
            <section class="news-content">
                <h2> Animacje 2</h2>
                
            </section>
        </div>
    </div>
</article>
<?php
        if(count($this->dane['news'])>0)
        {
            foreach($this->dane['news'] as $news)
            {
                ?>
<article class="news-block block-block">
    <header class="block-top">
        <h3><?php echo $news['title'] ?></h3>
    </header>
    <div class="block-contents">
        <figure class="figure"><img src="public/res/zhome/images/<?php echo $news['image'] ?>" alt="ilustracja" /> </figure>
        <div class="news-in2">
            <div class="news-tags">
                 <span class="news-categories">
            <?php
            foreach ($news['tags'] as $category)
            {
                ?><span class="category"><?php echo htmlspecialchars($category) ?></span>
                <?php
            }

            ?>
            </div> 
            <section class="news-content">
                <p>
                <?php echo $news['content'];  ?>
                </p>
                <p style="display:none;" class="tekst-wiecej">
                    <?php echo $news['more'];  ?>
                </p>
                <button class="pokaz-wiecej tekstowy">więcej</button>
            </section>
        </div>
    </div>
</article>
<?php
            }
        }
        else
        {
            echo '<section class="block-block"><div class="block-top">Brak Newsów</div>'
            . '<div class="block-contents">'
                    . '<h3>Brak Newsów!</h3>'
                    . '</div>'
                    . '</section>';
        }
    }
}

$widok = new js06animacje2View($parametry);
$klasa = CUR_THEME;
$szablon = new $klasa($widok);



?>