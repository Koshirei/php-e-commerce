<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\MangaCommonEditService;
use Database\Database;

class MangaCommonEdit
{
  public function __invoke()
  {
    if(sizeof($_POST)<=0){
      $title = $_GET['title'];

      $db = Database::getInstance();
      $manga = $db->prepare(" SELECT *
                              FROM manga_common
                              WHERE title = '$title'");
      $manga->execute();
      $mangas = $manga->fetchAll();

      $error = false;

      return new Response('mangaCommonEdit.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title]);
    }
    else{
      var_dump($_POST);
      
      $MangaCommonEdit = new MangaCommonEditService;
      $manga = $MangaCommonEdit->MangaCommonEditService();

      return new Response('mangaCommonEdit.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title]);
    }
    
  }
}
