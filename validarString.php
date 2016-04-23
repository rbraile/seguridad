<?php
	function stringValido($valor){

	    $valid =preg_match('/^[a-zñÑáéíóú\d_\s]{4,28}$/i', $valor);

	    if($valid == 1) {
	    	return true;
	    }else {
	    	return false;
	    }
	}
?>