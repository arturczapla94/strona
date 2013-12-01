<?php

namespace strona\sys\basic;

/**
 * Description of Site
 *
 * @author Artur
 */
class Site {

    
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
        {
            $link="";
            /*foreach
            return $_SERVER['SCRIPT_NAME'];*/
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
    
}
