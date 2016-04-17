<?php
/*
* Precio class
*/
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__."/modelo/PrecioDao.php");

class Precio {
    private $PrecioDao;
    
    public function Precio() {
        $this->PrecioDao = new PrecioDao();
    }

    public function getPrecios($idSemana) {
        return $this->PrecioDao->getPreciosDao($idSemana);
    }
    
    public function getPrecioById($idUsuario, $idProducto, $idSemana) {
        return $this->PrecioDao->getPrecioByIdDao($idUsuario, $idProducto, $idSemana);
    }

    public function getPreciosHistorial($idSemana) {
        $allPrecios = $this->PrecioDao->getPreciosDao($idSemana);

        if($allPrecios) {
            $precios = array();
            foreach ($allPrecios as $precio) {
                $precios[$precio["nombre"]][] = $precio["precio"];
            }
            $calculos = $this->calcular($precios);
            return $calculos;
        } else {
            return 0;
        }
    }

    public function addPrecio($idProducto,$idUsuario,$idSemana,$precio) {
        return $this->PrecioDao->addPrecioDao($idProducto,$idUsuario,$idSemana,$precio);
    }

    public function updatePrecio($idPrecio, $precio) {
        return $this->PrecioDao->updatePrecioDao($idPrecio, $precio);
    }

    public function calcular($precios) {
        foreach ($precios as $key => $precio) {
            $producto[$key]['maximo'] = 0;
            $producto[$key]['minimo'] = 0;
            $producto[$key]['sumaTotal'] = 0;
            $producto[$key]['contador'] = 0;
            $i = 0;
            foreach ($precio as $valor) {
                
                if($valor > $producto[$key]['maximo']) {
                    $producto[$key]['maximo'] = $valor;
                }

                if($i == 0) {
                    $producto[$key]['minimo'] = $valor;
                }
                if($valor < $producto[$key]['minimo']) {
                    $producto[$key]['minimo'] = $valor;
                }
                $i++;
                $producto[$key]['contador']++;
                $producto[$key]['sumaTotal'] = $producto[$key]['sumaTotal'] + $valor; 
            }
        }
        return $producto;
    }

}
