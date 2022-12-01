<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class Mangatest
{
  public function __invoke()
  {
      $db = Database::getInstance();

      $volumes = $db->prepare('SELECT * from manga_volume');
      
      $volumes->execute();

      $manga = $volumes->fetchAll();

      return new Response('mangatest.html.twig', ['get' => $_POST, 'volumes' => $manga] );
      
  }
}
