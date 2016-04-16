<?php
/*
* Usuario class
*/

require_once "modelo/Conexion.php";
//require_once "modificarUsuario.php";



class UsuarioDao {    
    private $_db;
    private $_mysqli;

    public function UsuarioDao() {

        $this->db = Conexion::getInstance();

        $this->mysqli = $this->db->getConnection();
    }

    public function getUserCredential($formEmail,$FormPassword) {

        $sql_query = "SELECT * FROM usuario WHERE email='$formEmail' AND password='$FormPassword' AND habilitado = 1";

        $pedido = $this->mysqli->query($sql_query);

        return mysqli_fetch_array($pedido);
    }

    public function updateUsuario($id, $nombre,$email) {
        $sql_query = "UPDATE usuario SET nombre = '$nombre', email = '$email' WHERE id_usuario = $id";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }

    public function getUserWithoutCredential(){

        $sql_query = "SELECT * FROM usuario WHERE  habilitado = 0";

        $pedido = $this->mysqli->query($sql_query);

        return $pedido;

    }
    public function getUsersWhitCredential(){

        $sql_query = "SELECT * FROM usuario WHERE  habilitado = 1";

       $pedido = $this->mysqli->query($sql_query); 

       return  $pedido;

    }
    public function getUserForId($id){

        $sql_query =  "SELECT * FROM usuario WHERE id_usuario= $id ";
        $pedido = $this->mysqli->query($sql_query); 
        return mysqli_fetch_array($pedido);
    }

}