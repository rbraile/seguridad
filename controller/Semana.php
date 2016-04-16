<?php
/*
* Precio class
*/
require_once ("modelo/SemanaDao.php");

class Semana {
    public $SemanaDao;
    
    public function Semana() {
        $this->SemanaDao = new SemanaDao();
    }
    
    public function getCurrentSemana() {
        return $this->SemanaDao->getCurrentSemanaDao();
    }

}
