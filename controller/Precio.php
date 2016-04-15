<?php
/*
* Precio class
*/
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__."/modelo/PrecioDao.php");

class Precio {
    public $PrecioDao;
    
    public function Precio() {
        $this->PrecioDao = new PrecioDao();
    }

    public function getPrecios($idSemana) {
        return $this->PrecioDao->getPreciosDao($idSemana);
    }
    
    public function setPrecio($idProducto,$idUsuario,$idSemana,$precio) {
        return $this->PrecioDao->setPrecioDao($idProducto,$idUsuario,$idSemana,$precio);
    }

}
