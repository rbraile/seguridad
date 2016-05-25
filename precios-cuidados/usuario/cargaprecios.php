<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Carga de precios</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <script src="/bootstrap/jquery.js"></script>
  <script src="/bootstrap/bootstrap.min.js"></script>
<title>Ingresar Precios</title>
</head>
<body>
 <?php
session_start();
 
$host='localhost';
$user='root';
$pass='mysql';
$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";

$inseltar=mysql_query($sql,$conexion);
/*if(!$inseltar){echo 'Error al crear la base de datos<br />';}
else{echo 'Base de datos creada exitosamente<br />.';}*/
$seleccion_base =mysql_select_db('precioscuidados',$conexion);
/*if($seleccion_base==FALSE){echo 'Error al seleccionar la base<br />.';} 
else{echo 'Base seleccionada exitosamente<br />.';}*/
$consulta= mysql_query("select * from producto",$conexion)   or die ("Fallo en la consulta");
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
      <h3>Carga / Actualizacion de precios</h3>
           <form action= "grabaprecio.php" method="post" class="form-horizontal" autocomplete="off">
            <div class="form-group">
          <label class="control-label col-sm-6" for="email">  Seleccione un producto a cargar / actualizar</label>
           <div class="col-sm-4">
            <?php 
            
            echo '<select name="producto_descripcion">'; 
            while($row = mysql_fetch_assoc($consulta)) 
            { 
            echo '<option value=' . $row["id_producto"] . '-' . $row["descripcion"] . '>' . $row["descripcion"] . '</option>'; 
            } 
            echo '</select>';
            ?>       
    </div>
      </div>  
        <div class="form-group">
          <label class="control-label col-sm-6" for="email">Ingrese el precio</label>
          <div class="col-sm-2">
           <input type="text"  name="valor" value=""/> 
          </div>
      </div>
       <div class="form-group">
          <label class="control-label col-sm-6" for="email">N&uacute;mero de empleado</label>
          <div class="col-sm-2">
            <input type="text"  name="id_empleado" value=""/> 
          </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4">
         <input type="submit" class="btn btn-info" value="Ingresar" />
       </div>
       <div class="col-sm-4">
          <input type="reset" class="btn btn-info" name="limpiar" value="Reset" />
        </div>
     
       </div>

       <div class="col-sm-4">
       </div>
          </form>
     </div>
   </div>
<form action= "indexUsuario.php" method="post"><br>
<input type="submit" value="Volver al Inicio" class="btn btn-danger" class="boton"/>
</form>	

</body>
</html>


