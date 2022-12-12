<?php

namespace Interfaces;

interface interface_getProducts {

    public function getNbOfProducts():int;
    public function getNbOfProductsFilters($filter):int;
    public function getProducts($filter, $page);
    public function getInitialProducts($page);
    
}