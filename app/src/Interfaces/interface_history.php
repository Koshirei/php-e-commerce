<?php

namespace Interfaces;

interface interface_history {

    public function selectAllHistoryCommonByUserID($user_id);
    public function selectHistoryDataByOrderId($order_id);
    
}