<?php
/*
* Usuario class
*/
require_once "modelo/Conexion.php";

class UsuarioDao {    
    private $_db;
    private $_mysqli;

    public function UsuarioDao() {
        $this->db = Conexion::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function getUserCredentialDao($formEmail) {
        $sql_query = "SELECT * FROM usuario WHERE email='$formEmail' AND habilitado = 1";
        $pedido = $this->mysqli->query($sql_query);
        return $this->mapUser( mysqli_fetch_array($pedido));
    }

    public function updateUsuarioDao($id, $nombre,$email) {
        $sql_query = "UPDATE usuario SET nombre = '$nombre', email = '$email'  WHERE id_usuario = $id";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }

    public function updateSelfUsuarioDao($id, $nombre,$email,$password) {
        $sql_query = "UPDATE usuario SET nombre = '$nombre', email = '$email', password = '$password'  WHERE id_usuario = $id";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }

    public function getUserWithoutCredentialDao(){
        $sql_query = "SELECT * FROM usuario WHERE  habilitado = 0";
        $pedido = $this->mysqli->query($sql_query);
        $listaUsuarios = array();
        while($usuario = mysqli_fetch_array($pedido)) {
            array_push($listaUsuarios, $this->mapUser($usuario));
        }
        return $listaUsuarios;
    }

    public function getUsersWhitCredential(){
       $sql_query = "SELECT * FROM usuario WHERE  habilitado = 1";
       $pedido = $this->mysqli->query($sql_query); 
       return  $pedido;
    }

    public function getUsersDeletablesDao(){
        $sql_query = "SELECT * FROM usuario WHERE  habilitado = 1 AND nombre <> 'admin' ";
        $pedido = $this->mysqli->query($sql_query);
        $listaUsuarios = array();
        while($usuario = mysqli_fetch_array($pedido)) {
            array_push($listaUsuarios, $this->mapUser($usuario));
        }
       return  $listaUsuarios;
    }

    public function getUserByIdDao($id){

        $sql_query =  "SELECT * FROM usuario WHERE id_usuario= $id ";
        $pedido = $this->mysqli->query($sql_query);
         return mysqli_fetch_array($pedido);
    }

    public function getUserByEmailDao($email){
        $sql_query =  "SELECT * FROM usuario WHERE email= '$email' ";
        $pedido = $this->mysqli->query($sql_query); 
        return mysqli_fetch_array($pedido);
    }

    public function setPasswordDao($id,$password){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql_query = "UPDATE usuario SET  password= '$password' WHERE id_usuario = $id";
        $this->mysqli->query($sql_query); 
        return $this->mysqli->affected_rows;

    }

    public function setNewUser($formNombre,$formEmail,$formPassword){
        $formPassword = password_hash($formPassword, PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO  usuario (id_usuario, nombre, email, password,habilitado)
        VALUES (NULL, '$formNombre','$formEmail','$formPassword','false') ";
        $this->mysqli->query($sql_query); 
        return $this->mysqli->affected_rows;
    }

    public function setUserCredentialDao($id){
        $sql_query = "UPDATE usuario SET habilitado= '1' WHERE id_usuario = $id";
        $this->mysqli->query($sql_query); 
        return $this->mysqli->affected_rows;
    }

    public function setFielEnable($id){
        $sql_query = "UPDATE usuario SET habilitado= '0' WHERE id_usuario = $id";
        $this->mysqli->query($sql_query); 
        return $this->mysqli->affected_rows;
    }

    public function mapUser($usuario) {
        $newUsuario = array();
        $newUsuario = [
            'id'=> $usuario['id_usuario'],
            'nombre' => $usuario['nombre'],
            'email' => $usuario['email'],
            'habilitado' => $usuario['habilitado'],
            'password' => $usuario['password']
        ];
        return $newUsuario;
    }

    public function updateUsuarioKeyDao($token,$time,$email){
        $sql_query = "UPDATE usuario SET token='$token' , tokenExpirationTime = '$time' WHERE email='$email'  ";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }
            

}