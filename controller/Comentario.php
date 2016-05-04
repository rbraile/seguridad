<?php
/*
* Comentario class
*/
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__."/modelo/ComentarioDao.php");

class Comentario {
    private $ComentarioDao;

    public function Comentario() {
    	$this->ComentarioDao = new ComentarioDao();
    }

    public function addComentario($comentario,$idUsuario) {
		$value = strip_tags($comentario);
    	$this->ComentarioDao->addComentarioDao($value,$idUsuario);
    }
}



