<?php

namespace Services\mysql_PDO;

use Database\Database;
use Entity\order;
use Entity\orderDetails;
use Interfaces\interface_history;

class getHistory implements interface_history{

    public function generateOrderEntity($history){

        $orders_array = [];

        foreach($history as $order_common){

            $details = $this->selectHistoryDataByOrderId($order_common["id"]);

            $order = new order(
                $order_common["id"],
                $order_common["id_user"],
                $order_common["username"],
                $order_common["price_full_order"],
                $order_common["status"],
                $details);

            array_push($orders_array, $order);
        }

        return $orders_array;

    }

    public function selectHistoryDataByOrderId($order_id){
        $db = Database::getInstance();

        $sql = 'SELECT title, volume_number, orders_details.* from manga_common, manga_volume, orders_details 
        where orders_details.id_order_common=:id_order 
        and manga_volume.id = orders_details.id_manga
        and manga_common.common_id = manga_volume.common_id';
        $getHistoryData = $db->prepare($sql);

        $getHistoryData->bindParam("id_order", $order_id);
        $getHistoryData->execute();

        $historyData = $getHistoryData->fetchAll();

        $dataArray = [];
        foreach($historyData as $data){

            $orderDetails = new orderDetails(
                $data["id"],
                $data["title"],
                $data["volume_number"],
                $data["quantity_manga"],
                $data["price_manga"]
            );

            array_push($dataArray, $orderDetails);
        }

        return $dataArray;

    }


    public function selectAllHistoryCommonByUserID($user_id)
    {
        $db = Database::getInstance();  

        $sql = 'SELECT username, orders_common.* from users, orders_common where orders_common.id_user=:user_id and users.id = orders_common.id_user order by orders_common.id desc';
        $getHistory = $db->prepare($sql);

        $getHistory->bindParam("user_id", $user_id);
        $getHistory->execute();

        $history = $getHistory->fetchAll();

        $orders_array = $this->generateOrderEntity($history);


        return $orders_array;
    }

    public function selectAllHistoryCommon(){

        $db = Database::getInstance();  

        $sql = 'SELECT username, orders_common.* from users, orders_common where users.id = orders_common.id_user order by orders_common.id desc';
        $getHistory = $db->prepare($sql);

        $getHistory->execute();

        $history = $getHistory->fetchAll();

        $orders_array = $this->generateOrderEntity($history);

        return $orders_array;

    }

}