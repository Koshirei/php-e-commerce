<?php

namespace Entity;

class orderDetails {

    protected string $id;
    protected string $title;
    protected string $volume_number;
    protected int $quantity;
    protected string $price;

    function __construct(
        $id,
        $title,
        $volume_number,
        $quantity,
        $price
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->volume_number = $volume_number;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getVolume_number(){
        return $this->volume_number;
    }

    public function setVolume_number($volume_number){
        $this->volume_number = $volume_number;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }


}