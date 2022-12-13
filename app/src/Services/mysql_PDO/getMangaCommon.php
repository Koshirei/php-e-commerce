<?php 

namespace Services\mysql_PDO; 

use PDO; 
use Database\Database; 

class getMangaCommon{ 

    public function getMangaCommon($title){

        $title = htmlspecialchars($_GET['title']);

        $db = Database::getInstance(); 

        $mangaCommon = $db->prepare ("  SELECT *
                                        FROM manga_common 
                                        WHERE title = :title
                                    "); 
        
        $mangaCommon->bindParam("title", $title);
        $mangaCommon->execute(); 
        
        $mangaCommon = $mangaCommon->fetchAll();
        
        return $mangaCommon; 
    }
}