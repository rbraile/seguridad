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
			require_once "listarUsuariosModificables.php";


			if (isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] == "admin")
			{ 
				$data = $_SESSION["activeUser"];

				$user = new UsuarioDao();

				$pedido= $user->getUserByEmail($data);

				$id= $pedido["id_usuario"];
		?>

				<div class="container">
				    <?php include("headerAdmin.php");?>
                </div>
				<div class="container">
					<div class="panel panel-default">
						  <!-- Default panel contents -->
						  <div class="panel-heading"><h3 class="text-center">Usuarios</h3></div>
						   <!-- Table -->
						   <table class="table">
						   	<tr>
						  		<td>id</td>
						  		<td>nombre</td>
						  		<td>email</td>
						  		<td>habilitado</td>
						  		<td>Acción</td>
						  	</tr>
						  	<tr>
							<?php

								foreach ($listaUsuarios as $usuario) {
									echo'<tr>';
									echo'<td> '.$usuario["id"].' </td>';
									echo'<td> '.$usuario["nombre"].'  </td>';
									echo'<td> '.$usuario["email"].'  </td>';
									echo'<td> '.$usuario["habilitado"].'  </td>';
									echo'<td>' . '<a  class="btn btn-default" href="modificarUsuario.php?ID='.$usuario["id"].'">Modificar</a>'.'</td>';
									echo'</tr>';
								}

								

							?>
							</tr>	  
						    
						  </table>
						</div>
				</div>

		
		<?php	
			}
			else
			{

				echo "<script>window.location='index.php';</script>";
			}
		?>
		
	</body>

</html>