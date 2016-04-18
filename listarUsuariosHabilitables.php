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

			require_once "validarLogin.php";
			require_once "altaUsuario.php";

			

			if (isset($_SESSION["activeUser"])){ ?>

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
							            <li><a href="#">Editar contraseña </a></li>
							            <li role="separator" class="divider"></li>
							            <li><?php echo "<a href='cerrar_sesion.php'> Salir</a> "?></li>
							            
						          </ul>
					        </li>
		      			</ul>
					</ul>
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
							echo'<td>' . '<a  class="btn btn-default"  name="darAlta" href="habilitarUsuario.php?ID='.$usuario["id"].'">Aceptar</a>'.'</td>';
							echo'</tr>';
						}

						

					?>
					</tr>	   
				  
				  	

				    
				  </table>
				</div>
		</div>

		
		<?php

				
			}else{

				header("Location: index.php");
			}
		?>
		
	</body>

</html>