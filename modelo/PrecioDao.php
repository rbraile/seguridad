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

    public function addPrecioDao($id_producto,$id_usuario,$id_semana, $valor) {
        $sql_query = "INSERT INTO precio (id_producto, id_usuario, id_semana, precio, fecha) VALUES 
    ($id_producto,$id_usuario,$id_semana, $valor, NOW())";
        $this->mysqli->query($sql_query);
        return $this->mysqli->insert_id;
    }

    public function updatePrecioDao($idPrecio, $precio) {
        $sql_query = "UPDATE precio SET precio = $precio WHERE id = $idPrecio";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }

    public function getPreciosDao($idSemana) {
        //$sql_query = "SELECT * FROM precio WHERE id_semana = $idSemana";
        $sql_query = "SELECT p.precio, po.nombre FROM precio as p 
                    INNER JOIN producto as po on p.id_producto = po.id
                    WHERE id_semana = $idSemana";
        $preciosDao = $this->mysqli->query($sql_query);
        $precios = array(); 
        if($preciosDao){
            while($row = mysqli_fetch_assoc($preciosDao)) {
                $precios[] = $row;
            }
        }
        return $precios;
    }
    
    public function getPrecioByIdDao($idUsuario, $idProducto, $idSemana) {
        $sql_query = "SELECT p.id, p.id_producto, p.id_usuario, p.id_semana, p.precio, p.fecha, po.nombre, po.habilitado FROM precio as p
                        INNER JOIN producto as po on p.id_producto = po.id
                        WHERE id_semana = $idSemana 
                        AND id_producto = $idProducto
                        AND id_usuario = $idUsuario";

        $result = $this->mysqli->query($sql_query); 
        return mysqli_fetch_assoc($result);
    }
    
}