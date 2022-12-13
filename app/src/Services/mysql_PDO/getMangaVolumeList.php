<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class getMangaVolumeList{

    public function getMangaVolumeList(){
        $db = Database::getInstance();

        // ajouter jointure entre table 'manga_common' et 'manga_volume' pour ne recuperer que les manga correspondant a la série choisie

        $mangaVolumeList = $db->prepare ("  SELECT volume_number
                                            FROM manga_volume
                                        ");
        $mangaVolumeList->execute();

        $mangaVolumeList = $mangaVolumeList->fetchAll();

        return $mangaVolumeList;
    }

}