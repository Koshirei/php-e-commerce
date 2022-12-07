<?php

namespace Entity;

class Manga {

    protected string $id;
    protected string $title;
    protected string $volume;
    protected string $unique_cover;
    protected string $price;
    protected string $stock;
    protected string $description;
    protected string $category;
    protected string $author;
    protected string $artist;

    function __construct(
        $id,
        $title,
        $volume,
        $unique_cover,
        $price,
        $stock,
        $description,
        $category,
        $author,
        $artist
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->volume = $volume;
        $this->unique_cover = $unique_cover;
        $this->price = $price;
        $this->stock = $stock;
        $this->description = $description;
        $this->category = $category;
        $this->author = $author;
        $this->artist = $artist;
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

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getArtist(){
        return $this->artist;
    }

    public function setArtist($artist){
        $this->artist = $artist;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getStock(){
        return $this->stock;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }
}