<?php

namespace App\Controller;


use PDO;
use Framework\Response\Response;

class Mangatest
{
  public function __invoke()
  {
      $db = new PDO('mysql:host=localhost;dbname=clause_marotta_manga_e_commerce', "root", "clause");  

      $volumes = $db->prepare('SELECT * from manga_volume');
      $volumes->execute();

      $manga = $volumes->fetchAll();

      return new Response('mangatest.html.twig', ['get' => $_GET, 'volumes' => $manga] );
      
  }
}
