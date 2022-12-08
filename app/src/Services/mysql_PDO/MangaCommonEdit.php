<?php

namespace Services\mysql_PDO;

use PDO;
use Interfaces\interface_MangaCommonEdit;
use Database\Database;

class MangaCommonEdit implements interface_MangaCommonEdit{

    public function MangaSearchByName($searchedManga){
        $db = Database::getInstance();

        $searchedManga = $db->prepare ('SELECT *
                                  FROM manga_common
                                  WHERE title = $searchedManga
                                ');
        
        $searchedManga->execute();

        $manga = $searchedMangaExist->fetchAll();

        return $manga;
    }

}