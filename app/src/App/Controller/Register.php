<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class Register
{

    public function checkRegister(){
        $error = false;

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $hash = password_hash($password, PASSWORD_BCRYPT);

        if (!isset($_POST["username"])) return ;

        if (empty($username)){
            echo "empty username";
        }

        return $error;
    }    

    public function __invoke()
    {
        $check = $this->checkRegister();
        var_dump($_POST);
            
        return new Response('register.html.twig', ['get' => $_POST] );
        
    }
}
