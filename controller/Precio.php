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
    
    public function getPrecioById($idUsuario, $idProducto, $idSemana) {
        return $this->PrecioDao->getPrecioByIdDao($idUsuario, $idProducto, $idSemana);
    }

    public function addPrecio($idProducto,$idUsuario,$idSemana,$precio) {
        return $this->PrecioDao->addPrecioDao($idProducto,$idUsuario,$idSemana,$precio);
    }

    public function updatePrecio($idPrecio, $precio) {
        return $this->PrecioDao->updatePrecioDao($idPrecio, $precio);
    }


}
