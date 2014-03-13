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
            if(count($userpassword)==1)
            { //Jeżeli 1 pole w haśle, plain text
                if($userpassword[0]==$password)
                {
                    $_SESSION['user']=$row;
                    echo 'zalogowano '. $row['name'];
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
                
                if($probe == $hash)
                {
                    $_SESSION['user']=$row;
                    echo 'zalogowano '. $row['name'];
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


if( isset($_POST['login']) && strlen($_POST['login'])>0)
{
    $login = $_POST['login']; // mysqli_escape_string($link)
    $pass = ( isset($_POST['password']) && strlen($_POST['password'])>0 ? $_POST['password'] : null );
    
    $mysqli = new mysqli(\Config\Config::$dbhost, \Config\Config::$dbuser, \Config\Config::$dbpass, \Config\Config::$dbname);
    if ($mysqli->connect_errno)
    {
        echo "Błąd połączenia MySQL [" . $mysqli->connect_errno . "]: " . $mysqli->connect_error;
    }
    else
    {
        $mysqli->query("SET NAMES 'utf8'");
        
        $wynik = uwierzytelnianie($mysqli, $login, $pass);
        echo "<br><br>\n\n";
        var_dump($wynik);
        
        /*
        if(!empty($_SESSION['user']))
        {
            //$_SESSION['user']['last_ip']
            //$_SESSION['user']['another_ip']
            $query = "UPDATE `"
            $mysqli->query($query);
        }*/
        
    }
}
elseif (isset($_GET['logout']) && $_GET['logout'] == '1')
{
    unset ($_SESSION['user']);
    session_destroy();
    echo 'wylogowano!';
    //TODO msg wylogowano;
}


?>