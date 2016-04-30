<?php
/*
* Usuario class
*/
require_once ("modelo/UsuarioDao.php");

class Usuario {
    private $UsuarioDao;
    
    public function Usuario() {
        $this->UsuarioDao = new UsuarioDao();
    }

    public function getUserWithoutCredential() {
        return $this->UsuarioDao->getUserWithoutCredentialDao();    
    }

    public function getPrecios($idSemana) {
        return $this->PrecioDao->getPreciosDao($idSemana);
    }
    
    public function getPrecioById($idUsuario, $idProducto, $idSemana) {
        return $this->PrecioDao->getPrecioByIdDao($idUsuario, $idProducto, $idSemana);
    }

    public function getPreciosHistorial($idSemana) {
        $allPrecios = $this->PrecioDao->getPreciosDao($idSemana);

        if($allPrecios) {
            $precios = array();
            foreach ($allPrecios as $precio) {
                $precios[$precio["nombre"]][] = $precio["precio"];
            }
            $calculos = $this->calcular($precios);
            return $calculos;
        } else {
            return 0;
        }
    }

    public function addPrecio($idProducto,$idUsuario,$idSemana,$precio) {
        return $this->PrecioDao->addPrecioDao($idProducto,$idUsuario,$idSemana,$precio);
    }

    public function updatePrecio($idPrecio, $precio) {
        return $this->PrecioDao->updatePrecioDao($idPrecio, $precio);
    }

}
