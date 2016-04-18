<?php
	
	require_once "modelo/Conexion.php";
	require_once "modelo/UsuarioDao.php";
	require_once "altaUsuario.php";
	require_once "listarUsuariosHabilitables.php";



	if($_SESSION["userLevel"] == "admin"){
	
			$id= $_GET['ID'];

			$user = new UsuarioDao();

			var_dump($user);

			$userInProgress= $user->setUserCredential($id);
			
			var_dump($userInProgress);

			if($userInProgress == 1){

				echo "<script>window.location='listarUsuariosHabilitables.php';</script>";

				

			

			}else{

				echo'Error al intentar habilitarlo.Intente más tarde';

				//header("Refresh:0; url=listarUsuariosHabilitables.php");
			}


		

	}
	

?>