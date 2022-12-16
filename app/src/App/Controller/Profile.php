<?php

namespace App\Controller;

use Entity\User;
use Framework\Response\Response;
use Services\mysql_PDO\RegisterUser;
use Services\mysql_PDO\updateUser;

class Profile
{

    public function checkRegister($register){

        $error = [];
        
        if (!isset($_POST["username"])) return $error;
        
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $email = htmlspecialchars($_POST["email"]);
        $address = htmlspecialchars($_POST["address"]);
        $city = htmlspecialchars($_POST["city"]);
        $postal_code = htmlspecialchars($_POST["postal_code"]);
        $phone_number = htmlspecialchars($_POST["phone_number"]);

        if (empty($username)){
            $error["empty_user"] = true;
        }else if (strlen($username) < 8){
            $error["username_size"] = true;
        }else if ($_SESSION["user"]->getUsername() !== $username ){
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

        if ($_POST["new_password"]!==""){
            if(strlen($_POST["new_password"]) < 8){
                $error["new_password_size"] = true;
            }

            if ($_POST["new_password"] !== $_POST["new_password2"]){
                $error["match_password"] = true;
            }
        }

        if (empty($email)){
            $error["empty_email"] = true;
        }else if ($_SESSION["user"]->getEmail() !== $email){
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

        if (!password_verify($password, $_SESSION["user"]->getPassword())){
            $error["wrong_password"] = true;
        }

        if (empty($error)){

            if ($_POST["new_password"] !== "" ){
                $password = $_POST["new_password"];
            }

            $this->updateUser($register, $username, $email, $password, $address, $city, $postal_code, $phone_number);
            header("Location: /profile?success=true");
        }

        return $error;
    }

    public function updateUser($register, $username, $email, $password, $address, $city, $postal_code, $phone_number){

        $password = password_hash($password, PASSWORD_BCRYPT);
        $user = new User(
            $_SESSION["user"]->getId(),
            $username, 
            $email, 
            $password,
            $_SESSION["user"]->getRole(),
            $address,
            $city,
            $postal_code,
            $phone_number
        );

        $_SESSION["user"] = $user;

        $updateUser = new updateUser();
        $updateUser->updateUser($user);
        
    }

    public function __invoke()
    {
        require './init_session.php';
        
        if (!isset($_SESSION["user"])) header("Location: /");

        $register = new RegisterUser;

        $error = $this->checkRegister($register);

            
        return new Response('profile.html.twig', ['errors' => $error, 'get'=>$_GET, 'language'=>$traductions, 'user'=>$_SESSION["user"]]);
        
    }
}
