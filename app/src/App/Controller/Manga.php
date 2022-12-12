<?php

namespace App\Controller;

use Entity\CartItem;
use Framework\Response\Response;
use Services\mysql_PDO\getManga;
use Services\mysql_PDO\stockManagement;
use Services\mysql_PDO\getNbVolume;

class Manga
{

  public function add2cart($manga){

    $stockManagement = new stockManagement();

    $currentDBstock = $stockManagement->getStock($manga->getId());

    if ($currentDBstock > 0){
      
      $cartItem = new CartItem(
        $manga->getId(),
        $manga->getTitle(),
        $manga->getVolume(),
        $manga->getUnique_Cover(),
        $manga->getPrice()
      );
      
      $alreadyInCart = false;

      foreach($_SESSION["cart"] as $cart){
          if($cartItem->getTitle() === $cart->getTitle() && 
              $cartItem->getVolume() === $cart->getVolume()){
            $alreadyInCart = true;
          }
      }

      if (!$alreadyInCart){
        $newStock = strval($currentDBstock-1);
        $stockManagement->decrementStock($manga->getId());
        $manga->setStock($newStock);
  
        array_push($_SESSION["cart"], $cartItem);

        return true;
      }else{

        return false;
      }
    }else{
      return false;
    }

  }

  public function __invoke()
  {
      require './init_session.php';
      
      $getNbVolume = new getNbVolume();
      $count = $getNbVolume->getNbVolume();

      if (!isset($_GET["id"]) || $_GET["id"] === "0" || intval($_GET["id"]) > $count){
          header("Location: /");
      }

        $id = $_GET["id"];
        
        $getmanga = new getManga;
        
        $manga = $getmanga->getMangaInDB($id);
        
        $error = [];
        $success = [];
        
        if (
          isset($_GET["cart"]) &&
          $_GET["cart"] === "true" &&
          $manga->getStock() > 0
          )
          {
            $success["cart"] = $this->add2cart($manga);
          }
          else if(isset($_GET["cart"]) && $manga->getStock() === "0"){
            $error["cartNoStock"] = true;
          }

        return new Response('manga.html.twig', [ "manga" => $manga, "language" => $traductions, "success" => $success, "error" => $error, 'user'=>$_SESSION["user"]] );
        }

  }

