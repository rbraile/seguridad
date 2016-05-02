<?php
/*
* Usuario class
*/
require_once ("modelo/UsuarioDao.php");

class Usuario {
    private $UsuarioDao;
    
    public function Usuario() {
        $this->UsuarioDao = new UsuarioDao();
    }

    public function getUserWithoutCredential() {
        return $this->UsuarioDao->getUserWithoutCredentialDao();    
    }

    public function getUsersDeletables() {
        return $this->UsuarioDao->getUsersDeletablesDao();    
    }

    public function setUserCredential($id) {
        return $this->UsuarioDao->setUserCredentialDao($id);    
    }

    public function getUserByEmail($email) {
        return $this->UsuarioDao->getUserByEmailDao($email);    
    }

    public function updateUsuario($id, $nombre,$email) {
        return $this->UsuarioDao->updateUsuarioDao($id, $nombre,$email);    
    }

    public function updateSelfUsuario($id, $nombre,$email, $password) {
        return $this->UsuarioDao->updateSelfUsuarioDao($id, $nombre,$email, $password);    
    }

    public function getUserById($id) {
        return $this->UsuarioDao->getUserByIdDao($id);    
    }

    public function setPassword($id,$password){
        return $this->UsuarioDao->setPasswordDao($id,$password);    
    }
}
