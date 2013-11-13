<?php
class RontaBlueTheme {
    private $inview;
    const PUBLIC_THEME_DIR = 'public/themes/RontaBlueTheme';
    
/**
 * Generuje i wyświetla html
 * 
 * @param inc\ViewBasic $view obiekt typu \inc\ViewBasic, częśc wewnętrzna widoku.
 */
    public function __construct($view) {
        this.$inview = $view;
        writeHTMLHeaders();
        writeTop();
        writeWrapper();
        $view->write();
        writeBottom();
    }
    
    
    function writeHTMLHeaders()
    {
        ?>
        <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Description" content="<?php echo $view->$description ?>" />
	<title><?php echo $view->$title ?></title>
	<link rel="stylesheet" href="<?php echo PUBLIC_THEME_DIR.'/style.css' ?>" type="text/css" />    
<?php
//inne nagłówki
    }
}

