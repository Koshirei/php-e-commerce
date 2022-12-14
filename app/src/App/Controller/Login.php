<?php

namespace App\Controller;

use Entity\User;
use Framework\Response\Response;
use Services\mysql_PDO\LoginUser;

class Login
{ 
  public function checkLogin(){
    $error = false;

      if ( !isset($_POST["username"])) return ;

        $LoginUser = new LoginUser;
        $userinfo = $LoginUser->LoginByUsername($_POST["username"]);
        
        if ($userinfo){

          if(password_verify($_POST["password"], $userinfo["password"])){
              $user = new User(
                  $userinfo["id"], 
                  $userinfo["username"],
                  $userinfo["email"],
                  $userinfo["password"],
                  $userinfo["role"],
                  $userinfo["address"],
                  $userinfo["city"],
                  $userinfo["postal_code"],
                  $userinfo["phone_number"]);
                  
              $_SESSION["user"] = $user;
          }else{
              $error = true;
            }
        }else{
          $error = true;
        }
      

      return $error; 
  }

  public function __invoke()
  {

      require './init_session.php';

      $error = $this->checkLogin();
      
      if (isset($_SESSION["user"])) header("Location: /");

      return new Response('login.html.twig', ["error"=>$error, 'language'=>$traductions, 'user'=>$_SESSION["user"]]);
      
  }

}
