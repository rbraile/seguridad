<?php
	require_once "validarLogin.php";
	require_once "modelo/Conexion.php";
	require_once "modelo/UsuarioDao.php";
	require_once "usuariosModificables.php";
	require_once "listarUsuariosModificables.php";
	require_once "validarEmail.php";
	//

	
	if(isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] == "admin"){


		$id = $_GET['ID'];
		
		$user = new usuarioDao();
		$userEditable = $user->getUserForId($id);
		//query buscando el usuario con el id del get

	
		
		if($userEditable != null){

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
						<form action="" name="formModificar" method="POST">
							<div class="form-group">
								<label>Nombre:</label>
							    <input type="text" class="form-control"  value="<?php echo $userEditable["nombre"]; ?> "  name="nombre" required>
							</div>
							<div class="form-group">   
								 <label>Email:</label>
						    	 <input type="text" class="form-control"  value="<?php echo $userEditable["email"]; ?> " name="email" required>
							</div>
							
										 
							<button type="submit" name="editar" class="btn btn-default">Editar</button>
							
						</form>
					</div>
				</div>
			</div>
		</body>
</html>
	<?php
			

		if(isset($_POST['editar'])){

			if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['email']) && !empty($_POST['email'])){

				$formNombre= mb_strtolower($_POST['nombre']);
				$formEmail= mb_strtolower($_POST['email']);
				$password= $userEditable["password"];

				$stringType= stringValido($formNombre);
				$emailType= verificarEmail($formEmail); 

				$userDb= new UsuarioDao();
				$pedido= $userDb->getUserForEmail($formEmail);
				if($pedido == 1){

					echo'Error: Ese mail lo posee otro usuario';
					echo "<script>window.location='usuariosModificables.php';</script>";
				}else{
					$action= 0;
					if($stringType && $emailType){

						$action = $user->updateUsuario($id,$formNombre,$formEmail,$password);
					}else{

						echo'Error: valores ingresados inválidos.';
					}
					if($action == 1){
					
						echo "<script>window.location='usuariosModificables.php';</script>";
					} else{
						echo('Error al intentar cambiar los datos');
					}

				}

				
			}

		}
		


	}
}else{

	//header("Location:index.php");
}

?>