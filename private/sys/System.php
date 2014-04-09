<?php
class System
{
    /** @var System*/
    static $system;
    /** @var RontaBlueTheme */
    protected $szablon = null;
    /** @var Site */
    public $site = null;
    
    private $sesja = array();
    
    /** @var Array */
    public static $globalParameters = array('str','debug','action');
    
    public function __construct() {
        System::$system=$this;
        
        
        
        require_once(SYS_DIR.DS.'Site.php');
        
        
        $this->site = new Site();
    }
    
    public function setSessionData($key, $data)
    {
        $this->sesja = (is_array($_SESSION['systemdata']) ? $_SESSION['systemdata'] : array() );
        
        if($key!=null)
        {
            
            if($data!=null)
            {
                $this->sesja[$key] = $data;  
            }
            else
            {
                unset($this->sesja[$key]);
            }
            $_SESSION['systemdata'] = $this->sesja;
            
        }
        else
        {
            $_SESSION['systemdata'] = $this->sesja;
        }
    }
    /** @return String wartość
     */
    public function getSessionData($key)
    {
        if(isset($_SESSION['systemdata']) && is_array($_SESSION['systemdata']))
        {
            $this->sesja = $_SESSION['systemdata'];
            if(array_key_exists($key , $this->sesja ))
            {
                return $this->sesja[$key];
            }
            else
            {
                return null;
            }
        }
        else
        {
            $_SESSION['systemdata'] = array();
        }
    }
    
    /** 
     * @return RontaBleTheme aktualny szablon
     */
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
