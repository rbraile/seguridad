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
		<?php header('X-Frame-Options: SAMEORIGIN');?>
		<div class="container">
			<div class="row centered">
			  <div class="jumbotron col-md-6">		
					<form action="validarRegistro.php" method="POST">
						<div class="form-group">
						   <p class="help-block">Registrate para acceder a los productos.</p>
						   <p class="help-block">En unos días el administrador te dará de alta.</p>
						</div>
						<div class="form-group">
							<label>Nombre:</label>
						    <input type="text" class="form-control"  placeholder="Nombre"  name="nombre" autocomplete="off" required >
						</div>
						<div class="form-group">   
							 <label>Email:</label>
					    	 <input type="email" class="form-control"  placeholder="Email" name="email" required>
						</div>
						<div class="form-group">
						   <label>Password</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
						</div>			 
						<button type="submit" name="registrar" class="btn btn-default">Enviar</button>
						<p class="help-block">Si ya eres usuario Ingresa <span><a href="index.php">Aquí</a><span></p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>


