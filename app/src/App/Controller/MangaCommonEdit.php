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

      // $title = $_POST['title'];
      // $common_cover = $_POST['common_cover'];
      // $description = $_POST['description'];
      // $category = $_POST['category'];
      // $author = $_POST['author'];
      // $artist = $_POST['artist'];


      $MangaCommonEdit = new MangaCommonEditService;
      $mangaEdited = $MangaCommonEdit->MangaCommonEditService($_POST['title'], $_POST['common_cover'], $_POST['description'], $_POST['category'], $_POST['author'], $_POST['artist']);

      var_dump($mangaEdited);

      $title = $_POST['oldTitle'];

      $db = Database::getInstance();
      $manga = $db->prepare(" SELECT *
                              FROM manga_common
                              WHERE title = '$title'");
      $manga->execute();
      $mangas = $manga->fetchAll();

      $error = false;

      header("Location:/mangaCommonEdit?title=".$_GET['title']);

      // return new Response('mangaCommonEditOk.html.twig', ['error' => $error, 'mangas' => $mangas, 'title' => $title]);
    }
    
  }
}
