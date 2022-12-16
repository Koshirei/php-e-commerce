<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class MangaCommonDelete
{
  public function __invoke()
  {
    require './init_session.php';
    
    return new Response('mangaCommonDelete.html.twig');
      
  }
}
