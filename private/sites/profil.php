<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
use sys\authentication\User;
use sys\authentication\UserLib;


$parametry = array();
System::$globalParameters[]='u';
if(isset($_GET['u']) && strlen($_GET['u']) > 0)
{ //jeżeli podano użytkownika
    
    if(User::curUsr()!=null && User::curUsr()->isLogged())
    { // jeżeli jest zalogowany
        $user = UserLib::getUser($_GET['u']);
        if($user!=null)
        { //jeżeli użytkownik istnieje
            
            if(isset($_POST['submit']) && $_POST['submit']='sent')
            {
                $parametry['msg2']="";
                $zmian=0;
                $noperm = 0;
                if(strcmp($user->name, $_POST['name'])!=0)
                {
                    if(User::curUsr()->hasPerm(user.editothers.name))
                    {
                        $user->name = $_POST['name'];
                        $_GET['u'] = $_POST['name'];
                        $zmian++;
                    }
                    else
                    {
                        $noperm++;
                    }
                }
                if(strcmp($user->displayname, $_POST['displayname'])!=0)
                {
                    if(User::curUsr()->hasPerm(user.editothers.displayname))
                    {
                        $user->displayname = $_POST['displayname'];
                        $zmian++;
                    }
                    else
                    {
                        $noperm++;
                    }
                }
                if($user->group != $_POST['groupname'])
                {
                    if(User::curUsr()->hasPerm(user.editothers.group))
                    {
                        $user->group = $_POST['groupname'];
                        $zmian++;
                    }
                    else
                    {
                        $noperm++;
                    }
                }
                if(strcmp($user->email, $_POST['email'])!=0)
                {
                    if(User::curUsr()->hasPerm(user.editothers.email))
                    {
                        $user->email = $_POST['email'];
                        $zmian++;
                    }
                    else
                    {
                        $noperm++;
                    }
                }
                if($zmian>0)
                {
                    if(UserLib::updateUserInBase($user))
                    {
                        $parametry['msg2'].="Zmodyfikowano $zmian pól! ";
                    }
                    else
                    {
                        $parametry['msg2'].="Nie oczekiwany błąd. ";
                    }
                    
                }
                if($noperm>0)
                {
                    $parametry['msg2'].="Brak uprawnień do $noperm pól! ";
                }
            }
            
            
            if(User::curUsr()->hasPerm("user.seeothers.id"))
            {
                $parametry['user']['id']=array("ID: ",$user->getId());
            }

            if(User::curUsr()->hasPerm("user.seeothers.name"))
            {
                $parametry['user']['name']=array("Nazwa użytkownika: ",$user->name);
                if(User::curUsr()->hasPerm("user.editothers.name"))
                {
                    $parametry['user']['name'][2]="text";
                }
            }

            if(User::curUsr()->hasPerm("user.seeothers.displayname"))
            {
                $parametry['user']['displayname']=array("Nazwa wyświetlana: ",$user->displayname);
                if(User::curUsr()->hasPerm("user.editothers.displayname"))
                {
                    $parametry['user']['displayname'][2]="text";
                }
            }

            if(User::curUsr()->hasPerm("user.seeothers.group"))
            {
                $parametry['user']['group']=array("ID grupy: ",$user->group);
                $parametry['user']['groupname']=array("Nazwa grupy: ",$user->groupname);
                if(User::curUsr()->hasPerm("user.editothers.group"))
                {
                    $parametry['user']['groupname'][2]="select";
                    $parametry['user']['groupname'][3]= UserLib::getGroups();
                }
            }

            if(User::curUsr()->hasPerm("user.seeothers.email"))
            {
                $parametry['user']['email']=array("E-mail: ",$user->email);
                if(User::curUsr()->hasPerm("user.editothers.email"))
                {
                    $parametry['user']['email'][2]="text";
                }
            }

            if(User::curUsr()->hasPerm("user.seeothers.register_date"))
            {
                $parametry['user']['register_date']=array("Data rejestracji: ",$user->register_date);
            }

            if(User::curUsr()->hasPerm("user.seeothers.last_access"))
            {
                $parametry['user']['last_access']=array("Ostatni dostęp: ",$user->last_access);
            }

            if(User::curUsr()->hasPerm("user.seeothers.last_ip"))
            {
                $parametry['user']['last_ip']=array("Ostatnie IP: ",$user->last_ip);
            }

            if(User::curUsr()->hasPerm("user.seeothers.other_ip"))
            {
                $parametry['user']['other_ip']=array("Przedostatnie IP: ",$user->other_ip);
            }

            if(User::curUsr()->hasPerm("user.seeothers.hash_alg"))
            {
                $parametry['user']['hash_alg']=array("funckja skrótu do hasła: ",
                     ($user->getHashAlgo()==null ? "brak" : $user->getHashAlgo() ));
            }

            if(count($parametry['user'])>0)
            {
                $parametry['res'] = "ok";
            }
            else
            {
                $parametry['res'] = "error";
                $parametry['errno'] = "302";
                $parametry['msg']= "Użytkownik nie istnieje lub nie masz uprawnień!";
            }

        }
        else
        {
            $parametry['res'] = "error";
            $parametry['errno'] = "301";
            $parametry['msg']= "Użytkownik nie istnieje lub nie masz uprawnień!";
        }
    }
    else
    {
        $parametry['res'] = "error";
        $parametry['errno'] = "302";
        $parametry['msg']= "Użytkownik nie istnieje lub nie masz uprawnień!";
    }
      
}
else
{ // jeżeli nie podano użytkownika
    $user = User::curUsr();
    if($user!=null && $user->isLogged())
    { // jeżeli jest zalogowany
        $parametry['user']=$user;
        $parametry['res'] = "ok";
    }
    else
    { //jeżeli nie jest zalogowany
        $parametry['res'] = "error";
        $parametry['errno'] = "120";
        $parametry['msg']= "Brak autoryzacji!";
    }
}



