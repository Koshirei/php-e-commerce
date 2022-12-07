<?php

namespace Services\mysql_PDO;

use Interfaces\interface_stockManagement;
use Database\Database;
use Entity\Manga;

class stockManagement implements interface_stockManagement
{

    public function getStock($id):string
    {
        $db = Database::getInstance();

        $sql = "SELECT stock FROM manga_volume WHERE id=:id";

        $getStock = $db->prepare($sql);

        $getStock->bindParam("id", $id);

        $getStock->execute();

        $currentstock = $getStock->fetch();

        return $currentstock["stock"];
    }

    public function setStock($id, $newStock)
    {
        $db = Database::getInstance();

        $sql = "UPDATE manga_volume SET stock = :stock WHERE id=:id";

        $setStock = $db->prepare($sql);

        $setStock->bindParam("stock", $newStock);
        $setStock->bindParam("id", $id);

        $setStock->execute();
    }
}
