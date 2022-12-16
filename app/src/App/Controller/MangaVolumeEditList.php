<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getMangaVolumeList;
use Database\Database;

class MangaVolumeEditList
{
  public function __invoke()
  {
    if(sizeof($_POST)<=0){

      $title = $_GET['title'];

      $MangaVolume = new getMangaVolumeList;
      $mangaVolume = $MangaVolume->getMangaVolumeList($title);

      $error = false;

      return new Response('mangaVolumeEditList.html.twig', ['language'=>$traductions, 'error' => $error, 'mangas' => $mangaVolume, 'title' => $title]);
    }
    else{
      // $MangaCommonEdit = new MangaCommonEditService;
      // $mangaEdited = $MangaCommonEdit->MangaCommonEditService($_POST['title'], $_POST['common_cover'], $_POST['description'], $_POST['category'], $_POST['author'], $_POST['artist']);

      // var_dump($mangaEdited);

      // $MangaCommon = new getMangaCommon;
      // $mangaCommon = $MangaCommon->getMangaCommon($_POST['title']);

      // $error = false;

      // header("Location:/mangaCommonEdit?title=".$_GET['title']);

      // return new Response('mangaCommonEditOk.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title]);
    }
    
  }
}
