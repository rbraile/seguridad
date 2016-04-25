<?php
    
	require_once "validarLogin.php";
    require_once "modelo/Conexion.php"; 
    require_once "modelo/UsuarioDao.php";
    


  
  if(isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] == "admin"){

  	$userId= $_GET['ID'];

  	$user= new UsuarioDao();
  	$pedido= $user->getUserById($userId);

?>
				<!DOCTYPE html>
				<html>
					<head>
						<meta charset="utf-8">
						<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
						<link href="css/cssApp.css" rel="stylesheet">
						<link href="css/bootstrap.min.css" rel="stylesheet">
						<script src="js/bootstrap.min.js"></script>
						<title>Modificar password</title>
					</head>
					<body>
							<div class="container">
								<div class="row centered">
								  <div class="jumbotron col-md-6">		
										<form action="" name="editPassword" method="POST">
											<div class="form-group">
												<label>Cambie su contraseña:</label>
											    <input type="text" class="form-control"  value="<?php echo $pedido["password"]; ?> "  name="password" required>
											</div>			 
											<button type="submit" name="cambiar" class="btn btn-default">Cambiar</button>
											
										</form>
									</div>
								</div>
							</div>
								<?php echo '<a  class="btn btn-default"  name="atras" href="bodyForAdmin.php">Atrás</a>';?>

					</body>
				</html>

 <?php
	  	}

	  	$succes= 0;

 		if(isset($_POST["cambiar"])){	

 			if(isset($_POST['password']) && !empty($_POST['password'])){

 					$password= $_POST["password"];
	  				$succes= $user->setPassword($userId,$password);
 			}
	 		if( $succes	== 1 ){

	 			echo'su contraseña se cambió exitosamente por $password';
	 			echo "<script>window.location='bodyForAdmin.php';</script>";

	 		}else{

	 			echo 'Hubo un error, su contraseña no pudo ser cambiada';
	 		}

 		}
 		

?>