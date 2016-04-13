
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
		
		<div class="container">
			<div class="row centered">
				<div class="jumbotron col-md-6">		
			        <h2 class="text-center">Ingreso</h2>
					<form action="validarLogin.php" method="POST">
						<div class="form-group">   
						   <label>Email:</label>
					    	 <input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
						    <label>Contraseña</label>
						    <input type="password" class="form-control" name="password"  placeholder="Contraseña" required>
						</div>						 
						<button type="submit" name="login" class="btn btn-default">Aceptar</button>
						<p class="help-block">Si aún no eres usuario Ingresa <span><a href="registro.php">Aquí</a><span></p>
					</form>
		
				</div>
			</div>
		
		</div>
		
	</body>

</html>