<?php

namespace Services\mysql_PDO;

use Interfaces\interface_getNbVolume;
use Database\Database;

class getNbVolume implements interface_getNbVolume{

    
    public function getNbVolume():int{

        $db = Database::getInstance();  

        $sql = 'SELECT count(*) from manga_volume';
        $getNbVolume = $db->prepare($sql);

        $getNbVolume->execute();

        $nbVolume = $getNbVolume->fetch();

        return intval($nbVolume[0]);

    }

}