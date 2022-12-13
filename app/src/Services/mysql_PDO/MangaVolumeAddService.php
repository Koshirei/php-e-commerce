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

        $addedVolumeManga = $db->prepare ("    INSERT INTO manga_volume (title, common_cover, description, category, author, artist)
                                        VALUES (:title, :common_cover, :description, :category, :author, :artist)
                                        WHERE manga_common.title = :title
                                        ");
        
        $addedVolumeManga->bindParam("title", $title);
        $addedVolumeManga->bindParam("common_cover", $common_cover);
        $addedVolumeManga->bindParam("description", $description);
        $addedVolumeManga->bindParam("category", $category);
        $addedVolumeManga->bindParam("author", $author);
        $addedVolumeManga->bindParam("artist", $artist);
        $addedVolumeManga->execute();

        $addedVolumeManga = $addedVolumeManga->fetch();

        return $addedVolumeManga;
    }

}