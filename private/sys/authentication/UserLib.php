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
    
    public static function getAllUsersSimple()
    {
        $users=array();
        
        $db = new Database();
        $t1 = $db->table('users');
        $t2 = $db->table('groups');
        $query = "SELECT $t1.`id`,"
            ."$t1.`name`, "
            ."$t1.`displayname`, "
            ."$t1.`group`," 
            ."$t2.`name`AS `groupname`"
            ."from $t1 "
            ."LEFT OUTER JOIN $t2 "
            ."ON $t1.`group` = $t2.`id` ";
 
        $res = $db->query($query);
        $db->close();
        if(!empty($res) && $res->num_rows > 0)
        {
            while($row = $res->fetch_assoc())
            {
                $users[$row['id']] = $row;
            }
            return $users;
        }
        else
        {
            return null;
        }
    }
    
    
    /** @param User $user użytkownik to zaktualizowania w bazie */
    public static function updateUserInBase($user)
    {
        $db = new Database();
        $t1 = $db->table('users');
        $query = 'UPDATE '.$t1.' SET `name` = \''.$user->name."'"
                . ', `displayname` = \''.$user->displayname."'"
                . ', `group` = \''.$user->group."'"
                . ', `email` = \''.$user->email."'";
    
        $query .= ' WHERE `id`='.$user->getId().';';
        $res = $db->query($query);
        $db->close();
        
        $groups = self::getGroups();
        $user->groupname = $groups[$user->group];
        
        return $res;        
    }
    
    public static function createUser($name, $password, $hash='sha256', $email=null, $displayname=null)
    {
        $db = new Database();
        $t1 = $db->table('users');
        
        $phash = hash($hash, \Config\Config::$salt.$password);
        $query = 'INSERT INTO '.$t1.' (`name`, `displayname`, `password`, `email`, `group`, `reg_date`, `last_ip`) VALUES (' 
                . "'".$db->escape_string($name)."', "
                . ($displayname==null ? null : "'".$db->escape_string($displayname)."'") . ", "
                . "'".\Config\Config::$salt."$^$".$db->escape_string($hash)."$^$".$phash ."', "
                . ($email==null ? null : "'".$db->escape_string($email)."'").", "
                . \Config\Config::DEFAULT_GROUP. ", "
                . "'".date("Y-m-d H:i:s" ,time())."', "
                . "'".$_SERVER['REMOTE_ADDR']."')";
    
        $res = $db->query($query);
        $db->close();
        return $res;
    }
    
    public static function getGroupsNodes($groupId)
    {
        $nodes=array();
        
        $db = new Database();
        $t1 = $db->table('groups_permissions');
        $query = "SELECT `node` FROM {$t1} WHERE `group`={$groupId}";
 
        $res = $db->query($query);
        $db->close();
        if(!empty($res) && $res->num_rows > 0)
        {
            while($row = $res->fetch_row())
            {
                $nodes[] = $row[0];
            }
            return $nodes;
        }
        else
        {
            return null;
        }
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
