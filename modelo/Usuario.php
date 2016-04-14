<?php
/*
* Usuario class
*/

require_once "Conexion.php";


class Usuario {    
    private $_db;
    private $_mysqli;

    public function Usuario() {
        $this->db = Conexion::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function getUserCredential($formEmail,$FormPassword) {
        $sql_query = "SELECT * FROM usuario WHERE email='$formEmail' AND password='$FormPassword' AND habilitado = 1";
        $pedido = $this->mysqli->query($sql_query);
        return mysqli_fetch_array($pedido);
    }
}