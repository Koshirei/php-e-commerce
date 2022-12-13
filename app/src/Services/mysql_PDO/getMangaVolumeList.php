<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class getMangaVolumeList{

    public function getMangaVolumeList(){
        $db = Database::getInstance();

        $title = htmlspecialchars($_GET['title']);

        $mangaVolumeList = $db->prepare ("  SELECT volume_number
                                            FROM manga_common, manga_volume
                                            WHERE manga_common.title = :title
                                            AND manga_common.common_id = manga_volume.common_id
                                        ");

        $mangaVolumeList->bindParam("title", $title);
        $mangaVolumeList->execute();

        $mangaVolumeList = $mangaVolumeList->fetchAll();

        return $mangaVolumeList;
    }

}