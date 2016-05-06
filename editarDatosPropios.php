<!DOCTYPE>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
		<link href="css/cssApp.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<title>Historial semanal de precios</title>
	</head>
	<body>
		<?php
			include('validarLogin.php');
			require_once "controller/Usuario.php";
			require_once "validarString.php";
			require_once"credentials/userCredentialsCheck.php";
		
			//include('altaUsuario.php');

			$data = $_SESSION["activeUser"];

			if (checkCredentials('user',$data))
			{ 

				$isCurrent=$_GET["is"]; 
				$idUser= base64_decode($isCurrent);
				$emailSession= $_SESSION["activeUser"];
				$user= new Usuario();

				$activeUser= $user->getUserById($idUser);

				$emailDb= $activeUser["email"];
				$nombre= $activeUser["nombre"];
				$email=$activeUser["email"];
				$password= $activeUser["password"];

				if($emailSession == $emailDb){

		?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Modidicar Usuarios</title>
				</head>
					<body>

						<div class="container">
		                 
                		</div>
						<div class="container">
							<div class="row centered">
								 <div class="jumbotron col-md-6">	

								 <h3 class="text-center">Edita tus datos</h3>
									<form action="" name="formModificar" method="POST">
										<div class="form-group">
											<label>Nombre:</label>
											   <input type="text" class="form-control"  value="<?php echo $nombre; ?> "  name="nombre" required>
										</div>
										<div class="form-group">   
											 <label>Email:</label>
										     <input type="text" class="form-control"  value="<?php echo $email; ?> " name="email" required>
										</div>
										<div class="form-group">   
											 <label>Contraseña:</label>
										     <input type="text" class="form-control"  value="<?php echo $password;?> " name="password" required>
										</div>
											
														 
										<button type="submit" name="editar" class="btn btn-default">Editar</button>
											
									</form>
								</div>
							</div>
						</div>
					</body>
				</html>
		
		<?php

	}else{echo'Epa epa!!!, Los datos que nos mandas no son tuyos che.';}
				if(isset($_POST["editar"])){

					if(checkCredentials('user',$data)){

							$formNombre=trim(mb_strtolower($_POST['nombre']));
							$formEmail= trim(mb_strtolower($_POST['email']));

							$emailType= filter_var($formEmail, FILTER_VALIDATE_EMAIL);
							$nombreType= stringValido($formNombre);

							$formPassword= $_POST["password"];
							$user2= new Usuario();
							if($emailType && $nombreType){
								$isSet= $user2->updateSelfUsuario($idUser,$formNombre,$formEmail,$formPassword);
								$_SESSION["activeUser"]= $formEmail;
							}else{
								echo'Valores ingresados inválidos';
							}
							if($isSet == 1){

								echo "<script>window.location='panel.php';</script>";

							}

					}else{
						echo "<script>window.location='index.php';</script>";
					}


				}
				 echo '<a  class="btn  btn-primary"   name="atras" href="panel.php">Atrás</a>';
				
			}
			else
			{
				header("Location: index.php");
			}
		?>
		
	</body>

</html>