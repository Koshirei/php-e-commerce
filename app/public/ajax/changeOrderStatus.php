<?php

require '../../vendor/autoload.php';

use Services\mysql_PDO\orders;

$order_id = $_GET["id"];
$new_status = $_GET["status"];

$orders = new orders();
$orders->updateOrderStatus($order_id,$new_status)
?>