<?php
class RontaBlueTheme {
    protected $inview;
    const PUBLIC_THEME_DIR = 'public/themes/RontaBlue';
    
/**
 * Generuje i wyświetla html
 * 
 * @param inc\ViewBasic $view obiekt typu \inc\ViewBasic, częśc wewnętrzna widoku.
 */
    public function __construct($view) {
        $this->inview = $view;
        $this->writeHTMLHeaders();
        $this->writeTop();
        $this->writeWrapper();
        $view->write();
        $this->writeWrapperClosure();
        $this->writeBottom();
    }
    
    
    protected function writeHTMLHeaders()
    {
        ?>
        <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="<?php echo $this->inview->description ?>" />
	<title><?php echo $this->inview->title ?></title>
	<link rel="stylesheet" href="<?php echo self::PUBLIC_THEME_DIR.'/style.css' ?>" type="text/css" />
        <script type="text/javascript" src="public/js/jquery-2.0.3.js"> </script>
<?php if(isset($this->inview->customHeaders))
    echo $this->inview->customHeaders;
echo "\n</head><body><div id=\"pbody\"></div>";
//inne nagłówki
    }
    
    function writeTop() {
        ?>
<header id="header">
    <div class="site-width in"><img class="logo" src="public/images/czaplaphp03.png" /><h1><?php echo Config\Config::SITE_TITLE ?></h1>
    </div>
</header>
        
        <?php
    }
    function writeWrapper() {
        echo '<div id="big-wrapper">'
        . '<div id="wrapper" class="site-width" >'
        . '<div id="menu">'
                . '<div class="menu-block block-block">'
                . '<div class="menu-top block-top">MENU</div>'
                . '<div class="menu-contents block-contents">';
        $this->wypiszMenu();
        echo '</div>'
        . '</div>'
        . '</div>'
        . '<div id="contents">';
    }
    function writeWrapperClosure() {
        echo '</div>'
        . '</div>'
        . '';
    }
    function writeBottom() {
        echo '<footer id="footer" class="site-width">'
        . '<hr><p class="poweredby"> Powered by czaplOS</p>'
        . '</footer></div>'
                . '</body></html>';
    }
    
    
    function wypiszMenu() {
        echo '<a href="index.php'.gen_link_var("str","").'">Strona główna</a><br/>';
        echo '<a href="index.php'.gen_link_var("str","login").'">Zaloguj</a><br/>';
        echo '<a href="index.php'.gen_link_var("str","galeria").'">galeria</a><br/>';

        foreach (Config\Config::$menu as $value)
        {
            switch ($value[2])
            {
                case 1 :
                    echo '<a href="index.php'.gen_link_var("str",$value[1]).'">'.$value[0].'</a><br />';
                    break;
                case 2 :
                    echo '<p '.(isset($value[3]) ? $value[3] : '').'>'.$value[0].'</p>';
            };

        }
                       
    }
    
}

