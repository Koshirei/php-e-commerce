<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class MangaCommonEdit
{
  public function __invoke()
  {
    $title = $_GET['title'];

    $db = Database::getInstance();
    $manga = $db->prepare(" SELECT *
                            FROM manga_common
                            WHERE title = '$title'");
    $manga->execute();
    $mangas = $manga->fetchAll();

    $error = false;

    return new Response('mangaCommonEdit.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title] );
  }
}
