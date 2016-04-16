<?php
/*
* SemanaDao class
*/
require_once "Conexion.php";

class SemanaDao {
    private $_db;
    private $_mysqli;

    public function SemanaDao() {
        $this->db = Conexion::getInstance();
        $this->mysqli = $this->db->getConnection();
    }

    public function getCurrentSemanaDao() {
        $sql_query = "SELECT * FROM semana WHERE current = 1";
        $result = $this->mysqli->query($sql_query);
        return mysqli_fetch_assoc($result);
    }
    
}