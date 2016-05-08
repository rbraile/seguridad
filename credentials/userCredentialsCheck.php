<?php

require_once"controller/Usuario.php";

function checkCredentials($roleName = "user", $email) { 

	$sesionAbierta= isset($_SESSION["userLevel"]);

	if($sesionAbierta != $roleName){

		return false;

	}

	$user= new Usuario();
	$userSelected= $user->getUserByEmail($email);

	if (!$userSelected['tokenExpirationTime']){

		echo 'no esta logueado, no esta cargada la fecha de expiracion!';
		return false;
	}
	$time= new DateTime();
    $dateString= $time->format('Y-m-d H:i:s');
	
	if ($userSelected['tokenExpirationTime'] < $dateString) {
		echo'expiro el tiempo de acreditación. Ingrese nuevamente!';
		 echo '<a  class="btn  btn-primary"   name="Volver" href="index.php">Atrás</a>';

		return false;
	}

	if (!$userSelected['token']){
		echo 'no esta logueado, no esta cargado el token!';
		return false;
	}

	return true;
}

?>