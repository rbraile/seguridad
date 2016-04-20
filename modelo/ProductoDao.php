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
        $sql_query = "SELECT * FROM producto";
        $productosDao = $this->mysqli->query($sql_query);
        $productos = array();
        while($row = mysqli_fetch_assoc($productosDao)) {
            $productos[] = $row;
        }
        return $productos;
    }

    public function getProductosHabilitadosDao() {
        $sql_query = "SELECT * FROM producto as pro 
                        WHERE pro.habilitado = 1";
        $productosDao = $this->mysqli->query($sql_query);
        $productos = array();
        while($row = mysqli_fetch_assoc($productosDao)) {
            $productos[] = $row;
        }
        return $productos;
    }

    public function getProductoByIdDao($id) {
        $sql_query = "SELECT * FROM producto WHERE id = $id";
        $productosDao = $this->mysqli->query($sql_query);
        $productos = array();
        while($row = mysqli_fetch_assoc($productosDao)) {
            $productos[] = $row;
        }
        return $productos;
    }

    public function setProductoDao($nombre, $habilitado) {
        $sql_query = "INSERT INTO producto (nombre, habilitado) VALUES ('$nombre', $habilitado)";
        $this->mysqli->query($sql_query);
        return $this->mysqli->insert_id;
    
    }

    public function editarProductoDao($id, $nombre, $habilitado) {
        $sql_query = "UPDATE producto SET nombre = '$nombre', habilitado = $habilitado WHERE id = $id";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }
    
    public function deleteProductoDao($id) {
        $sql_query = "DELETE FROM producto WHERE id = $id";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }

}
