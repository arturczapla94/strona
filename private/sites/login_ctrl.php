<?php

function uwierzytelnianie($mysqli, $login, $password)
{
    $wynik = array('errno' => '', 'error' => '' );
    $res = $mysqli->query("SELECT * from `"
                .$mysqli->escape_string(\Config\Config::$dbprefix)
                ."users` WHERE `name` = '"
                .$mysqli->escape_string($login)."' ");
        if(!empty($res) && $res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            
            if(empty($row['password']))
            {
                $wynik['errno'] = '202';
                $wynik['error'] = 'użytkownik ma puste hasło';
                return $wynik; 
            }
            $userpassword = explode("$^$",$row['password']);
            $wynik['basepassword']=$row['password'];
            if(count($userpassword)==1)
            { //Jeżeli 1 pole w haśle, plain text
                if($userpassword[0]==$password)
                {
                    $_SESSION['user']=$row;
                    //echo 'zalogowano '. $row['name'];
                    return true;
                    //TO DO: hashowanie hasła
                }
                else
                {
                    $wynik['errno'] = '203';
                    $wynik['error'] = 'podane hasło nie pasuje do tekstu wpisanego w bazie';
                    return $wynik;
                }
                
                
            }
            elseif(count($userpassword)>2)
            {
                $salt = $userpassword[0];
                $algo = $userpassword[1];
                $hash = $userpassword[2];
                
                $probe = hash($algo, $salt.$password);
                $wynik['probe'] = $probe;
                if(strcasecmp($probe, $hash) === 0 )
                {
                    $_SESSION['user']=$row;
                    return true;
                }
                else
                {
                    $wynik['errno'] = '205';
                    $wynik['error'] = 'hash obliczony nie jest zgodny z tym w bazie';
                    return $wynik;
                }
                
            }
            else
            {
                $wynik['errno'] = '204';
                $wynik['error'] = 'nie obsługiwany zapis hasla w bazie';
                return $wynik;
            }
        }
        else
        {
            $wynik['errno'] = '201';
            $wynik['error'] = 'mysql nie zwróciło takiego użytkownika';
            return $wynik;
        }
    
}

$parametry = array();

if( isset($_POST['login']) && strlen($_POST['login'])>0)
{
    $login = $_POST['login']; // mysqli_escape_string($link)
    $pass = ( isset($_POST['password']) && strlen($_POST['password'])>0 ? $_POST['password'] : null );
    
    $mysqli = new mysqli(\Config\Config::$dbhost, \Config\Config::$dbuser, \Config\Config::$dbpass, \Config\Config::$dbname);
    if ($mysqli->connect_errno)
    {
        $parametry['res'] = "error";
        $parametry['msg']= "Błąd połączenia MySQL [" . $mysqli->connect_errno . "]: " . $mysqli->connect_error;
    }
    else
    {
        $mysqli->query("SET NAMES 'utf8'");
        
        $wynik = uwierzytelnianie($mysqli, $login, $pass);
        if($wynik['basepassword']!==null) $parametry['basepassword']=$wynik['basepassword'];
        if($wynik['probe']!==null) $parametry['probe']=$wynik['probe'];
        if($wynik===true)
        {
            $parametry['res'] = "loged";
            $parametry['msg']= " <h3> Zalogowano <b>". $_SESSION['user']['name']."</b></h3>";
        } 
        else
        {
            $parametry['res'] = "notloged";
            $parametry['msg'] = "Nie udało się zalogować :/<br>\n";
            $parametry['msg'] .= "Błąd: ".$wynik['errno'].". ".$wynik['error'];
        }
        $parametry['wynik']=$wynik;
        
        
        
    }
}
elseif (isset($_GET['logout']) && $_GET['logout'] == '1')
{
    $uname = $_SESSION['user']['name'];
    unset ($_SESSION['user']);
    session_destroy();
    $parametry['res'] = "logouted";
    $parametry['msg']= " <h3> wylogowano <b>". $uname."!</b></h3>";
    //TODO msg wylogowano;
}


// WIDOK

$szablon = \inc\System::$system->getWidok();

$title = "";
$contents = "";
$headers = "";
switch ($parametry['res'] )
{
    case "loged" :
        $title = "Zalogowano";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= "Za chwile zostaniesz przekierowany <br>\n"; 
        $headers='<META HTTP-EQUIV="Refresh" CONTENT="3;URL='.gen_link_var("str","").'">';
    break;
    case "notloged" :
        $title = "Nie udało się zalogować";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= 'Spróbuj ponownie <a href="'.gen_link_var("str","login").'">kliknij tutaj</a>\n'; 

    break;
    case "error" :
        $title = "Błąd";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= 'Spróbuj ponownie <a href="'.gen_link_var("str","login").'">kliknij tutaj</a>\n'; 
    break;
    case "logouted" :
        $title = "Wylogowano";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= "Za chwile zostaniesz przekierowany <br>\n"; 
        $headers='<META HTTP-EQUIV="Refresh" CONTENT="3;URL='.gen_link_var("str","").'">';
    break;
    default :
        $title = "Błąd";
        $contents = "<h3> błąd wewnętrzny</h3>"."<br>\n"; 
        $contents .= 'Spróbuj ponownie <a href="'.gen_link_var("str","login").'">kliknij tutaj</a>\n'; 
    break;
        
}

$szablon->showMessageSite($title,$contents,$headers);

?>