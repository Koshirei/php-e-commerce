<?php

namespace Interfaces;

interface interface_cartManagement{

    public function insertNewCart($cartId, $mangaId);
    public function updateCartQuantity($cartId, $quantity);
    public function selectOutdatedCarts($Minutes4Outdate);
    public function deleteCart($cartId);
    public function checkIfCartInDb($cartId):int;
    
}