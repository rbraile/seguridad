<?php
    session_start();
    if(!$_SESSION['id']) {
        header("location: /login.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Confirmacion del Alta</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  	<script src="/bootstrap/jquery.js"></script>
  	<script src="/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<?php

$host='localhost';
$user='root';
$pass='mysql';

$descripcion = $_POST['descripcion'];

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
$query 	= "SELECT * FROM precios WHERE descripcion = '$descripcion'"; //busca el producto en la tabla
$consulta = mysql_query($query, $conexion);
$cant = mysql_num_rows($consulta); 
//$fila = mysql_fetch_array($consulta);	
?>
<div class="container-fluid">

    	<div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <h3>Confirmaci&oacute;n de producto ingresado</h3>
          <br>
          <div class="form-group">
             <?php
             if ($cant != 0) 
				{ //YA EXISTE
					 echo '<div class="alert alert-warning">¡ Error : producto repetido !</div>';
					//header("location:altacliente.php"); 
				}
				else
				{
					$query_cambia = "INSERT INTO producto VALUES ('','$descripcion')";
					$consulta_cambia = mysql_query($query_cambia, $conexion);
							
					if(!$consulta_cambia)
					{
						 echo '<div class="alert alert-warning">¡ Ingreso fallido !</div>';
					}
					else
					{
						echo"<br>"; 
						echo'<h4>Producto : ' . $descripcion . ' </h4>';
					//header("location:cargaprecios.php");
					}
				}
             ?>
           </div>
           <br>
        </div>
        <div class="col-sm-4">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <input type="submit" class="btn btn-info" value="Cargar otro producto" onClick="location.href = 'altaproducto.php' ">
          <input type="submit" class="btn btn-danger" value="Volver al index" onClick="location.href = '../indexAdministrador.php' ">
        </div>
        <div class="col-sm-4">
        </div>
      </div>
    </div>
</body>
</html>


