<?php

namespace Interfaces;

interface interface_orders {

    public function insertCommonOrder($user_id, $price_total):int;
    public function insertOrder($item, $common_id);
    public function updateOrderStatus($order_id, $new_status);
    
}