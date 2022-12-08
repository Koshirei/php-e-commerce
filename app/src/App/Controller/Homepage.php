<?php

namespace App\Controller;


use PDO;
use Framework\Response\Response;
use Languages\Languages;

class Homepage
{
  public function __invoke()
  { 
      session_start();
      if (!isset($_SESSION["langage"])) $_SESSION["langage"] = "FR";
      if (isset($_GET["lan"])) $_SESSION["langage"] = $_GET["lan"];

      $langue = new Languages($_SESSION["langage"]);
      $traductions = $langue->getLanguage();

      return new Response('home.html.twig', ['get' => $_GET, 'language'=>$traductions]);
      
  }
}
