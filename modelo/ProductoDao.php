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

    public function getProductosDao($idSemana) {
        $sql_query = "SELECT * FROM producto as pro LEFT JOIN precio as pre ON pro.id = pre.id_producto 
                        WHERE pro.habilitado = 1 AND pre.id_semana = $idSemana";
        $productosDao = $this->mysqli->query($sql_query);
        $productos = array();
        while($row = mysqli_fetch_assoc($productosDao)) {
            $productos[] = $row;
        }
        return $productos;
    }
    
}
