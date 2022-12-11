<?php

namespace Interfaces;

interface interface_getProducts {

    public function getNbOfProducts($filter, $page):int;
    public function getProducts($filter, $page);
    public function getInitialProducts($page);
    
}