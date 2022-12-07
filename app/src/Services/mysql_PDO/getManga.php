<?php

namespace Services\mysql_PDO;

use Interfaces\interface_getManga;
use Database\Database;
use Entity\Manga;

class getManga implements interface_getManga{

    public function getMangaInDB($id){

        $db = Database::getInstance();  

        $sql = 'SELECT * from manga_common, manga_volume where manga_volume.id=:id and manga_common.common_id=manga_volume.common_id';
        $getmanga = $db->prepare($sql);

        $getmanga->bindParam("id", $id);
        $getmanga->execute();

        $manga_array = $getmanga->fetch();

        $manga = new Manga(
            $manga_array["id"],
            $manga_array["title"],
            $manga_array["volume_number"],
            $manga_array["cover_url"],
            $manga_array["price"],
            $manga_array["stock"],
            $manga_array["description"],
            $manga_array["category"],
            $manga_array["author"],
            $manga_array["artist"]
        );

        return $manga; 
    }


}