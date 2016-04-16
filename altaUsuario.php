<?php
	
	

	require_once "modelo/Conexion.php";
	require_once "modelo/PrecioDao.php";


	 $user = new UsuarioDao();

	$pedido = $user->getUserWithoutCredential();

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

	
?>