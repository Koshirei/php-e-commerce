<?php

namespace Services\mysql_PDO;

use PDO;
use Database\Database;

class getMangaCommonList{

    public function getMangaCommonList(){
        $db = Database::getInstance();

        $mangaCommonList = $db->prepare ("  SELECT title
                                            FROM manga_common
                                        ");
        $mangaCommonList->execute();

        $mangaCommonList = $mangaCommonList->fetchAll();

        return $mangaCommonList;
    }

}