<?php
/*
* Producto class
*/
require_once ("Conexion.php");

class ProductoDao {
    private $_db;
    private $_mysqli;

    private $producto;

    public function ProductoDao() {
        $this->db = Conexion::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function getProductosDao() {
        $sql_query = "SELECT * FROM producto as pro 
                        WHERE pro.habilitado = 1";
        $productosDao = $this->mysqli->query($sql_query);
        $productos = array();
        while($row = mysqli_fetch_assoc($productosDao)) {
            $productos[] = $row;
        }
        return $productos;
    }
    
}
