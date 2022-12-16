<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class MangaVolumeAddService{

    public function MangaVolumeAddService(){
        $db = Database::getInstance($_POST);
        
        $title = htmlspecialchars($_GET['title']);
        $volume_number = htmlspecialchars($_POST['volume_number']);
        $cover_url = htmlspecialchars($_POST['cover_url']);
        $stock = htmlspecialchars($_POST['stock']);
        $price = htmlspecialchars($_POST['price']);

        $common_id = htmlspecialchars($_POST['common_id']);

        $addedVolumeManga = $db->prepare (" INSERT INTO manga_volume (title, volume_number, cover_url, stock, price)
                                            VALUES (:common_id, :volume_number, :cover_url, :stock, :price)
                                            WHERE manga_common.title = :title
                                            -- AND manga_common.common_id = 
                                        ");
        
        $addedVolumeManga->bindParam("title", $title);
        $addedVolumeManga->bindParam("common_id", $common_cover);
        $addedVolumeManga->bindParam("volume_number", $description);
        $addedVolumeManga->bindParam("cover_url", $category);
        $addedVolumeManga->bindParam("stock", $author);
        $addedVolumeManga->bindParam("price", $artist);
        $addedVolumeManga->execute();

        $addedVolumeManga = $addedVolumeManga->fetch();

        return $addedVolumeManga;
    }

}