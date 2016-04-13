
<?php

	$conexion = new mysqli("localhost", "superduper", "V004342", "historial_db");

	if (!$conexion) {
    	echo "Ups! No pudimos conectar con el servidor: " . PHP_EOL;
   		 exit;
		}

?>