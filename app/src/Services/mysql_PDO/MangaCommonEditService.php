<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class MangaCommonEditService{

    public function MangaCommonEditService(){
        $db = Database::getInstance($_POST);
        
        $oldTitle = $_GET['title'];
        $title = $_POST['title'];
        $common_cover = $_POST['common_cover'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $artist = $_POST['artist'];


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