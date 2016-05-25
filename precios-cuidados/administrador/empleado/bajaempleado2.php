<?php
    session_start();
    if(!$_SESSION['id']) {
        header("location: /login.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Confirmacion de Baja</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  	<script src="/bootstrap/jquery.js"></script>
  	<script src="/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<?php

if($_SESSION['log']!=1)
header("location:login.php");	
$host='localhost';
$user='root';
$pass='mysql';
$id_empleado = $_POST['id_empleado'];
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
else{echo 'Base de datos creada exitosamente<br />.';}*/
$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE)
{echo 'Error al seleccionar la base<br />.';} 
else{echo 'Base seleccionada exitosamente<br />.';}*/
$consulta= mysql_query("select * from empleado WHERE id_empleado = $id_empleado",$conexion) or die("Error en: " . mysql_error());
while($fila=mysql_fetch_array($consulta))
				{	
				$nom=$fila ['nombre'];
				$ape=$fila ['apellido'];	
				}	
?>
<div class="container-fluid">

  <div class="row">
     <div class="col-sm-4">
     </div>
     <div class="col-sm-4">
      <h3>Baja de Producto</h3>
      <br>
      <form action= "bajaempleadobd.php" method="post" autocomplete="off">
      <input type='hidden' id="id_empleado" name='id_empleado' value="<?php echo $id_empleado;?>" />
      <input type='hidden' id="nombre" name='nombre' value="<?php echo $nom;?>" />
      <input type='hidden' id="apellido" name='apellido' value="<?php echo $ape;?>" />
      	<h4>Realmente desea eliminar este Usuario?</h4>
		<h4>Nombre: <?php echo $nom;?></h4>
		<h4>Apellido: <?php echo $ape;?></h4>
      <input type="submit" class="btn btn-danger" value="Eliminar" />
      </form> 
      <form action= "bajaempleado.php" method="post"><br>
      <input type="submit" value="Buscar Otro Empleado" class="btn btn-info" class="boton"/>
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

