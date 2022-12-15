<?php

require '../../vendor/autoload.php';

use Services\mysql_PDO\cartManagement;
use Services\mysql_PDO\stockManagement;

$cartManagement = new cartManagement();
$stockManagement = new stockManagement();

$outdated_timer = 30; //minutes

$outdated = $cartManagement->selectOutdatedCarts($outdated_timer);

foreach($outdated as $cartItem){
    for ($i = 0; $i < $cartItem["quantity_manga"]; $i++){
        $stockManagement->incrementStock($cartItem["id_manga"]);
    }
    $cartManagement->deleteCart($cartItem["id_cart"]);
}
?>