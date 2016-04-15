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

    public function getProductos($idSemana) {
        return $this->ProductoDao->getProductosDao($idSemana);
    }

}