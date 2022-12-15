<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getProducts;

class Homepage
{
  public function __invoke()
  { 
      require './init_session.php';

      $getProducts = new getProducts();

      $volume1 = $getProducts->getProductsVolume1();

      return new Response('home.html.twig', ['language'=>$traductions, 'user'=>$_SESSION["user"], "mangas" => $volume1]);
      
  }
}
