<?php

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
    echo "\n<!-- var: ".$var."\nval: ".$val." -->\n";
    if(empty($_GET))
    {
        echo "\n<!-- GET = empty -->\n";
        if(!empty($var) && !empty($val))
        {
            $link = $_SERVER['REQUEST_URI'].'?'.$var.'='.$val;
            echo "\n<!-- link: ".$link." -->\n";
            return $link;
        }
        else
        {
            echo "\n<!-- cos puste! \n var: ".$var."\nval: ".$val." -->\n";
            return $_SERVER['REQUEST_URI'];
        }
    }
    elseif (empty($var))
    {
        echo "\n<!-- var puste -->\n";
        return $_SERVER['SCRIPT_NAME'];
    }
    else
    {
        echo "\n<!-- var nie puste  i GET nie puste, przeliczanie... -->\n";
        $query="";
        $znaleziono =false;
        foreach($_GET as $key => $value)
        {
            echo "\n<!-- klucz= ".$key."\nwartosc= ".$value." -->\n";
            if($key==$var)
            {
                $znaleziono = true;
                if(!empty($val))
                {
                    if(strlen($query)>0)
                    {
                        echo "\n<!-- query+=: &".$key."=".$val." -->\n";
                        $query.="&".$key."=".$val;
                    }
                    else
                    {
                        echo "\n<!-- query+=: ".$key."=".$val." -->\n";
                        $query=$key."=".$val;
                    }
                        
                }
                else
                {
                    echo "\n<!-- val puste -->\n";
                }
            }
            else
            {
                if(strlen($query)>0)
                {
                    echo "\n<!-- query=: &".$key."=".$value." -->\n";
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
?>
