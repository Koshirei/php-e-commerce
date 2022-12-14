<?php

namespace Services\mysql_PDO;

use Database\Database;
use Interfaces\interface_updateUser;

class updateUser implements interface_updateUser{

    public function updateUser($user)
    {
        $db = Database::getInstance();

        $sql = 'UPDATE users
                SET username = :username , 
                email = :email ,
                password = :password ,
                address = :address ,
                city = :city , 
                postal_code = :postal_code , 
                phone_number = :phone_number 
                WHERE id = :id';

        $query = $db->prepare($sql);

        $query->bindParam("username", $user->getUsername());
        $query->bindParam("email", $user->getEmail());
        $query->bindParam("password", $user->getPassword());
        $query->bindParam("address", $user->getAddress());
        $query->bindParam("city", $user->getCity());
        $query->bindParam("postal_code", $user->getPostal_Code());
        $query->bindParam("phone_number", $user->getPhone_Number());
        $query->bindParam("id", $user->getId());

        $query->execute();

    }

}