<?php
/*
* Usuario class
*/
class Usuario {

    private $_mysqli;

    public function Usuario($mysqli) {
        $this->_mysqli = $mysqli;
    }

    public function getUserCredential($formEmail,$FormPassword) {
        $sql_query = "SELECT * FROM usuario WHERE email='$formEmail' AND password='$FormPassword' AND habilitado = 1";
        $pedido = $this->_mysqli->query($sql_query);
        return mysqli_fetch_array($pedido);
    }
}