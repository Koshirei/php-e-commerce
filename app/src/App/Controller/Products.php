<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getProducts;

class Products
{

  public function noFiltersProducts($page = 1){
    
    $getProducts = new getProducts();
    $products = $getProducts->getInitialProducts($page);

    return $products;

  }

  public function filtersProducts($page = 1){
  
    $filters = [
      "title" => $_GET["title"],
      "volume" => $_GET["volume"]
    ];

    $getProducts = new getProducts();
    $products = $getProducts->getProducts($filters,$page);

    return $products;
  }

  public function __invoke()
  {
      
    require './init_session.php';

    $page = $_GET["page"] ? $_GET["page"] : "1";
    if ($page==="0") $page = "1"; 
    $page = intval($page);

    $mangas;

    if(!isset($_GET["title"])){
      $mangas = $this->noFiltersProducts($page);
    }else{
      $mangas = $this->filtersProducts($page);
    }

    return new Response('products.html.twig', ['get' => $_GET, "language"=>$traductions, "user"=>$_SESSION["user"] , "mangas" => $mangas]);
      
  }
}
