<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\MangaVolumeAddService;
use Database\Database;

class MangaVolumeAdd
{
  public function __invoke()
  {
    require './init_session.php';
    
    if(sizeof($_POST)<=0){
      return new Response('mangaVolumeAdd.html.twig', ['language'=>$traductions, 'error' => $error, 'mangas' => $mangaCommonList]);
    }
    else{
      $MangaVolumeCreated = new MangaVolumeAddService;
      $mangaVolumeCreated = $MangaVolumeCreated->MangaVolumeAddService($_POST['volume_number'], $_POST['cover_url'], $_POST['stock'], $_POST['price']);

      $error = false;

      header("Location:/mangaEdit");
      
      return new Response('mangaVolumeAdd.html.twig', ['language'=>$traductions, 'error' => $error, 'mangas' => $mangaCommonList]);
    }
    
  }
}
