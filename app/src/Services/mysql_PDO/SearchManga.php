<?php

namespace Services\mysql_PDO;

use PDO;
// use Interfaces\interface_LoginUser;
use Database\Database;

class LoginUser implements interface_LoginUser{

    public function MangaSearchByName($searchedManga){
        $db = Database::getInstance();

        $searchedMangaExist = $db->prepare ('SELECT *
                                  FROM manga_common
                                  WHERE title = $searchedManga
                                ');
        
        $searchedMangaExist->execute();

        $manga = $searchedMangaExist->fetchAll();

        return $manga;
    }

}