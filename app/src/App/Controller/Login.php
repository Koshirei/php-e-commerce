<?php

namespace App\Controller;

use Entity\User;
use Framework\Response\Response;
use Languages\Languages;
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
              $user = new User($userinfo["username"],$userinfo["email"],$userinfo["password"],$userinfo["role"]);
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

    session_start();
    if (!isset($_SESSION["langage"])) $_SESSION["langage"] = "FR";
    if (isset($_GET["lan"])) $_SESSION["langage"] = $_GET["lan"];

    $langue = new Languages($_SESSION["langage"]);
    $traductions = $langue->getLanguage();


      $error = $this->checkLogin();

      if (isset($_SESSION["user"])) header("Location: /");

      return new Response('login.html.twig', ["error"=>$error, 'language'=>$traductions]);
      
  }

}
