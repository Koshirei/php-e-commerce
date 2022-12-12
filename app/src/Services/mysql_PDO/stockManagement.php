<?php

namespace Services\mysql_PDO;

use Interfaces\interface_stockManagement;
use Database\Database;

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

    public function incrementStock($id)
    {
        $db = Database::getInstance();

        $stock = $this->getStock($id);
        $newStock = strval (intval($stock+1));

        $sql = "UPDATE manga_volume SET stock = :stock WHERE id=:id";

        $incrementStock = $db->prepare($sql);

        $incrementStock->bindParam("stock", $newStock);
        $incrementStock->bindParam("id", $id);

        $incrementStock->execute();
    }

    public function decrementStock($id)
    {
        $db = Database::getInstance();

        $stock = $this->getStock($id);
        $newStock = strval (intval($stock-1));

        $sql = "UPDATE manga_volume SET stock = :stock WHERE id=:id";

        $incrementStock = $db->prepare($sql);

        $incrementStock->bindParam("stock", $newStock);
        $incrementStock->bindParam("id", $id);

        $incrementStock->execute();
    }
}
