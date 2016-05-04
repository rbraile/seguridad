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

    public function AllComentariosDao() {
        $sql_query = "select co.comentario, us.nombre, us.id_usuario, co.id from comentario AS co LEFT JOIN usuario AS us ON co.id_usuario = us.id_usuario";


        $pedido = $this->mysqli->query($sql_query);
        $listaComentarios = array();
        while($comentario = mysqli_fetch_array($pedido)) {
            array_push($listaComentarios, $this->mapComentario($comentario));
        }
        return $listaComentarios;
    }

     public function mapComentario($comentario) {
        $newComentario = array();
        $newComentario = [
            'id'=> $comentario['id'],
            'nombre' => $comentario['nombre'],
            'id_usuario' => $comentario['id_usuario'],
            'comentario' => $comentario['comentario']
        ];
        return $newComentario;
    }
}