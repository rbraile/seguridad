<?php
    
	require_once "validarLogin.php";
    require_once "modelo/Conexion.php"; 
     require_once "modelo/UsuarioDao.php";

  
  if($_SESSION["userLevel"] == "admin"){

	  	$user = new UsuarioDao();

	  	$email = $_SESSION["activeUser"];

	  	$id= 1;

	  	$element = $user->getUserForId($id);

	  	$password = $element["password"];

	  	$id= $element["id_usuario"];

	  	if(	$element != null){

	  		var_dump($id)
?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Modidicar Usuarios</title>
				</head>
					<body>
							<div class="container">
								<div class="row centered">
								  <div class="jumbotron col-md-6">		
										<form action="" name="editPassword" method="POST">
											<div class="form-group">
												<label>Cambie la contraseña:</label>
											    <input type="text" class="form-control"  value="<?php echo $element["password"]; ?> "  name="password" required>
											</div>			 
											<button type="submit" name="cambiar" class="btn btn-default">Cambiar</button>
											
										</form>
									</div>
								</div>
							</div>
						</body>
				</html>

 <?php
	  	}

	  	$succes= 0;

 		if(isset($_POST["cambiar"])){

 			

 			if(isset($_POST['password']) && !empty($_POST['password'])){

 					echo' password esta completo';

	  			//	$succes= $user->setPassword($id,$password);

	  				var_dump($succes);

 			}

 		}
 		if( $succes	== 1 ){

 			echo'su contraseña se cambió exitosamente por $password';

 		}else{

 			echo 'Hubo un error, su contraseña no pudo ser cambiada';
 		}

  		
  }

?>