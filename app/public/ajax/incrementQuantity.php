<?php

header('Content-Type: application/json');

require '../../vendor/autoload.php';

use Services\mysql_PDO\stockManagement;

session_start();

$stockManagement = new stockManagement();

$id = $_GET["id"];
$item = $_SESSION["cart"][$id];

$currentQuantity = $item->getQuantity();
$currentStock = $stockManagement->getStock($item->getId());

if ($currentStock == 0){
    echo '{"error": true}';
}else{

    $item->setQuantity($currentQuantity+1);
    $stockManagement->decrementStock($item->getId());

    echo '{"error": false}';
}

?>