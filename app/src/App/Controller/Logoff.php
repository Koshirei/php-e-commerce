<?php

namespace App\Controller;

use Framework\Response\Response;

class Logoff
{
  public function __invoke()
  {
      require './init_session.php';

      unset($_SESSION["user"]);

      header("Location: /");
      
      return new Response('home.html.twig');
      
  }
}
