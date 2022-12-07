<?php

namespace App\Controller;


use PDO;
use Framework\Response\Response;
use Languages\Languages;

class Homepage
{
  public function __invoke()
  { 
      require './init_session.php';

      return new Response('home.html.twig', ['language'=>$traductions]);
      
  }
}
