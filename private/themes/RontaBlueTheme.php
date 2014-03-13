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
        $this->show();
    }
    
    
    protected function writeHTMLHeaders()
    {
        ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="<?php echo $this->inview->description ?>" />
	<title><?php echo $this->inview->title ?></title>
	<link rel="stylesheet" href="<?php echo self::PUBLIC_THEME_DIR.'/style.css' ?>" type="text/css" />
        <script src="public/js/jquery-2.0.3.js"> </script>
        <script src="public/js/jquery-ui-1.10.3.custom.min.js"> </script>
        <script src="public/js/jquery.easing.1.3.js"></script>
<?php if(isset($this->inview->customHeaders))
    echo $this->inview->customHeaders;

    }
    
    function writeBodyInit() {
?>
    <div id="pbody"></div>
<?php
    }
    
    function writeTop() {
        ?>
<header id="header">
    <div class="site-width in">
        <a title="Strona główna" href="index.php<?php echo gen_link_var("str", \Config\Config::$startPage) ?>">
           <img class="logo" src="public/images/czaplaphp03.png" alt="logo" /><h1><?php echo Config\Config::SITE_TITLE ?></h1></a>
        <div id="header-menu2" style="position:absolute;right:0;bottom:0;margin:6px 16px;">
            <?php
                if(!empty($_SESSION['user']))
                {
                    echo 'Witaj <b>'.$_SESSION['user']['name'].'</b>! <a href="index.php?str=login_ctrl&logout=1" style="font-size:x-small">(wyloguj)</a>';
                }
            ?>
        </div>    
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
                . '';
    }
    
    
    function wypiszMenu() {
        echo '<a href="index.php'.gen_link_var("str","").'">Strona główna</a><br/>';
        if(empty($_SESSION['user']))
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
                    echo '<h3 '.(isset($value[3]) ? $value[3] : '').'>'.$value[0].'</h3>';
            };

        }
                       
    }
    
    function show()
    {
        
?><!DOCTYPE html>
<html>
<head>
    <?php $this->writeHTMLHeaders(); ?>
</head>
<body>
    <?php
        $this->writeBodyInit();
        $this->writeTop();
        $this->writeWrapper();
        
        $this->inview->write();
        
        $this->writeWrapperClosure();
        $this->writeBottom();
    ?>
</body>
</html>
    <?php
    }
    
}

