<?php
    session_start();
    if(!$_SESSION['id']) {
        header("location: /login.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Opciones de usuarios</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <script src="/bootstrap/jquery.js"></script>
  <script src="/bootstrap/bootstrap.min.js"></script>
<title>Opciones de usuario</title>
</head>
<body>
<div class="container-fluid">

	<div class="row">
 		 <div class="col-sm-4">
 		 </div>
 		 <div class="col-sm-4">
 		 	<h3>Bienvenido, Administrador!</h3>
 		 	<h3>Seleccione una opción</h3>
 		 	<br>
 		 	<h4>Usuarios</h4>
 		 	<input type="submit" class="btn btn-info" value="Alta" onClick="location.href = 'empleado/altaempleado.php' ">
			<input type="submit" class="btn btn-info" value="Modificacion" onClick="location.href = 'empleado/modificaempleado.php' ">
			<input type="submit" class="btn btn-info" value="Baja" onClick="location.href = 'empleado/bajaempleado.php' ">
			<br>
			<h4>Productos</h4>
 		 	<input type="submit" class="btn btn-info" value="Alta" onClick="location.href = 'producto/altaproducto.php' ">
			<input type="submit" class="btn btn-info" value="Modificacion" onClick="location.href = 'producto/modificaproducto.php' ">
			<input type="submit" class="btn btn-info" value="Baja" onClick="location.href = 'producto/bajaproducto.php' ">
			<br>
			<br><input type="submit" class="btn btn-danger" value="Salir" onClick="location.href = '../logoutb.php' "></br>
 		 </div>
 		 <div class="col-sm-4">
 		 </div>
</div>
</body>
</html>