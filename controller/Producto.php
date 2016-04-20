<?php
/*
* Producto class
*/
require_once ("modelo/ProductoDao.php");

class Producto {
    private $ProductoDao;
    
    public function Producto() {
        $this->ProductoDao = new ProductoDao();
    }

    public function getProductos() {
        return $this->ProductoDao->getProductosDao();
    }

    public function getProductosHabilitados() {
        return $this->ProductoDao->getProductosHabilitadosDao();
    }
    
    public function getProductoById($id) {
        return $this->ProductoDao->getProductoByIdDao($id);
    }

    public function editarProducto($id, $nombre, $habilitado) {
        return $this->ProductoDao->editarProductoDao($id, $nombre, $habilitado);
    }

    public function setProducto($nombre, $habilitado) {
        $this->ProductoDao->setProductoDao($nombre, $habilitado);
    }

    public function deleteProducto($id) {
        $this->ProductoDao->deleteProductoDao($id);
    }


}