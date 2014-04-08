<?php

namespace sys\authentication;

class User
{
    public $name;
    public $group;
    public $email;
    public $register_date;
    public $last_access;
    public $last_ip;
    public $other_ip;
    
    
    private $id;
    private $logged;
    
    public function getId()
    {
        return $this->id;
    }
    
    /*
     * @param $id id of user
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    
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
    
    
    
}


