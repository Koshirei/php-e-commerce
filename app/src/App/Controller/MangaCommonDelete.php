<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class MangaCommonDelete
{
  public function __invoke()
  {

    return new Response('mangaCommonDelete.html.twig');
      
  }
}
