<?php

namespace Services\mysql_PDO;

use Interfaces\interface_getManga;
use Database\Database;
use Entity\eManga;

class getManga implements interface_getManga{

    public function getMangaInDB($id){

        $db = Database::getInstance();  

        $sql = 'SELECT * from manga_common, manga_volume where manga_volume.id=:id and manga_common.common_id=manga_volume.common_id';
        $getmanga = $db->prepare($sql);

        $getmanga->bindParam("id", $id);
        $getmanga->execute();

        $manga = $getmanga->fetch();

        $emanga = new eManga(
            $manga["id"],
            $manga["title"],
            $manga["volume_number"],
            $manga["cover_url"],
            $manga["price"],
            $manga["stock"],
            $manga["description"],
            $manga["category"],
            $manga["author"],
            $manga["artist"]
        );

        return $emanga; 
    }


}