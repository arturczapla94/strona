<?php

namespace strona\sys\basic;

/**
 * Description of Site
 *
 * @author Artur
 */
class Site {

    // key => value;
    public $currentParameters=array();
    
    public function gen_link($variables)
    {
        if(empty($currentParameters))
        {
            if(is_array($variables) && count($variables)>0)
            {
                $link = $_SERVER['SCRIPT_NAME'].'?';
                foreach($variables as $key => $val)
                {
                    $link .=urlencode($key).'='.urlencode($val).'&';
                }
                
                return substr($link,0,strlen($link)-1);
            }
            else
            {
                return $_SERVER['SCRIPT_NAME'];
            }
        }
        elseif (!is_array($variables) || count($variables)<=0)
        { // Jeżeli nie przekazaono parametrów
            $link = $_SERVER['SCRIPT_NAME']."?";
            foreach($currentParameters as $key => $value)
            {
                if (in_array($key , \inc\System::$globalParameters ) )
                { //Jeżeli to globalny parametr
                    $link .=urlencode($key).'='.urlencode($value).'&';
                }
            }
            return substr($link,0,strlen($link)-1);
        }
        else
        {
            $query="";
            
        }
    }
    
}
