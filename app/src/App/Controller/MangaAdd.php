<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\MangaCommonAdd;
use Database\Database;

class MangaAdd
{
  public function __invoke()
  {
    
    if(sizeof($_POST)<=0){
      return new Response('mangaAdd.html.twig', ['error' => $error, 'mangas' => $mangaCommonList]);
    }
    else{
      $MangaCommonCreated = new MangaCommonAdd;
      $mangaCommonCreated = $MangaCommonCreated->MangaCommonAdd($_POST['title'], $_POST['common_cover'], $_POST['description'], $_POST['category'], $_POST['author'], $_POST['artist']);

      // var_dump($mangaEdited);

      // $error = false;

      // header("Location:/mangaCommonEdit?title=".$_GET['title']);

      // return new Response('mangaCommonEditOk.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title]);
      return new Response('mangaAdd.html.twig', ['error' => $error, 'mangas' => $mangaCommonList]);
    }
    
  }
}
