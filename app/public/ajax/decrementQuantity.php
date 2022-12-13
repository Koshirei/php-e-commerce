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

if ($currentQuantity <= 1){

    $temp_array = [];

    for ($i = 0 ; $i < count($_SESSION["cart"]) ; $i++){

        if ($i !== intval($id)){
            array_push($temp_array, $_SESSION["cart"][$i]);
        }
    }

    $_SESSION["cart"] = $temp_array;
}

$item->setQuantity($currentQuantity-1);
$stockManagement->incrementStock($item->getId());

echo '{"error": false}';

?>