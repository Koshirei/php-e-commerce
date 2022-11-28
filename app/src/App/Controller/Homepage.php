<?php

namespace App\Controller;


use PDO;
use Framework\Response\Response;

class Homepage
{
  public function __invoke()
  {

      return new Response('home.html.twig', ['get' => $_GET]);
      
  }
}
