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
<?php if(isset($this->inview->customHeaders))
    echo $this->inview->customHeaders;
echo "\n</head><body>";
//inne nagłówki
    }
    
    function writeTop() {
        ?>
<header id="header">
    <div class="site-width in"><img class="logo" src="public/images/czaplaphp03.png" /><h1>Czapla PHP</h1>
    </div>
</header>
        
        <?php
    }
    function writeWrapper() {
        echo ''
        . '<div id="contents" class="site-width">';
    }
    function writeWrapperClosure() {
        echo '</div>'
        . '';
    }
    function writeBottom() {
        echo '<footer id="footer" class="site-width">'
        . '<hr><p class="poweredby"> Powered by czaplOS</p>'
        . '</footer>'
                . '';
    }
    
    
}

