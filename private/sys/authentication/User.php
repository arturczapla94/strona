<?php

namespace sys\authentication;

class User
{
    /** @var string */
    public $name="";
    /** @var string */
    public $displayname="";
    /** @var integer */
    public $group=0;
    /** @var string */
    public $groupname="";
    /** @var string */
    public $email="";
    /** @var timestamp */
    public $register_date=0;
    /** @var timestamp */
    public $last_access=0;
    /** @var timestamp */
    public $login_time=0;
    /** @var string */
    public $last_ip="";
    /** @var string */
    public $other_ip="";
    
    
    /** @var int */
    private $id=0;
    /** @var boolean */
    private $logged=false;
    /** @var string */
    private $password_hash="";
    
    /** @return int id z bazy danych */
    public function getId()
    {
        return $this->id;
    }
    
    /*
     * @param $id id of user
     */
    public function __construct($id, $name, $password_hash=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password_hash = $password_hash;
    }
    

    /** @return boolean true jeśli jest zalogowany, w przeciwnym wypadku false */
    public function isLogged()
    {
        return $this->logged;
    }
    public function setLogged()
    {
        $this->logged = true;
    }
    public function setUnlogged()
    {
        $this->logged = false;
    }
    
    public static function setCurrentUser($user)
    {
        \System::$system->setSessionData("current_user", $user);
    }
    
    /** @return User użytkownik zalogowany w tej sesji (może być już wylogowany) */
    public static function curUsr()
    {
        return \System::$system->getSessionData("current_user");
    }
    
    /** @return string nazwa algorytmu hashującego*/
    public function getHashAlgo()
    {
        $userpassword = explode("$^$",$this->password_hash);
        if( count($userpassword)>2 && strlen($userpassword[1])>0 )
        {
            return $userpassword[1];
        }
        else
        {
            return null;
        }
     
    }
    
    /** @return boolean */
    public function hasPerm($node)
    {
        if($this->group==1)
        {
            return true;
        }
        else
        {
            $nodes = UserLib::getGroupsNodes($this->group);
            if(is_array($nodes))
            {
                return in_array($node, $nodes);
            }
            else
            {
                return false;
            }
        }
        
    }
    
    
    
}


