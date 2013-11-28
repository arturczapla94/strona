<?php
namespace {
function silnia($i)
{
    $wynik = 1;
    for(;$i>1;$i--)
    {
        $wynik*=$i;
    }
    return $wynik;
    
}

function dzien_tygodnia ($nr)
{
    
    switch ($nr) {
        case 1:
            return "poniedziałek";
            break;
        case 2:
            return "wtorek";
            break;
        case 3:
            return "środa";
            break;
        case 4:
            return "czwartek";
            break;
        case 5:
            return "piątek";
            break;
        case 6:
            return "sobota";
            break;
        case 7:
            return "niedziela";
            break;

        default:
            return false;
            break;
    }
    
}


function miesiac($nr)
{
    
    switch ($nr) {
        case 1:
            return "stycznia";
            break;
        case 2:
            return "lutego";
            break;
        case 3:
            return "marca";
            break;
        case 4:
            return "kwietnia";
            break;
        case 5:
            return "maja";
            break;
        case 6:
            return "czerwca";
            break;
        case 7:
            return "lipca";
            break;
        
        case 8:
            return "sierpnia";
            break;
        case 9:
            return "września";
            break;
        case 10:
            return "października";
            break;
        case 11:
            return "listopada";
            break;
        case 12:
            return "grudnia";
            break;

        default:
            return false;
            break;
    }
    
}

function odmiana($liczba, $pojedyncza, $dwa, $piec)
{
    if($liczba==1 || $liczba==-1)
        return $pojedyncza;
    elseif(($liczba>1 && $liczba<5) || ($liczba<-1 && $liczba>-5) )
        return $dwa;
    else
        return $piec;
}

function gen_link_var($var,$val)
{
    if(empty($_GET))
    {
        if(!empty($var) && !empty($val))
        {
            $link = $_SERVER['REQUEST_URI'].'?'.$var.'='.$val;
            return $link;
        }
        else
        {
            return $_SERVER['REQUEST_URI'];
        }
    }
    elseif (empty($var))
    {
        return $_SERVER['SCRIPT_NAME'];
    }
    else
    {
        $query="";
        $znaleziono =false;
        foreach($_GET as $key => $value)
        {
            if($key==$var)
            {
                $znaleziono = true;
                if(!empty($val))
                {
                    if(strlen($query)>0)
                    {
                        $query.="&".$key."=".$val;
                    }
                    else
                    {
                        $query=$key."=".$val;
                    }
                        
                }
            }
            else
            {
                if(strlen($query)>0)
                {
                    $query.="&".$key."=".$value;
                }
                else
                {
                    $query=$key."=".$value;
                }
            }
            
        }
        if(!$znaleziono)
        {
            if(strlen($query)>0)
            {
                $query.="&".$var."=".$val;
            }
            else
            {
                $query=$var."=".$val;
            }
        }
        if(strlen($query)>0)
        {
            return "?".$query;
        }
        else
        {
            return "";
        }
    }
}
}//namespace end
namespace inc {
function gen_inputs_from_get()
{
    if(!empty($_GET))
    {
        $html="";
        foreach($_GET as $key => $value)
        {
            $html.='<input type="hidden" name="'.urlencode($key).'" value="'.  urlencode($value).'" />';
        }
        return $html;
    }
}


class System
{
    
    public function __construct() {
        System::$system=$this;
    }
    static $system;
    
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

class ViewBasic {
    protected $dane;
    public $description = "";
    public $title = "";
    public $customHeaders ="";
    public $header = "";
    public function write()
    {
        
    }
    }
}//namespace end
?>
