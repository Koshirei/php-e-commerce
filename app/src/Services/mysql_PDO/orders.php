<?php

namespace Services\mysql_PDO;

use Interfaces\interface_orders;
use Database\Database;

class orders implements interface_orders{

    public function insertCommonOrder($user_id, $price_total):int
    {
        $db = Database::getInstance();

        $sql = 'INSERT into orders_common ( id_user, price_full_order, status) VALUES (:user_id, :price_full_order, "PAID")';
        $insertOrder = $db->prepare($sql);

        $insertOrder->bindParam("user_id", $user_id);
        $insertOrder->bindParam("price_full_order", $price_total);

        $insertOrder->execute();


        return intval($db->lastInsertId());
    }

    public function insertOrder($item, $common_id)
    {
        $id_order = $common_id;
        $id_manga = $item->getId();
        $quantity_manga = $item->getQuantity();
        $price_manga = $item->getPrice();

        $db = Database::getInstance();

        $sql = 'INSERT into orders ( id_order, id_manga, quantity_manga, price_manga) VALUES (:id_order, :id_manga, :quantity_manga, :price_manga)';
        $insertOrder = $db->prepare($sql);

        $insertOrder->bindParam("id_order", $id_order);
        $insertOrder->bindParam("id_manga", $id_manga);
        $insertOrder->bindParam("quantity_manga", $quantity_manga);
        $insertOrder->bindParam("price_manga", $price_manga);

        $insertOrder->execute();


    }

}