<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class MangaEdit
{
  public function __invoke()
  {

    $db = Database::getInstance();
    $manga = $db->prepare(' SELECT title
                            FROM manga_common');
    $manga->execute();
    $mangas = $manga->fetchAll();

    $error = false;

    return new Response('mangaEdit.html.twig', ['error' => $error, 'mangas' => $mangas] );
      
  }
}
