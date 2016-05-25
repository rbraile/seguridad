<?php
    session_start();
    if(!$_SESSION['id']) {
        header("location: /login.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Alta de Producto</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
 		 	<h3>Alta de Producto</h3>
 		 	<br>
 		 	<form action= "altaproductobd.php" method="post" autocomplete="off">
			Ingrese el producto
			<input type="text" name="descripcion" />
			<input type="submit" class="btn btn-info" value="Guardar" />
			<input type="reset" class="btn btn-info" name="limpiar" value="Reset" />
			</form>	
			<form action= "../indexAdministrador.php" method="post"><br>
			<input type="submit" value="Volver al Inicio" class="btn btn-danger" class="boton"/>
			</form>
 		 </div>
 		 <div class="col-sm-4">
 		 </div>
</div>
</body>
</html>