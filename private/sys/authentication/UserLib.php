<?php

namespace sys\authentication;

use sys\Database;
use sys\authentication\User;
/**
 *
 * @author Artek
 */
abstract class UserLib {
    
    /** 
     * @return User użytkownik
     * @return false jeżeli nie ma takiego użytkownika
     */
    public static function getUserRow($username)
    {
        $db = new Database();
        $t1 = $db->table('users');
        $t2 = $db->table('groups');
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
            ."WHERE $t1.`name` = '".$db->escape_string($username)."'";
        $res = $db->query($query);
        $db->close();
        if(!empty($res) && $res->num_rows > 0)
        {
            $row = $res->fetch_assoc();
            return $row;
        }
        else
        {
            return false;
        }
    }
    
    /** @return User */
    public static function createFromAssoc($assocTable)
    {
        if(is_array($assocTable) && count($assocTable)>0)
        {
            $user = new User($assocTable['id'], $assocTable['name'], $assocTable['password']);
            $user ->displayname   = ( strlen($assocTable['displayname'])>0 ? $assocTable['displayname'] : $assocTable['name'] );
            $user -> email        = $assocTable['email'];
            $user -> group        = $assocTable['group'];
            $user -> groupname    = $assocTable['group_name'];
            $user -> register_date= $assocTable['reg_date'];
            $user -> last_access  = $assocTable['last_access'];
            $user -> last_ip      = $assocTable['last_ip'];
            $user -> other_ip     = $assocTable['other_ip'];
            return $user;
        }
        else
        {
            return null;
        }
    }
    
    /**
     * @param String $username
     * @return User
     */
    public static function getUser($username)
    {
        $t = self::getUserRow($username);
        return self::createFromAssoc($t);
    }
    
    /** @return array */
    public static function getGroups()
    {
        $db = new Database();
        $query = "SELECT `id`,`name` FROM ". $db->table('groups');
        
        $res = $db->query($query);
        $db->close();
        
        $groups=array();
        
        while(($row=$res->fetch_row()))
        {
            $groups[$row[0]]=$row[1];
        }
        return $groups;
    }
}
