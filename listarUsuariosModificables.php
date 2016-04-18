<?php


require_once "validarLogin.php";

if( $_SESSION["userLevel"] == "admin"){


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
}


?>