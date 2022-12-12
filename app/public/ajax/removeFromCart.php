<?php

// giga important de mettre les require et use AVANT session_start()
//https://stackoverflow.com/questions/20664257/the-script-tried-to-execute-a-method-or-access-a-property-of-an-incomplete-objec

require '../../vendor/autoload.php';

use Services\mysql_PDO\stockManagement;

session_start();

$cartId = $_GET["id"];

$temp_cart = [];
$updateStock;

for ($i = 0; $i < count($_SESSION["cart"]); $i++){

    if ($i !== intval($cartId)){
        array_push($temp_cart, $_SESSION["cart"][$i]);
    }else{
        $updateStock = $_SESSION["cart"][$i];
    }
}

$_SESSION["cart"] = $temp_cart;

$stockManagement = new stockManagement();
$stockManagement->incrementStock($updateStock->getId())

?>