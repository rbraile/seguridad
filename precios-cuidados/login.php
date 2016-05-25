<html>
<head>
	<title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <script src="/bootstrap/jquery.js"></script>
  <script src="/bootstrap/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
	<div class="row">
 		 <div class="col-sm-4">
 		 </div>
  		<div class="col-sm-4">
  				<div class="container">
		<h1>Precios cuidados</h1>
		<div class="row">
				  <div class="col-sm-5">
				  	<form action= "publico/indexPublico.php" method="post">
				  	<input type="submit" class="btn btn-warning btn-block" value="Ingreso como invitado" class="boton"/>
				  </form>
				  </div>
		</div>

		<form action= "filtro.php" method="post" class="form-horizontal" autocomplete="off">
			<div class="form-group">
		      <label class="control-label col-sm-2" for="email">email usuario</label>
		      <div class="col-sm-2">
		       <input type="text" id="campo" name="email" value="" class="input"/>
		      </div>
			</div>
			<div class="form-group">
		      <label class="control-label col-sm-2" for="email">Contrase&ntilde;a</label>
		      <div class="col-sm-2">
				<input type="password" name="contrasenia" value="" class="input"/>
		      </div>
			</div>		
			<div class="row">
				  <div class="col-sm-2">
				  	<input type="submit" class="btn btn-info" value="Ingresar" class="boton"/>
				  </div>
				  <div class="col-sm-2">
				  	<input type="reset"  class="btn btn-info" name="limpiar" value="Limpiar" class="boton"/>
				  </div>
				  <div class="col-sm-4">
				  	<form action= "logoutb.php" method="post">
						<input type="submit" class="btn btn-danger" value="Salir" class="boton"/>
					</form>	
					  </div>
				</div>
			</form>
		</div>
  		</div>
  		<div class="col-sm-4">
  		</div>
	</div>
</div>

</body>
</html>
	