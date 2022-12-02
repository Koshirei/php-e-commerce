<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\LoginUser;

class Login
{ 
  public function checkLogin(){
    $error = false;

      if ( !isset($_POST["username"])) return ;

        $LoginUser = new LoginUser;
        $user = $LoginUser->LoginByUsername($_POST["username"]);
        
        if ($user){

          if(password_verify($_POST["password"], $user["password"])){
              echo "faire session ;)"; // et redirection
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

      $error = $this->checkLogin();

      return new Response('login.html.twig', ["post"=>$_POST, "error"=>$error]);
      
  }

}
