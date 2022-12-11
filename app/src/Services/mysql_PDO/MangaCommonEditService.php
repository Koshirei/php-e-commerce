<?php

namespace Services\mysql_PDO;

use PDO;
use Interfaces\interface_MangaCommonEdit;
use Database\Database;

class MangaCommonEditService implements interface_MangaCommonEdit{

    public function MangaCommonEditService(){
        $db = Database::getInstance();

        var_dump($_POST['title']);die;

        $title = $_POST['title'];
        
            
        // $title = $_POST['title'];
        // $common_cover = $_POST['common_cover'];
        // $description = $_POST['description'];
        // $category = $_POST['category'];
        // $author = $_POST['author'];
        // $artist = $_POST['artist'];


        // $editedManga = $db->prepare ("  UPDATE manga_common
        //                                 SET title = $title,
        //                                     common_cover = $common_cover,
        //                                     description = $description,
        //                                     category = $category,
        //                                     author = $author,
        //                                     artist = $artist,
        //                                 ");


        $editedManga = $db->prepare ("  UPDATE manga_common
                                        SET title = $_POST['title'],
                                            common_cover = $_POST['common_cover'],
                                            description = $_POST['description'],
                                            category = $_POST['category'],
                                            author = $_POST['author'],
                                            artist = $_POST['artist'],
                                        ");
        
        $editedManga->execute();

        $manga = $editedManga->fetchAll();

        return $manga;
    }

}