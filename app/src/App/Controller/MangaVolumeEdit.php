<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getMangaVolume;
use Services\mysql_PDO\MangaVolumeEditService;
use Database\Database;

class MangaVolumeEdit
{
  public function __invoke()
  {
    require './init_session.php';

    if(isset($_GET)){
      
      if(sizeof($_POST)<=0){

        $MangaVolume = new getMangaVolume;
        $mangaVolume = $MangaVolume->getMangaVolume($_GET['title'], $_GET['volume_number']);

        return new Response('mangaVolumeEdit.html.twig', ['language'=>$traductions, 'user'=>$_SESSION["user"], 'error' => $error, 'mangas' => $mangaVolume, 'title' => $title]);
      }
      else{

        $MangaVolumeEdit = new MangaVolumeEditService;
        $editVolumeManga = $MangaVolumeEdit->MangaVolumeEditService($_POST['volume_number'], $_POST['cover_url'], $_POST['stock'], $_POST['price']);
  
        // var_dump($editVolumeManga);
        // echo("<br><br>");
        // die;
  
        $MangaVolume = new getMangaVolume;
        $mangaVolume = $MangaVolume->getMangaVolume($_GET['title'], $_GET['volume_number']);

        // var_dump($mangaVolume);
        // echo("<br><br><br><br>");
        // die;
  
        $error = false;
  
        header("Location:/mangaVolumeEdit?title=".$_GET['title']."&volume_number=".$_GET['volume_number']);
  
        return new Response('mangaVolumeEditList.html.twig', ['language'=>$traductions, 'user'=>$_SESSION["user"], 'error' => $error, 'mangas' => $mangas, 'title' => $title]);
      }

    }
    
  }
}
