<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\getProducts;

class Products
{

  public function initFilters(){

    $available = $_GET["available"] ? $_GET["available"] : "false";
  
    $filters = [
      "title" => $_GET["title"],
      "volume" => $_GET["volume"],
      "price" => $_GET["price"],
      "sort_volume" => $_GET["sort_volume"],
      "available" => $available
    ];

    return $filters;
  }

  public function noFiltersProducts($getProducts, $page = 1){
    
    $products = $getProducts->getInitialProducts($page);

    return $products;

  }

  public function filtersProducts($getProducts, $page = 1){

    $filters = $this->initFilters();

    $products = $getProducts->getProducts($filters,$page);

    return $products;
  }

  public function noFilterCount($getProducts){

    return $getProducts->getNbOfProducts();
  }

  public function filtersCount($getProducts){

    $filters = $this->initFilters();

    return $getProducts->getNbOfProductsFilters($filters);
  }

  public function __invoke()
  {
      
    require './init_session.php';

    $getProducts = new getProducts();

    $page = isset($_GET["page"]) ? (intval($_GET["page"])>=1 ? $_GET["page"] : "1") : "1";
    if ($page==="0") $page = "1"; 
    $page = intval($page);

    $mangas;
    $total_pages;

    if(!isset($_GET["title"])){
      $mangas = $this->noFiltersProducts($getProducts, $page);
      $count = $this->noFilterCount($getProducts);
    }else{
      $mangas = $this->filtersProducts($getProducts, $page);
      $count = $this->filtersCount($getProducts);
    }

    $total_pages = ceil($count / 10);

    return new Response('products.html.twig', ['get' => $_GET, "language"=>$traductions, "user"=>$_SESSION["user"] , "mangas" => $mangas, "page" => $page, "total_pages" => $total_pages]);
      
  }
}
