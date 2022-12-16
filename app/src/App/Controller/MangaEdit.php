<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getMangaCommonList;
use Database\Database;

class MangaEdit
{
  public function __invoke()
  {

    $MangaCommonList = new getMangaCommonList;
    $mangaCommonList = $MangaCommonList->getMangaCommonList();

    $error = false;

    return new Response('mangaEdit.html.twig', ['language'=>$traductions, 'error' => $error, 'mangas' => $mangaCommonList] );
  }
}
