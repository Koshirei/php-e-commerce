<?php

namespace App\Controller;

use Framework\Response\Response;

class Cart
{
  public function __invoke()
  {
        require './init_session.php';

        $full_price = 0;

        foreach($_SESSION["cart"] as $item){
            $full_price+= floatval($item->getPrice());
        }

      return new Response('cart.html.twig', ['get' => $_POST, "language" => $traductions, 'cartItems' => $_SESSION["cart"], 'cartPrice' => $full_price, "user" => $_SESSION["user"]] );
      
  }
}
