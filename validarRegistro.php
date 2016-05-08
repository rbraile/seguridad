<?php

	
   header('X-Frame-Options: SAMEORIGIN');
	require_once "modelo/UsuarioDao.php";
	require_once "validarString.php";
	

	$succes= false;

						
	if(isset($_POST['registrar'])){

						
		if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

						

			if(isset($_POST['email']) && !empty($_POST['email'])){

				if(isset($_POST['password']) && !empty($_POST['password'])){



						$formNombre= trim(mb_strtolower($_POST['nombre']));
						$formEmail= trim(mb_strtolower($_POST['email']));
						$formPassword= $_POST['password'];


					$emailType= filter_var($formEmail, FILTER_VALIDATE_EMAIL);

					$nombreType= stringValido($formNombre);
					$user = new UsuarioDao();
					$exist = $user->getUserByEmailDao($formEmail);
					$insertado= false;	

					if($emailType){

							if($exist != null){

								echo 'ya existe un usuario con ese email';
							}else{

								if($nombreType){

									$newUser = new UsuarioDao();
									$insertado = $newUser->setNewUser($formNombre,$formEmail,$formPassword);
								}else{

									echo'Error: valores inválidos';
									}

								}

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