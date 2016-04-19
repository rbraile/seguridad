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
        $current = $this->getCurrentSemanaDao();
        $fecha_ini = new DateTime($current["fecha_ini"]);
        $fecha_fin = new DateTime($current["fecha_fin"]);
        $hoy = date("Y-m-d H:i:s"); 

        if( $hoy < $fecha_ini->format('Y-m-d H:i:s') || $fecha_fin->format('Y-m-d H:i:s') < $hoy ) {
            $inicio = new DateInterval('PT1S');
            $new_fecha_ini = new DateTime($fecha_fin->format('Y-m-d H:i:s'));
            $new_fecha_ini->add($inicio);
            // intervalo de 6 dias y 23 horas 59 minutos 59 segundos en sugundos
            $fin = new DateInterval('PT604799S');
            $new_fecha_fin = new DateTime($new_fecha_ini->format('Y-m-d H:i:s'));
            $new_fecha_fin->add($fin);
            $this->inhabilitarSemanaDao($current["id"]);
            $this->addCurrentSemanaDao($new_fecha_ini->format('Y-m-d H:i:s'), $new_fecha_fin->format('Y-m-d H:i:s'));
        }        
    }

    public function getCurrentSemanaDao() {
        $sql_query = "SELECT * FROM semana WHERE current = 1";
        $result = $this->mysqli->query($sql_query);
        return mysqli_fetch_assoc($result);
    }

    public function addCurrentSemanaDao($fecha_ini, $fecha_fin) {
        $sql_query = "INSERT INTO semana (fecha_ini, fecha_fin, current) VALUES ('$fecha_ini', '$fecha_fin', 1)";
        $this->mysqli->query($sql_query);
        return $this->mysqli->insert_id;
    }

    public function inhabilitarSemanaDao($semanaId) {
        $sql_query = "UPDATE semana SET current = 0 WHERE id = $semanaId";
        $this->mysqli->query($sql_query);
        return $this->mysqli->affected_rows;
    }
    
    public function getAllSemanasDao() {
        $sql_query = "SELECT * FROM semana ORDER BY fecha_ini DESC";
        $semanaDao = $this->mysqli->query($sql_query);
        $semanas = array();
        while($row = mysqli_fetch_assoc($semanaDao)) {
            $semanas[] = $row;
        }
        return $semanas;
    }
    
}