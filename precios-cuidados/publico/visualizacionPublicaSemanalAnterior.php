<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visualización de precios antiguos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <script src="/bootstrap/jquery.js"></script>
  <script src="/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<div class="container">


<?php
session_start();
$host='localhost';
$user='root';
$pass='mysql';
$semana= date("W");

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query  = "SELECT * FROM precios WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);
$query_cosulta = "SELECT descripcion, MAX(valor) maximo, MIN(valor) minimo, AVG(valor) promedio FROM precios WHERE semana = '$semana' GROUP BY descripcion";  //consulta de los productos y sus precios filtrado semana actual
$filtro_semana = mysql_query($query_cosulta, $conexion);
?>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-4">
       </div>

       <div class="col-sm-4">
        <h3>Visualizaci&oacute;n de precios antiguos</h3>
            <form action= "preciosAntiguosPublico.php" method="post" autocomplete="off"><br>
           <div class="form-group">
             <label class="control-label col-sm-16" for="email"> Ingrese semana a consultar (formato SS) </label>
            <div class="col-sm-14">
               <input type="text"  name="semanaConsulta" value=""/> 
             </div>
         </div>
           <div class="col-sm-6">
             <br><input type="submit" class="btn btn-info" value="Consultar" class="boton"/></br>
            </div>
          </form> 
             <div class="col-sm-8">
               <br><input type="submit" class="btn btn-danger" value="Volver" onClick="location.href = 'indexPublico.php' "></br>
              </div>
            </div>
       <div class="col-sm-4">
       </div>
      
    </div>
  </div>
</div>

</body>
</html>