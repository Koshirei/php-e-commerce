<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;
use Services\mysql_PDO\orders;

class Mangatest
{
  public function __invoke()
  {
      

      return new Response('mangatest.html.twig', ['get' => $_POST] );
      
  }
}
