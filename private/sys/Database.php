<?php


namespace sys;

/**
 * 
 *
 * @author Artur
 */
class Database {

    /** @var mysqli */
    static private $driver;
    static private $res = "";
    static private $msg = "";
    
    public function __construct()
    {
        Database::$driver = new \mysqli(\Config\Config::$dbhost,
                \Config\Config::$dbuser,
                \Config\Config::$dbpass,
                \Config\Config::$dbname);
        if (Database::$driver->connect_errno)
        {
            Database::$res = "error";
            Database::$msg = "Błąd połączenia MySQL ["
                    . $mysqli->connect_errno . "]: " 
                    . $mysqli->connect_error;
        }
        else
        {
            Database::$driver->query("SET NAMES 'utf8'");
            Database::$res = "ok";
        }
    }
    
    public function connected()
    {
        if(Database::$res == "ok")
        {
            return true;
        }
        else
        {
            return Array('res' => Database::$res,
                         'msg' => Database::$msg);
        }
    }
    
    public function query($query)
    {
        return Database::$driver->query($query);
    }
    
    public function table($name)
    {
        return "`". urlencode(\Config\Config::$dbprefix) . $name . "`";
    }
    
    public function escape_string($string)
    {
        return self::$driver->escape_string($string);
    }
    
    public function close()
    {
        Database::$driver->close();
    }
    
    public function mysqli()
    {
        return self::$driver;
    }
}
