<?php
	require_once "validarLogin.php";
	require_once "modelo/Conexion.php";
	require_once "modelo/Usuario.php";
	require_once "usuariosModificables.php";

	if( $_SESSION["userLevel"] == "admin"){


		$id = $_GET['ID'];

		$user= new  Usuario();

		$userEditable = $user->getUsuarioModificable($id);

		if($userEditable != null){

	?>	
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
					    	 <input type="email" class="form-control"  value="<?php echo $userEditable["email"]; ?> " name="email" required>
						</div>
						
									 
						<button type="submit" name="editar" class="btn btn-default">Editar</button>
						
					</form>
				</div>
			</div>
		</div>


	<?php

		if(isset($_POST['editar'])){

			if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['email']) && !empty($_POST['email'])){

				$formNombre= $_POST['nombre'];

				$formEmail= $_POST['email'];

				$action = $user->setUsuario($id,$formNombre,$formEmail);

				if($action != null){

					header("Refresh:0 ; url=usuariosModificables.php" );

				}else{

					echo('error al intentar cambiar los datos');
				}


			}

		}
		}else{ echo 'Error al intentar Editar el usuario. Intente más tarde';}

		



	}else{

		header("Location:index.php");
	}

?>