<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class Logoff
{
  public function __invoke()
  {
      session_start();
      if (!isset($_SESSION["langage"])) $_SESSION["langage"] = "fr";

      unset($_SESSION["user"]);

      header("Location: /");
      
      return new Response('home.html.twig');
      
  }
}
