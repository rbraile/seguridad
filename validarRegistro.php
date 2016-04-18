<?php

	
	require_once "modelo/UsuarioDao.php";

	$succes= false;

						
	if(isset($_POST['registrar'])){

						
		if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

						

			if(isset($_POST['email']) && !empty($_POST['email'])){

						
				

				if(isset($_POST['password']) && !empty($_POST['password'])){
						
					

						$formNombre= $_POST['nombre'];
						$formEmail= $_POST['email'];
						$formPassword= $_POST['password'];
						
						
					$user = new UsuarioDao();

					$exist = $user->getUserForEmail($formEmail);	

					if($exist != null){

						echo 'ya existe un usuario con ese email';
					}else{

						$newUser = new UsuarioDao();

						$insertado = $newUser->setNewUser($formNombre,$formEmail,$formPassword);
					}
					

						if($insertado){

							$succes = true;

							echo'<script>alert("Ingreso exitoso.Espere a ser habilitado.");</script>';

							header("Refresh:0; url=index.php");

						
							
						}
				}
			}
		}

	}
	if(!$succes){

		echo 'error al crearse el usuario. Intente más tarde';
	}



?>