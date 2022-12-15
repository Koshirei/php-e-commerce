<?php

namespace App\Controller;

use Framework\Response\Response;
use Services\mysql_PDO\cartManagement;

class Cart
{

  //update session["cart"], supprime les cartItems de la session que ne sont pas dans la table cart_history de la bdd
  //si le cartItem n'est pas dans la bdd c'est car : le bouton " supprimer du panier " a été cliqué, user a décrémenté la quantité jusque 0, le script cron ../../cron/deleteOutdatedCarts.php l'a supprimé car créé il y a trop longtemps
  public function updateCart(){

    $cartManagement = new cartManagement();

    $temp_cart = [];

    foreach($_SESSION["cart"] as $cartItem){
      $check = $cartManagement->checkIfCartInDb($cartItem->getCartId());

      if ($check === 1){
        array_push($temp_cart, $cartItem);
      }
    }

    $_SESSION["cart"] = $temp_cart;
  }


  public function __invoke()
  {
        require './init_session.php';

        $this->updateCart();

        $full_price = 0;

        foreach($_SESSION["cart"] as $item){
            $full_price+= floatval($item->getPrice()) * $item->getQuantity();
        }

        return new Response('cart.html.twig', ['get' => $_POST, "language" => $traductions, 'cartItems' => $_SESSION["cart"], 'cartPrice' => $full_price, "user" => $_SESSION["user"]] );
      
  }
}
