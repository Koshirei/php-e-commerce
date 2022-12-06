<?php

namespace App\Controller;

use Entity\eManga;
use Framework\Response\Response;
use Languages\Languages;
use Services\mysql_PDO\getManga;

class Manga
{
  public function __invoke()
  {
      session_start();
      if (!isset($_SESSION["langage"])) $_SESSION["langage"] = "FR";
      if (isset($_GET["lan"])) $_SESSION["langage"] = $_GET["lan"];

      $langue = new Languages($_SESSION["langage"]);
      $traductions = $langue->getLanguage();

      $id = $_GET["id"];

      $manga = new getManga;

      $emanga = $manga->getMangaInDB($id);

      var_dump($emanga);
      
      return new Response('manga.html.twig', [ "manga" => $emanga, "language" => $traductions] );
      
  }
}
