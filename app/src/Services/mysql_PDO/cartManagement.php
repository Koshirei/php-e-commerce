<?php

namespace Services\mysql_PDO;

use Interfaces\interface_cartManagement;
use Database\Database;

class cartManagement implements interface_cartManagement{

    public function selectOutdatedCarts($Minutes4Outdate){

        $db = Database::getInstance();

        $sql = "SELECT * from cart_history where TIMESTAMPDIFF(MINUTE , date , NOW()) >= :time";

        $selectOutDated = $db->prepare($sql);

        $selectOutDated->bindParam("time", $Minutes4Outdate);
        $selectOutDated->execute();

        $fetchedSelect = $selectOutDated->fetchAll();

        return $fetchedSelect;

    }

    public function insertNewCart($cartId, $mangaId)
    {
        $db = Database::getInstance();  

        $sql = 'INSERT INTO cart_history (id_cart, id_manga, quantity_manga, date) VALUES ( :id_cart, :id_manga, 1, NOW() )';
        $insertNewCart = $db->prepare($sql);

        $insertNewCart->bindParam("id_cart", $cartId);
        $insertNewCart->bindParam("id_manga", $mangaId);
        $insertNewCart->execute();
    }

    public function deleteCart($cartId)
    {
        $db = Database::getInstance();  

        $sql = 'DELETE FROM cart_history WHERE id_cart = :id_cart';
        $insertNewCart = $db->prepare($sql);

        $insertNewCart->bindParam("id_cart", $cartId);
        $insertNewCart->execute();
    }

    public function updateCartQuantity($cartId, $quantity)
    {
        $db = Database::getInstance();  

        $sql = 'UPDATE cart_history SET quantity_manga = :quantity_manga, date = NOW() WHERE id_cart = :id_cart';
        $insertNewCart = $db->prepare($sql);

        $insertNewCart->bindParam("quantity_manga", $quantity);
        $insertNewCart->bindParam("id_cart", $cartId);
        $insertNewCart->execute();
    }

    public function checkIfCartInDb($cartId):int{
        $db = Database::getInstance();  

        $sql = 'SELECT count(*) from cart_history where id_cart = :id_cart';
        $insertNewCart = $db->prepare($sql);

        $insertNewCart->bindParam("id_cart", $cartId);
        $insertNewCart->execute();

        $count = $insertNewCart->fetch();

        return $count[0];
    }
}