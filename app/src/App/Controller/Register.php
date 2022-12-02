<?php

namespace App\Controller;

use Entity\User;
use Framework\Response\Response;
use Services\mysql_PDO\RegisterUser;

class Register
{

    public function checkRegister($register){

        $error = [];
        
        if (!isset($_POST["username"])) return $error;
        

        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $password2 = htmlspecialchars($_POST["password2"]);
        $email = htmlspecialchars($_POST["email"]);

        if (empty($username)){
            $error["empty_user"] = true;
        }else{
            $count = $register->checkUsernameAlreadyInDB($username);
            if ($count === 1){
                $error["dupe_username"] = true;
            }
        }

        if(empty($password)){
            $error["empty_pass1"] = true;
        }

        if (empty($password2)){
            $error["empty_pass2"] = true;
        }

        if ($password !== $password2){
            $error["match_password"] = true;
        }

        if (empty($email)){
            $error["empty_email"] = true;
        }else{
            $count = $register->checkEmailAlreadyInDB($email);
            if ($count === 1){
                $error["dupe_email"] = true;
            }
        }

        if (empty($error)){
            $this->registerUser($register, $username, $email, $password);
            header("Location: /login");
        }

        return $error;
    }

    public function registerUser($register, $username, $email, $password){

        $password = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($username, $email, $password);
        $result_insert = $register->registerNewUser($user);
        var_dump($result_insert);
    }

    public function __invoke()
    {
        session_start();
        if (!isset($_SESSION["langage"])) $_SESSION["langage"] = "FR";

        echo $_SESSION["langage"];

        $register = new RegisterUser;

        $error = $this->checkRegister($register);
            
        return new Response('register.html.twig', ['get' => $_POST, 'errors' => $error, 'language'=>$_SESSION["langage"]] );
        
    }
}
