<?php
    session_start();
    if(!$_SESSION['id']) {
        header("location: /login.php");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Modificacion de Empleado</title>
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
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
else{echo 'Base de datos creada exitosamente<br />.';}*/
$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE)
{echo 'Error al seleccionar la base<br />.';} 
else{echo 'Base seleccionada exitosamente<br />.';}*/
$consulta= mysql_query("select * from empleado",$conexion)   or die ("Fallo en la consulta");
 /*if($consulta)
 echo "hola";*/
 /*while($fila = mysql_fetch_array($consulta))
   { echo $fila['descripcion'];
   echo "<br>";}*/
?>   
<div class="container-fluid">

  <div class="row">
     <div class="col-sm-4">
     </div>
     <div class="col-sm-4">
      <h3>Modificacion de Empleado</h3>
      <br>
      <form action= "modificaempleado2.php" method="post" autocomplete="off">

    Seleccione un empleado
         <select  name="id_empleado">  
          <?php    
          while($fila = mysql_fetch_array($consulta))  
          {
              ?>
              <option value ="<?php echo $fila['id_empleado']?>">
              <?php echo $fila['id_empleado'] . "-" . $fila['apellido'] . "," . $fila['nombre'] ?>
              </option>
              <?php
          }    
          ?>       
      </select>
      <br><br>
      <input type="submit" class="btn btn-info" value="Buscar Datos" />
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