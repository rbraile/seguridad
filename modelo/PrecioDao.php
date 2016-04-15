<?php
/*
* Precio class
*/
require_once "Conexion.php";

class PrecioDao {
    private $_db;
    private $_mysqli;

    public function PrecioDao() {
        $this->db = Conexion::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function setPrecioDao($id_producto,$id_usuario,$id_semana, $valor) {
        $sql_query = "INSERT INTO precio (id_producto, id_usuario, id_semana, precio, fecha) VALUES 
    ($id_producto,$id_usuario,$id_semana, $valor, NOW())";
        $this->mysqli->query($sql_query);
        return $this->mysqli->insert_id;
    }

    public function getPreciosDao($idSemana) {
        $sql_query = "SELECT * FROM precio WHERE id_semana = $idSemana";
        $preciosDao = $this->mysqli->query($sql_query);
        while($row = mysqli_fetch_assoc($preciosDao)) {
            $precios[] = $row;
        }
        return $precios;
    }
    
}