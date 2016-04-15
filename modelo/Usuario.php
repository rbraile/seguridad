<?php
/*
* Usuario class
*/

require_once "modelo/Conexion.php";
require_once "modificarUsuario.php";


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

    public function getUserWithoutCredential(){

        $sql_query = "SELECT * FROM usuario WHERE  habilitado = 0";

        $pedido = $this->mysqli->query($sql_query);

        return $pedido;

    }
    public function getUsuarioModificable(){

        $sql_query = "SELECT * FROM usuario WHERE  ";

       $pedido = $this->mysqli->query($sql_query); 

       $userEditable = mysqli_fetch_array($pedido);

       return  $userEditable;

    }



}