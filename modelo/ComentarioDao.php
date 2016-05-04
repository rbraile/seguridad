<?php
/*
* ComentarioDao class
*/
require_once ("Conexion.php");

class ComentarioDao {
    private $_db;
    private $_mysqli;

    public function ComentarioDao() {
        $this->db = Conexion::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function addComentarioDao($comentario,$idUsuario) {
    	$sql_query = "INSERT INTO comentario (comentario, id_usuario) VALUES ('$comentario', $idUsuario)";
    	$this->mysqli->query($sql_query);
    	return $this->mysqli->insert_id;
    }
}