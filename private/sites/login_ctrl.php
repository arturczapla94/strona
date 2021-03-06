<?php
/***************************************\
 * 
 DROP TABLE str_groups;
 DROP TABLE str_users;

 CREATE TABLE IF NOT EXISTS `str_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;


INSERT INTO `str_groups` (`id`, `name`) VALUES
(1, 'Super user'),
(2, 'Administrator'),
(3, 'Moderator'),
(4, 'Użytkownik'),
(5, 'Nowy');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `str_groups_inheritance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` int(10) unsigned NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `str_groups_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group` int(10) unsigned NOT NULL,
  `node` varchar(120) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=28 ;


INSERT INTO `str_groups_permissions` (`id`, `group`, `node`) VALUES
(1, 2, 'user.seeothers.id'),
(2, 2, 'user.seeothers.name'),
(3, 2, 'user.seeothers.displayname'),
(4, 2, 'user.seeothers.group'),
(5, 2, 'user.seeothers.email'),
(6, 2, 'user.seeothers.register_date'),
(7, 2, 'user.seeothers.last_access'),
(8, 2, 'user.seeothers.last_ip'),
(9, 2, 'user.seeothers.other_ip'),
(10, 2, 'user.seeothers.hash_algo'),
(11, 2, 'user.editothers.name'),
(12, 2, 'user.editothers.displayname'),
(13, 2, 'user.editothers.group  '),
(14, 2, 'user.editothers.email'),
(15, 3, 'user.seeothers.id'),
(16, 3, 'user.seeothers.name'),
(17, 3, 'user.seeothers.displayname'),
(18, 3, 'user.seeothers.group'),
(19, 3, 'user.seeothers.email'),
(20, 3, 'user.seeothers.register_date'),
(21, 3, 'user.seeothers.last_access'),
(22, 3, 'user.seeothers.last_ip'),
(23, 3, 'user.seeothers.other_ip'),
(24, 3, 'user.seeothers.hash_algo'),
(25, 2, 'strphp12.see'),
(26, 3, 'strphp12.see'),
(27, 4, 'strphp12.see');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `str_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `displayname` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  `group` mediumint(9) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_access` timestamp NULL DEFAULT NULL,
  `last_ip` varchar(48) COLLATE utf8_polish_ci DEFAULT NULL,
  `other_ip` varchar(48) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

INSERT INTO `str_users` (`id`, `name`, `displayname`, `password`, `email`, `group`, `reg_date`, `last_access`, `last_ip`, `other_ip`) VALUES
(1, 'root', '', '1234', NULL, 1, '2014-04-09 22:28:43', '2014-04-10 04:27:42', '::1', '192.168.1.105'),
(2, 'Administrator', 'Administrator', '123$^$SHA256$^$416d1ce9ef58f8c99ec24ec7c898a4e0622ff963048a961dfc195637d016d67c', '', 2, '2014-04-10 00:11:10', '2014-04-10 00:11:28', '::1', NULL),
(3, 'user', 'user', 'BV1WSYUB[-pF-a,#|$^$sha256$^$9b26c5276d47c78dffba364abc44e0b7b9b61b3cd9f63bebeb99151864f5f91d', 'user', 4, '2014-04-10 03:59:10', '2014-04-10 04:28:00', '::1', NULL),
(4, 'Moderator', 'mod', 'BV1WSYUB[-pF-a,#|$^$md5$^$05b5d97b6f873d268b8a30f54f25e446', 'mod', 3, '2014-04-10 04:15:09', '2014-04-10 04:16:09', '::1', NULL),
(5, 'nowy', 'nowy', 'BV1WSYUB[-pF-a,#|$^$sha256$^$f016a0506f9e766050599ca12687320d619d56c1cc7e12558c5953ebee321e5b', 'nowy', 5, '2014-04-10 04:27:37', NULL, '::1', NULL);
 
 * 
 */

