<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class MangaCommonAddService{

    public function MangaCommonAddService(){
        $db = Database::getInstance($_POST);
        
        $title = htmlspecialchars($_POST['title']);
        $common_cover = htmlspecialchars($_POST['common_cover']);
        $description = htmlspecialchars($_POST['description']);
        $category = htmlspecialchars($_POST['category']);
        $author = htmlspecialchars($_POST['author']);
        $artist = htmlspecialchars($_POST['artist']);

        // Génération d'un common_id unique
        $time = time();
        $common_id = password_hash($time, PASSWORD_DEFAULT );
        $common_id = $time.$common_id;

        $editManga = $db->prepare ("    INSERT INTO manga_common (common_id, title, common_cover, description, category, author, artist)
                                        VALUES (:common_id, :title, :common_cover, :description, :category, :author, :artist)
                                        ");
        
        $editManga->bindParam("common_id", $common_id);
        $editManga->bindParam("title", $title);
        $editManga->bindParam("common_cover", $common_cover);
        $editManga->bindParam("description", $description);
        $editManga->bindParam("category", $category);
        $editManga->bindParam("author", $author);
        $editManga->bindParam("artist", $artist);
        $editManga->execute();

        $editManga = $editManga->fetch();

        return $editManga;
    }

}