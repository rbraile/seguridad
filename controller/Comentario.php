<?php
/*
* Comentario class
*/
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__."/modelo/ComentarioDao.php");

class Comentario {
    private $comentarioDao;

    public function Comentario() {
    	$this->comentarioDao = new ComentarioDao();
    }

    public function addComentario($comentario,$idUsuario) {
		$value = trim(strip_tags($comentario));
		if($value != '') {
    		return $this->comentarioDao->addComentarioDao($value,$idUsuario);
		} else {
			return -1;
		}
    }

    public function AllComentarios() {
    	return $this->comentarioDao->AllComentariosDao();
    }
}



