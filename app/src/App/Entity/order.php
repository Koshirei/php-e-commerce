<?php

namespace Entity;

class order {

    protected string $id;
    protected string $user_id;
    protected string $username;
    protected string $full_price;
    protected array $order_details;
    protected string $status;

    function __construct(
        $id,
        $user_id,
        $username,
        $full_price,
        $status,
        $order_details,
    )
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->username = $username;
        $this->full_price = $full_price;
        $this->status = $status;
        $this->order_details = $order_details;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUser_Id(){
        return $this->user_id;
    }

    public function setUser_Id($user_id){
        $this->user_id = $user_id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getFull_Price(){
        return $this->full_price;
    }

    public function setFull_Price($full_price){
        $this->full_price = $full_price;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getOrder_Details(){
        return $this->order_details;
    }

    public function setOrder_Details($order_details){
        $this->order_details = $order_details;
    }


}