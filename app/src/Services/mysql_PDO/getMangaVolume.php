<?php 

namespace Services\mysql_PDO; 

use PDO; 
use Database\Database; 

class getMangaVolume{ 

    public function getMangaVolume($title, $volume_number){

        $title = htmlspecialchars($_GET['title']);
        $volume_number = htmlspecialchars($_GET['volume_number']);

        $db = Database::getInstance(); 

        $mangaVolume = $db->prepare ("  SELECT *
                                        FROM manga_common, manga_volume
                                        WHERE manga_common.title = :title
                                        AND manga_volume.volume_number = :volume_number
                                        AND manga_common.common_id = manga_volume.common_id
                                    ");

        $mangaVolume->bindParam("title", $title);
        $mangaVolume->bindParam("volume_number", $volume_number);
        $mangaVolume->execute(); 

        $mangaVolume = $mangaVolume->fetchAll();

        // echo(var_dump($mangaVolume));
        // die;
        
        return $mangaVolume;
        
    }
}