<?php
	include_once'listarUsuariosBaja.php';
	require_once "validarLogin.php";
	require_once "modelo/Conexion.php";
	require_once "modelo/UsuarioDao.php";


if(isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] == "admin"){

	 	
		$user = new UsuarioDao();

		$pedido = $user->getUsersDeletables();

		$usuario = mysqli_fetch_array($pedido);

		$listaUsuarios = array();

		while($usuario != null)
		{
			$newObject = array(

				'id'=> $usuario['id_usuario'],
				'nombre' => $usuario['nombre'],
				'email' => $usuario['email'],
				'habilitado' => $usuario['habilitado'],
				'password' => $usuario['password'],
			);

			array_push($listaUsuarios, $newObject);
			
			$usuario = mysqli_fetch_array($pedido);
		}
}else{
	echo "<script>window.location='index.php';</script>";

}

if(isset($_GET['ID'])){	
	$id = $_GET['ID'];

	$user= new UsuarioDao();

	$wasDeleted= $user->setFielEnable($id);


	if($wasDeleted == 1){

	
		echo "<script>window.location='listarUsuariosBaja.php';</script>";
	}else{

		echo'Error al borrar. Intente más tarde.';
	}

	
}

	
	

?>