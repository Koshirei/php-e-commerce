<?php

namespace Interfaces;

interface interface_stockManagement {

    public function setStock($id, $newStock);
    public function getStock($id):string; //get stock va permettre de chopper le stock dans la bdd au cas ou le stock tombe de 1 à 0, et qu'un client , déjà sur la page, essaie d'ajouter au panier ( ce qui doit envoyer une erreur sinon le stock sera négatif )
    
}