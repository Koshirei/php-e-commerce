<?php

namespace Services\mysql_PDO;

use Interfaces\interface_getProducts;
use Database\Database;
use Entity\Manga;
use Services\mysql_PDO\getNbVolume;
use PDO;

class getProducts implements interface_getProducts{

    public function generateMangas($fetchedData){
        $mangas = [];

        foreach($fetchedData as $product){
            array_push($mangas,
            new Manga(
                $product[0],
                $product["title"],
                $product["volume_number"],
                $product["cover_url"],
                $product["price"],
                $product["stock"],
                $product["description"],
                $product["category"],
                $product["author"],
                $product["artist"]
            ));
        }

        return $mangas;
    }

    //pour la pagination
    public function getNbOfProducts(): int
    {
        $nbProductsNoFilters = new getNbVolume();

        return $nbProductsNoFilters->getNbVolume();
    }
    public function getNbOfProductsFilters($filters):int{

        $title = "%".$filters["title"]."%";
        $volume = "%".$filters["volume"]."%";

        $price = $filters["price"] !== "no" ? "manga_volume.price ".$filters["price"] : "";
        $sort_volume = $filters["sort_volume"] !== "no" ? "manga_volume.volume_number ".$filters["sort_volume"] : "";

        $comma = "";
        $order= "order by manga_volume.id asc";
        
        if ($price !== "" && $sort_volume !== ""){
            $comma = " , ";
        } 
        
        if ($price !=="" || $sort_volume!==""){
            $order = "order by ".$sort_volume.$comma.$price;
        }

        $available = "";

        if ($price !== "" && $sort_volume !== ""){
            $comma = " , ";
        } 
        
        if ($filters["available"] === "true"){
            $available = "and manga_volume.stock > 0 "; 
        }

        $db = Database::getInstance(); 

        $sql = 'SELECT count(*) 
            from manga_volume, manga_common 
            where manga_volume.common_id = manga_common.common_id
            and manga_common.title like :title
            and manga_volume.volume_number like :volume '.
            $available.
            $order.'
            ';

        $getProducts = $db->prepare($sql);
                    
        $getProducts->bindParam(":title", $title);
        $getProducts->bindParam(":volume", $volume);
        $getProducts->execute();

        $count = $getProducts->fetch();


        return intval($count[0]);
    }

    public function getProducts($filters, $page){

        $offset = ($page - 1) * 10;
        $title = "%".$filters["title"]."%";
        $volume = "%".$filters["volume"]."%";

        $price = $filters["price"] !== "no" ? "manga_volume.price ".$filters["price"] : "";
        $sort_volume = $filters["sort_volume"] !== "no" ? "manga_volume.volume_number ".$filters["sort_volume"] : "";

        $comma = "";
        $order= "order by manga_volume.id asc";
        
        if ($price !== "" && $sort_volume !== ""){
            $comma = " , ";
        } 
        
        if ($price !=="" || $sort_volume!==""){
            $order = "order by ".$sort_volume.$comma.$price;
        }

        $available = "";

        if ($filters["available"] === "true"){
            $available = "and manga_volume.stock > 0 "; 
        }

        $db = Database::getInstance(); 

        $sql = 'SELECT * 
            from manga_volume, manga_common 
            where manga_volume.common_id = manga_common.common_id
            and manga_common.title like :title
            and manga_volume.volume_number like :volume '.
            $available.
            $order.'
            limit 10 
            OFFSET :offset
            ';

        $getProducts = $db->prepare($sql);
                    
        $getProducts->bindParam(":offset", intval($offset), PDO::PARAM_INT);
        $getProducts->bindParam(":title", $title);
        $getProducts->bindParam(":volume", $volume);
        $getProducts->execute();

        $products = $getProducts->fetchAll();

        return $this->generateMangas($products);
    }

    public function getInitialProducts($page){

        $offset = ($page - 1) * 10;

        $db = Database::getInstance();  

        $sql = 'SELECT * 
            from manga_volume, manga_common 
            where manga_volume.common_id = manga_common.common_id
            order by manga_volume.volume_number asc, manga_volume.price asc
            limit 10 
            OFFSET :offset
            ';

        $getInitialProducts = $db->prepare($sql);
        
        $getInitialProducts->bindParam(":offset", intval($offset), PDO::PARAM_INT);
        $getInitialProducts->execute();

        $products = $getInitialProducts->fetchAll();

        return $this->generateMangas($products);
    }

    public function getProductsVolume1(){
        $db = Database::getInstance();

        $sql = 'SELECT * 
            from manga_volume, manga_common 
            where manga_volume.volume_number = 1
            and manga_volume.common_id = manga_common.common_id';

        $getInitialProducts = $db->prepare($sql);
        $getInitialProducts->execute();

        $products = $getInitialProducts->fetchAll();

        return $this->generateMangas($products);
    }

}