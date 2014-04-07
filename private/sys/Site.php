<?php

/**
 * 
 *
 * @author Artur
 */
class Site {

    // key => value;
//    // parametry dodane dynamicznie które powinny być przekazane tylko na tą samą stronę
//    public $globalParameters = array();
    //public 
    
    public function gen_link($variables)
    {
        $currentParameters = $_GET;
        
        if(empty($currentParameters))
        {
            if(is_array($variables) && count($variables)>0)
            {
                $link = $_SERVER['SCRIPT_NAME'].'?';
                foreach($variables as $key => $val)
                {
                    $link .=urlencode($key).'='.urlencode($val).'&';
                }
                
                return substr($link,0,strlen($link)-1); //usunięcie ostatniego znaku
            }
            else
            {
                return $_SERVER['SCRIPT_NAME'];
            }
        }
        elseif (!is_array($variables) || count($variables)<=0)
        { // Jeżeli nie przekazaono nowych parametrów przepisz tylko globalne
            $link = $_SERVER['SCRIPT_NAME']."?";
            foreach($currentParameters as $key => $value)
            {
                if (in_array($key , System::$globalParameters ) )
                { //Jeżeli to globalny parametr
                    $link .=urlencode($key).'='.urlencode($value).'&';
                }
            }
            return substr($link,0,strlen($link)-1);
        }
        else
        { //jeżeli przekazano nowe parametry i już jakieś są
            $link = $_SERVER['SCRIPT_NAME']."?";
            
            $globalne = array();
            foreach($currentParameters as $key => $value)
            {
                if (in_array($key , System::$globalParameters ) )
                { //Jeżeli to globalny parametr
                    $globalne[$key]=$value;
                }
            }
            $nowe = array_merge($globalne, $variables );
            
            foreach($nowe as $key => $value)
            {
                $link .=urlencode($key).'='.urlencode($value).'&';
            }
            
            return substr($link,0,strlen($link)-1);
            
        }
    }
    
}
