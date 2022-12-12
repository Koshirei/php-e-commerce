<?php

namespace Entity;

class CartItem {

    protected string $id;
    protected string $title;
    protected string $volume;
    protected string $unique_cover;
    protected string $price;
    protected int $quantity;

    function __construct(
        $id,
        $title,
        $volume,
        $unique_cover,
        $price,
        $quantity = 1
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->volume = $volume;
        $this->unique_cover = $unique_cover;
        $this->price = $price;
        $this->quantity = $quantity;
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

    public function getVolume(){
        return $this->volume;
    }

    public function setVolume($volume){
        $this->volume = $volume;
    }

    public function getUnique_Cover(){
        return $this->unique_cover;
    }

    public function setUnique_Cover($unique_cover){
        $this->unique_cover = $unique_cover;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

}