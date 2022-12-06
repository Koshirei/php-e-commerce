<?php

namespace Entity;

class eManga {

    protected string $id;
    protected string $title;
    protected string $volume;
    protected string $unique_cover;
    protected string $prix;
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
        $prix,
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
        $this->prix = $prix;
        $this->stock = $stock;
        $this->description = $description;
        $this->category = $category;
        $this->author = $author;
        $this->artist = $artist;
    }
}