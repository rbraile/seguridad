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
			//include('altaUsuario.php');

			if (isset($_SESSION["activeUser"]))
			{ 

				$data = $_SESSION["activeUser"];

				$user = new UsuarioDao();

				$pedido= $user->getUserForEmail($data);

				$id= $pedido["id_usuario"];
		?>

				<div class="container">
					<ul class="nav nav-pills fixed-top">
						<li role="presentation" class="dropdown">
		   					 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		     			 USUARIOS <span class="caret"></span>
		     			 	 </a>
		   					 <ul class="dropdown-menu">
		   					 	<li><a  href="listarUsuariosHabilitables.php">Alta</a> </li>
		   					 	<li><a href="listarUsuariosBaja.php">Baja</a> </li>
		   					 	<li><a href="usuariosModificables.php">Modificación</a> </li>
		      
		    				</ul>
		  				</li>
		  				
						<li role="presentation" class="dropdown">
			   				 <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
			     			 PRODUCTOS <span class="caret"></span>
			     		 	 </a>
			   				 <ul class="dropdown-menu">
			   				 	<li><a href="#">Alta</a> </li>
			   				 	<li><a href="#">Baja</a> </li>
			   				 	<li><a href="#">Modificación</a> </li>
			      
			    			</ul>
			  			</li>
		  				<ul class="nav navbar-nav navbar-right">
					        <li class="dropdown">
						          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nombre Usuario  <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						          		 <li><?php echo '<a href="editarContrasenia.php?ID='.$id.'">Editar Contraseña</a> '?></li>
							             <li role="separator" class="divider"></li>
							            <li><?php echo "<a href='cerrar_sesion.php'> Salir</a> "?></li>
						          </ul>
					        </li>
		      			</ul>
					</ul>
				</div>
	

		
		<?php

				
			}
			else
			{
				header("Location: index.php");
			}
		?>
		
	</body>

</html>