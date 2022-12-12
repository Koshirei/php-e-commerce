<?php

header('Content-Type: application/json');

require '../../vendor/autoload.php';

use Services\mysql_PDO\stockManagement;

session_start();

$stockManagement = new stockManagement();

$id = intval($_GET["id"]);
$currentQuantity = $_SESSION["cart"][$id]->getQuantity();


// for ($i = 0;)

$_SESSION["cart"][$id]->setQuantity($currentQuantity+1);

echo '{"quantity":'.$currentQuantity.'}';

?>