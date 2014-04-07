<?php
class System
{
    static $system;
    protected $szablon = null;
    public $site = null;
    
    public static $globalParameters = array('str','debug','action');
    
    public function __construct() {
        System::$system=$this;
        
        
        
        require_once(SYS_DIR.DS.'Site.php');
        
        
        $this->site = new Site();
    }
    
    
    public function getWidok()
    {
        if($this->szablon==null)
        {
            $klasa = CUR_THEME;
            $this->szablon = new $klasa(null);
            return $this->szablon;
        }
        else
            return $this->szablon;
    }
    
    public static function error($nr)
    {
        $bledy = file(PRIV_DIR.DS."errors.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach($bledy as $linia)
        {
            $blad = explode(";",$linia);
            if(!empty($blad[0]) && !empty($blad[1]))
                $bledy[$blad[0]]=array($blad[1],(isset($blad[2]) ? $blad[2] : null));
        }
        echo '<html lang="pl"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>'.(isset($bledy[$nr])? $bledy[$nr][0] : 'Nieznany błąd (000)').'</title>'
                . '</head>'
                . '<body>'
                . '<div class="errorsite">'
                . (isset($bledy[$nr])? '<strong>'.ucfirst($bledy[$nr][0]).'!</strong> ('.$nr.')' : 'Wystąpił nieznany błąd (000)')
                . ($debug=true ? "<br />info: ".( isset($bledy[$nr][1]) ? $bledy[$nr][1] : "") : "")
                . '</div>'
                . '</body></html>';
        
    }
    
    
    
}


?>
