<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\MangaCommonAddService;
use Database\Database;

class MangaCommonAdd
{
  public function __invoke()
  {    
    if(sizeof($_POST)<=0){
      return new Response('mangaCommonAdd.html.twig', ['error' => $error, 'mangas' => $mangaCommonList]);
    }
    else{
      $MangaCommonCreated = new MangaCommonAddService;
      $mangaCommonCreated = $MangaCommonCreated->MangaCommonAddService($_POST['title'], $_POST['common_cover'], $_POST['description'], $_POST['category'], $_POST['author'], $_POST['artist']);

      $error = false;

      header("Location:/mangaEdit");
      
      return new Response('mangaCommonAdd.html.twig', ['error' => $error, 'mangas' => $mangaCommonList]);
    }
    
  }
}
