<?php

namespace App\Controller;

use Framework\Response\Response;
use Database\Database;

class MangaEdit
{
  public function __invoke()
  {

    $error = false;

      if ( isset($_POST["searchedManga"])){

        $SearchManga = new SearchManga;
        $manga = $SearchManga->MangaSearchByName($_POST["searchedManga"]);
        
        if ($manga){
            echo "Afficher le manga à modifier<br/>";
        }else{
          $error = true;
        }
      }

      return new Response('mangaEdit.html.twig', ['post' => $_POST, 'error' => $error, 'manga' => $manga] );
      
  }
}
