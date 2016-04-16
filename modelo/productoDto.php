<?php
/*
* ProductoDto class
*/

class ProductoDto {

    private $nombre;
    private $id;

    public function ProductoDto($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }
}