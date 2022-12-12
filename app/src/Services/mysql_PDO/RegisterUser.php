<?php

namespace Services\mysql_PDO;

use Interfaces\interface_RegisterUser;
use Database\Database;

class RegisterUser implements interface_RegisterUser{

    public function checkUsernameAlreadyInDB($username):int
    {
        $db = Database::getInstance();

        $sql = 'SELECT COUNT(*) from users where username=:username';

        $query = $db->prepare($sql);

        $query->bindParam("username", $username);
        $query->execute();

        $count = $query->fetch();

        return $count[0];
    }

    public function checkEmailAlreadyInDB($email):int
    {
        $db = Database::getInstance();

        $sql = 'SELECT COUNT(*) from users where email=:email';

        $query = $db->prepare($sql);

        $query->bindParam("email", $email);
        $query->execute();

        $count = $query->fetch();

        return $count[0];
    }

    public function registerNewUser($user)
    {
        $username = $user->getUsername();
        $email = $user-> getEmail();
        $password = $user->getPassword();
        $role = $user-> getRole();

        $db = Database::getInstance();

        $sql = 'INSERT into users (username, email, password, role) VALUES (:username, :email, :password, :role)';

        $query = $db->prepare($sql);

        $query->bindParam("username", $username);
        $query->bindParam("email", $email);
        $query->bindParam("password", $password);
        $query->bindParam("role", $role);

        $query->execute();

        $result = $query->fetch();

        return $result;
    }
}