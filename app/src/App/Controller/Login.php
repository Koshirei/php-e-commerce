<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\LoginUser;

class Login
{ 
  public function checkLogin(){
    $error = false;

      if ( isset($_POST["username"])){

        $LoginUser = new LoginUser;
        $user = $LoginUser->LoginByUsername($_POST["username"]);
        
        if ($user){

          $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);

          if(!password_verify($_POST["password"], $user["password"])){
            $error = true;
          }
        }else{
          $error = true;
        }
      }

      return $error; 
  }

  public function __invoke()
  {
      $check = $this->checkLogin();

      if ($check) echo "faire session ;)";

      return new Response('login.html.twig', ["post"=>$_POST, "error"=>$check]);
      
  }

}
