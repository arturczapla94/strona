<?php
//////////////////////////////////////
////
////        L  O  G  I  K  A
////
//////////////////////////////////////
use sys\authentication\User;

$parametry = array();
System::$globalParameters[]='u';
if(isset($_GET['u']) && strlen($_GET['u']) > 0)
{ //jeżeli podano użytkownika
    
    
    
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
        if(strcasecmp($dane['res'], "ok") == 0)
        {
            $this->description = $dane['user']->displayname;
            $this->title = $dane['user']->displayname;
        }
        else
        {
            $this->description = "Błąd";
            $this->title = "Błąd";
        }
    }
    
    
    public function write()
    {
        ?>
    
        <article class="news-block block-block">
    <header class="block-top">
        
    </header>
    <div class="block-contents">
        <?php if(strcasecmp($this->dane['res'],"ok") == 0 ) { ?>
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
                    <th>funckja skrótu do hasła</th> <td><?php echo ($this->dane['user']->getHashAlgo()==null ? "brak" : $this->dane['user']->getHashAlgo() ); ?> </td>
                </tr>
                
            </tbody>
            
        </table>
        <?php
            
        }
        else
        {
            echo "<h2>".$this->dane['msg']."</h2>";
        }
        ?>
        
    </div>
</article>
<?php
    }
}

System::$system->getWidok()->display(new CView($parametry));



?>