<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class MangaVolumeEditService{

    public function MangaVolumeEditService(){
        $db = Database::getInstance();
        
        $title = htmlspecialchars($_POST['title']);
        $volume_number = htmlspecialchars($_POST['volume_number']);
        $cover_url = htmlspecialchars($_POST['cover_url']);
        $stock = htmlspecialchars($_POST['stock']);
        $price = htmlspecialchars($_POST['price']);

        $editVolumeManga = $db->prepare ("  UPDATE manga_volume, manga_common
                                            SET volume_number = :volume_number,
                                                cover_url = :cover_url,
                                                stock = :stock,
                                                price = :price
                                            WHERE manga_common.title = :title
                                            AND manga_common.common_id = manga_volume.common_id
                                        ");

        $editVolumeManga->bindParam("title", $title);
        $editVolumeManga->bindParam("volume_number", $volume_number);
        $editVolumeManga->bindParam("cover_url", $cover_url);
        $editVolumeManga->bindParam("stock", $stock);
        $editVolumeManga->bindParam("price", $price);
        $editVolumeManga->execute();

        $editVolumeManga = $editVolumeManga->fetchAll();

        // echo("'MangaVolumeEditService'<br>");
        // echo(var_dump($editVolumeManga));
        // die;

        return $editVolumeManga;
    }

}