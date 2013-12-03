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
                    
                    <div id="dr-block" class="widget-block-in">kliknij i przeciąg!</div>
                    
                    
                </div>
                
                <div id="resizable-container" class="widget-block">
                    <div id="resizable-block" class="widget-block-in">Zmień rozmiar!</div>
                </div>
                
                
                <div id="selectable-container" class="widget-block">
                    <h3>Zaznaczanie (jednego elementu lub wielu)</h3>
                    <ul id="selectable" class="ui-lista">
                        <li>Item 1</li>
                        <li>Item 2</li>
                        <li>Item 3</li>
                        <li>Item 4</li>
                        <li>Item 5</li>
                    </ul>
                </div>
                
                <div id="sortable-container" class="widget-block">
                    <h3>sortowanie</h3>
                    <ul id="sortable" class="ui-lista">
                        <li>Item 1</li>
                        <li>Item 2</li>
                        <li>Item 3</li>
                        <li>Item 4</li>
                        <li>Item 5</li>
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