//////////////////////////////////////
////
////        W  I  D  O  K
////
//////////////////////////////////////

class CView extends inc\ViewBasic {
    function __construct($dane) {
        $this->dane = $dane;
        $this->customHeaders = '' //'<link rel="stylesheet" href="public/res/zhome/home.css" type="text/css" />'
            //. '<script type="text/javascript" src="public/res/zhome/home.js"> </script>'
. <<<EOT
<style>
   
</style>
EOT;
       /* if(strcasecmp($dane['res'], "ok") == 0)
        {
            $this->description = $dane['user']->displayname;
            $this->title = $dane['user']->displayname;
        }
        else
        {*/
            $this->description = "Profil";
            $this->title = "Profil";
       /* }*/
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
        <?php
            if (isset($this->dane['msg2']) && strlen($this->dane['msg2'])>0)
            {
                echo "<h3>".$this->dane['msg2']."</h3>";
            }
        ?>
        
        <form name="profile-edit" action="<?php 
    echo System::$system->site->gen_link(array('str'=>$_GET['str'],'action'=>'edit','u'=>$_GET['u']));
                
                ?>" method="post" >
            <fieldset style="border: none;">
  <?php if(strcasecmp($this->dane['res'],"ok") == 0 )
        { 
            if(is_object($this->dane['user']))
            {
            
    ?>
        <table>
            <tbody>
                <tr>
                    <th>ID</th> <td><?php echo $this->dane['user']->getId(); ?> </td>
                </tr>
                <tr>
                    <th>Nazwa użytkownika:</th> <td><?php echo $this->dane['user']->name; ?> </td>
                </tr>
                <tr>
                    <th>Nazwa wyświetlana:</th> <td><?php echo $this->dane['user']->displayname; ?> </td>
                </tr>
                <tr>
                    <th>ID grupy:</th> <td><?php echo $this->dane['user']->group; ?> </td>
                </tr>
                <tr>
                    <th>Nazwa grupy:</th> <td><?php echo $this->dane['user']->groupname; ?> </td>
                </tr>
                <tr>
                    <th>E-mail:</th> <td><?php echo $this->dane['user']->email; ?> </td>
                </tr>
                <tr>
                    <th>Data rejestracji:</th> <td><?php //echo date("Y-m-d H:i e" ,$this->dane['user']->register_date); 
                        echo $this->dane['user']->register_date
                    ?> </td>
                </tr>
                <tr>
                    <th>Ostatni dostęp:</th> <td><?php //echo date("Y-m-d H:i e" ,$this->dane['user']->last_access);
                        echo $this->dane['user']->last_access;
                    ?> </td>
                </tr>
                <tr>
                    <th>Czas uwierzytelnienia:</th> <td><?php //echo date("Y-m-d H:i e" ,$this->dane['user']->login_time); 
                        echo $this->dane['user']->login_time;
                    ?> </td>
                </tr>
                <tr>
                    <th>Bieżące IP:</th> <td><?php echo $_SERVER['REMOTE_ADDR']; ?> </td>
                </tr>
                <tr>
                    <th>Ostatnie IP:</th> <td><?php echo $this->dane['user']->last_ip; ?> </td>
                </tr>
                <tr>
                    <th>Przedostatnie IP: </th> <td><?php echo $this->dane['user']->other_ip; ?> </td>
                </tr>
                <tr>
                    <th>funckja skrótu do hasła:</th> <td><?php echo ($this->dane['user']->getHashAlgo()==null ? "brak" : $this->dane['user']->getHashAlgo() ); ?> </td>
                </tr>
                
            </tbody>
            
        </table>
        <?php
            }
            elseif(is_array($this->dane['user']))
            {
                echo "<table><tbody>\n";
                foreach($this->dane['user'] as $property => $value)
                {
                    echo "<tr>\n";
                    echo "<th>{$value[0]}</th><td>";
                    
                    if(isset($value[2]))
                    {
                        switch ($value[2])
                        {
                            case 'text' :
                                echo '<input type="text" name="'.$property.'" value="'.$value[1].'" />';
                                break;
                            case 'select' :
                                echo '<select name="'.$property.'">';
                                foreach ($value[3] as $id => $name)
                                {
                                    echo '<option value="'.$id.'"';
                                    if(strcasecmp($value[1], $name)===0)
                                    {
                                        echo ' selected="selected"';
                                    }
                                    echo ">".$name."</option>\n";
                                }
                                echo '</select>';
                                break;
                            default :
                                echo $value[1];
                        }
                    }
                    else
                    {
                        echo $value[1];
                    }
                    
                    echo "</td>\n";
                    echo "<tr>\n";
                }
                echo "</tbody></table>\n";
                
            }
            else
            {
                echo "<h2>Błąd wewnętrzny </h2>";
            }
        }
        else
        {
            echo "<h2>".$this->dane['errno'].". ".$this->dane['msg']."</h2>";
        }
        ?>
                 <button type="submit" name="submit" value="sent" >Wyślij</button>
        </fieldset>
        </form>
    </div>
</article>
<?php
    }
}

System::$system->getWidok()->display(new CView($parametry));



?>