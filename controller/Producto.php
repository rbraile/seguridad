<?php
/*
* Producto class
*/
require_once (__ROOT__."/modelo/ProductoDao.php");

class Producto {
    private $ProductoDao;
    
    public function Producto() {
        $this->ProductoDao = new ProductoDao();
    }

    public function getProductos() {
        return $this->ProductoDao->getProductosDao();
    }

}