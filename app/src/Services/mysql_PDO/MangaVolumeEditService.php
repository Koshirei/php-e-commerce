<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class MangaVolumeEditService{

    public function MangaVolumeEditService(){
        $db = Database::getInstance();
        
        $oldTitle = htmlspecialchars($_GET['title']);
        $title = htmlspecialchars($_POST['title']);
        $common_cover = htmlspecialchars($_POST['common_cover']);
        $description = htmlspecialchars($_POST['description']);
        $category = htmlspecialchars($_POST['category']);
        $author = htmlspecialchars($_POST['author']);
        $artist = htmlspecialchars($_POST['artist']);


        $editManga = $db->prepare ("    UPDATE manga_common
                                        SET title = :title,
                                            common_cover = :common_cover,
                                            description = :description,
                                            category = :category,
                                            author = :author,
                                            artist = :artist
                                        WHERE title = :oldTitle
                                        ");
        
        $editManga->bindParam("title", $title);
        $editManga->bindParam("common_cover", $common_cover);
        $editManga->bindParam("description", $description);
        $editManga->bindParam("category", $category);
        $editManga->bindParam("author", $author);
        $editManga->bindParam("artist", $artist);
        $editManga->bindParam("oldTitle", $oldTitle);
        $editManga->execute();

        $editManga = $editManga->fetch();

        return $editManga;
    }

}