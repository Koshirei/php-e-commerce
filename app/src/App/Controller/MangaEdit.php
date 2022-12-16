<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getMangaCommonList;
use Database\Database;

class MangaEdit
{
  public function __invoke()
  {
    require './init_session.php';

    $MangaCommonList = new getMangaCommonList;
    $mangaCommonList = $MangaCommonList->getMangaCommonList();

    $error = false;

    return new Response('mangaEdit.html.twig', ['language'=>$traductions, 'user'=>$_SESSION["user"], 'error' => $error, 'mangas' => $mangaCommonList] );
  }
}