use sys\authentication\User;
use sys\authentication\UserLib;
function logowanie($mysqli, $row)
{
    $user = UserLib::createFromAssoc($row);
    User::setCurrentUser($user);
    
    $now = time();
    $datetime = date("Y-m-d H:i:s" ,time());
    $user->login_time = $datetime;

    $query = 'UPDATE `'.$mysqli->escape_string(\Config\Config::$dbprefix)
            .'users` SET last_access = \''.$datetime."'";
    if(empty($user->register_date) OR strtotime($user->register_date)===false OR strtotime($user->register_date)<=0 )
    {
        $query .= ', reg_date = '."'".$datetime."'";
        $user->register_date = $datetime;
    }
    if(empty($user->last_ip))
    {
        $query .= ', last_ip = \''.$_SERVER['REMOTE_ADDR']."'";
    }
    elseif ( strcasecmp( $user->last_ip, $_SERVER['REMOTE_ADDR'])!= 0 )
    {
        $query .= ', last_ip = \''.$_SERVER['REMOTE_ADDR']."'";
        $query .= ', other_ip = \''.$user->last_ip."'";
    }
    $query .= ' WHERE `id`='.$user->getId().';';

    $user->setLogged();
    $res = $mysqli->query($query);
    if(!$res)
    {
        return false;
    }
    else
    {
        return true;
    }
}

function uwierzytelnianie($mysqli, $login, $password)
{
    $wynik = array('errno' => '', 'error' => '' );
    $t1 = "`".$mysqli->escape_string(\Config\Config::$dbprefix) ."users`";
    $t2 = "`".$mysqli->escape_string(\Config\Config::$dbprefix) ."groups`";
    $query = "SELECT $t1.`id`,"
        ."$t1.`name`, "
        ."$t1.`displayname`, "
        ."$t1.`password`,"
        ."$t1.`email`, "
        ."$t1.`group`," 
        ."$t1.`reg_date`," 
        ."$t1.`last_access`,"
        ."$t1.`last_ip`," 
        ."$t1.`other_ip`," 
        ."$t2.`name`AS `group_name`"
        ."from $t1 "
        ."LEFT OUTER JOIN $t2 "
        ."ON $t1.`group` = $t2.`id` "
        ."WHERE $t1.`name` = '".$mysqli->escape_string($login)."'";
    
    $res = $mysqli->query($query);
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
                    logowanie($mysqli, $row);
                    //TO DO: hashowanie hasła
                    return true;
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
                    logowanie($mysqli, $row);
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
else
{
    $parametry['res'] = "nodata";
    $parametry['msg'] = "Nie wysłano żadnych danych";
}


// WIDOK

$szablon = System::$system->getWidok();

$title = "";
$contents = "";
$headers = "";
switch ($parametry['res'] )
{
    case "loged" :
        $title = "Zalogowano";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= "Za chwile zostaniesz przekierowany <br>\n"; 
        $contents .= '<br> lub przejdź na <a href="'.System::$system->site->gen_link(Array('str' => '')).'">stronę główną</a> odrazu'; 
        $headers='<META HTTP-EQUIV="Refresh" CONTENT="3;URL='.System::$system->site->gen_link(Array('str' => '')).'">';
    break;
    case "notloged" :
        $title = "Nie udało się zalogować";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= 'Spróbuj ponownie <a href="'.System::$system->site->gen_link(Array("str"=>"login")).'">kliknij tutaj</a>'; 
        $contents .= '<br> lub przejdź na <a href="'.System::$system->site->gen_link(Array("str" => "")).'">stronę główną</a>'; 

    break;
    case "error" :
        $title = "Błąd";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= 'Spróbuj ponownie <a href="'.System::$system->site->gen_link(Array("str"=>"login")).'">kliknij tutaj</a>'; 
        $contents .= '<br> lub przejdź na <a href="'.System::$system->site->gen_link(Array("str"=>"")).'">stronę główną</a>'; 
    break;
    case "logouted" :
        $title = "Wylogowano";
        $contents = $parametry['msg']."<br>\n"; 
        $contents .= "Za chwile zostaniesz przekierowany <br>\n"; 
        $contents .= '<br> lub przejdź na <a href="'.System::$system->site->gen_link(Array("str"=>"")).'">stronę główną</a> odrazu'; 
        $headers='<META HTTP-EQUIV="Refresh" CONTENT="3;URL='.System::$system->site->gen_link(Array("str"=>"")).'">';
    break;
    default :
        $title = "Błąd";
        $contents = "<h3> błąd wewnętrzny</h3>"."<br>\n"; 
        if(!empty( $parametry['msg'])) 
        {
            $contents .=  $parametry['msg'];
        }
        $contents .= 'Spróbuj ponownie <a href="'.System::$system->site->gen_link(Array("str" => "login")).'">kliknij tutaj</a>'; 
        $contents .= '<br> lub przejdź na <a href="'.System::$system->site->gen_link(Array("str" => "")).'">stronę główną</a>'; 
    break;
        
}

$szablon->showMessageSite($title,$contents,$headers);

?>