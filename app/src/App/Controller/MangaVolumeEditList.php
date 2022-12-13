<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getMangaVolumeList;
use Database\Database;

class MangaCommonEdit
{
  public function __invoke()
  {
    if(sizeof($_POST)<=0){

      $MangaCommon = new getMangaCommon;
      $mangaCommon = $MangaCommon->getMangaCommon($_POST['title']);

      return new Response('mangaCommonEdit.html.twig', ['error' => $error, 'mangas' => $mangaCommon, 'title' => $title]);
    }
    else{
      $MangaCommonEdit = new MangaCommonEditService;
      $mangaEdited = $MangaCommonEdit->MangaCommonEditService($_POST['title'], $_POST['common_cover'], $_POST['description'], $_POST['category'], $_POST['author'], $_POST['artist']);

      var_dump($mangaEdited);

      $MangaCommon = new getMangaCommon;
      $mangaCommon = $MangaCommon->getMangaCommon($_POST['title']);

      $error = false;

      header("Location:/mangaCommonEdit?title=".$_GET['title']);

      return new Response('mangaCommonEditOk.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title]);
    }
    
  }
}
