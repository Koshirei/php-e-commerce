<?php

namespace Services\mysql_PDO;

use PDO;
use Interfaces\interface_LoginUser;
use Database\Database;

class LoginUser implements interface_LoginUser{

    public function LoginByUsername($username){
        $db = Database::getInstance();  

        $sql = 'SELECT * from users where username=:username';
        $getuser = $db->prepare($sql);

        $getuser->bindParam("username", $username);
        $getuser->execute();

        $user = $getuser->fetch();

        return $user;
    }

}