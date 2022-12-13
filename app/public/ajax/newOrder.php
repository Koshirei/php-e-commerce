<?php

require '../../vendor/autoload.php';

use Services\mysql_PDO\orders;

session_start();

$orders = new orders();

if (isset($_SESSION["user"]) && $_SESSION["cart"]!== []){

    $user_id = $_SESSION["user"]->getId();
    $full_price = 0;

    foreach($_SESSION["cart"] as $item){
        $full_price+= floatval($item->getPrice()) * $item->getQuantity();
    }

    $orders_common_id = $orders->insertCommonOrder($user_id, $full_price);

    foreach($_SESSION["cart"] as $item){
        $orders->insertOrder($item, $orders_common_id);
    }

    unset($_SESSION["cart"]);
}


?>