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
        $address = htmlspecialchars($_POST["address"]);
        $city = htmlspecialchars($_POST["city"]);
        $postal_code = htmlspecialchars($_POST["postal_code"]);
        $phone_number = htmlspecialchars($_POST["phone_number"]);

        if (empty($username)){
            $error["empty_user"] = true;
        }else if (strlen($username) < 8){
            $error["username_size"] = true;
        }else{
            $count = $register->checkUsernameAlreadyInDB($username);
            if ($count === 1){
                $error["dupe_username"] = true;
            }
        }

        if(empty($password)){
            $error["empty_pass1"] = true;
        }else if (strlen($password) < 8){
            $error["password_size"] = true;
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

        if (empty($address)){
            $error["empty_address"] = true;
        }

        if (empty($city)){
            $error["empty_city"] = true;
        }

        if (empty($postal_code)){
            $error["empty_postal_code"] = true;
        }

        if (empty($phone_number)){
            $error["empty_phone_number"] = true;
        }

        if (empty($error)){
            $this->registerUser($register, $username, $email, $password, $address, $city, $postal_code, $phone_number);
            header("Location: /login");
        }

        return $error;
    }

    public function registerUser($register, $username, $email, $password, $address, $city, $postal_code, $phone_number){

        $password = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(
            "0",
            $username, 
            $email, 
            $password,
            "USER",
            $address,
            $city,
            $postal_code,
            $phone_number
        );
        $result_insert = $register->registerNewUser($user);
        var_dump($result_insert);
    }

    public function __invoke()
    {
        require './init_session.php';
        
        if (isset($_SESSION["user"])) header("Location: /");

        $register = new RegisterUser;

        $error = $this->checkRegister($register);

            
        return new Response('register.html.twig', ['errors' => $error, 'language'=>$traductions, 'user'=>$_SESSION["user"], "post"=>$_POST]);
        
    }
}
