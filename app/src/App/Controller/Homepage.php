<?php

namespace App\Controller;

use Framework\Response\Response;

class Homepage
{
  public function __invoke()
  { 
      require './init_session.php';

      return new Response('home.html.twig', ['language'=>$traductions]);
      
  }
}
