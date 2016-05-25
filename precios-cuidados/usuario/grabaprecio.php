<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Grabar precio</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
  <script src="/bootstrap/jquery.js"></script>
  <script src="/bootstrap/bootstrap.min.js"></script>
</head>
<body>
  <?php
  session_start();
  $host='localhost';
  $user='root';
  $pass='mysql';

  $valor = filter_input(INPUT_POST | INPUT_GET, 'valor', FILTER_SANITIZE_SPECIAL_CHARS);
  $id_empleado = filter_input(INPUT_POST | INPUT_GET, 'id_empleado', FILTER_SANITIZE_SPECIAL_CHARS);

  list($id_producto, $descripcion) = explode("-", $_POST['producto_descripcion'], 2);
  $semana= date("W");



  $conexion=mysql_connect($host,$user,$pass);
  $sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion)or die("Error en: al crear la base");//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
//$query  = "SELECT * FROM precios WHERE descripcion = '$descripcion' and id_empleado = '$id_empleado'"; //busca el producto en la tabla
//$consulta = mysql_query($query, $conexion);

$query_existe="SELECT * FROM precios WHERE semana=$semana AND id_empleado=$id_empleado and id_producto=$id_producto";
$result_existe = mysql_query($query_existe, $conexion)or die("Error en: " );
$numero = mysql_num_rows($result_existe);
$query_nuevo = "INSERT INTO precios VALUES (NULL , '$id_producto','$id_empleado','$descripcion','$valor','$semana')";
$query_cambia = "UPDATE precios SET valor = '$valor' WHERE semana=$semana AND id_empleado=$id_empleado and id_producto=$id_producto";

if($numero==0)
{

  $consulta_nuevo = mysql_query($query_nuevo, $conexion)or die("Error en la consulta");
}
else
{

  $consulta_cambia = mysql_query($query_cambia, $conexion)or die("Error en la consulta ");
}

/*[if(!$consulta_cambia)
  {
    echo 'Ingreso fallido';
  }
    else
    {
      echo"<br>"; 
      echo 'Precio insertado con exito';
      //header("location:cargaprecios.php");
    }]  */
    ?>
    <div class="container-fluid">

    	<div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <h3>Confirmaci&oacute;n de precio ingresado</h3>
          <br>
          <div class="form-group">
             <?php
             echo'<h4>Producto : ' . $descripcion . ' </h4>';
             echo'<h4>Precio : ' . $valor . ' </h4>'; 
             echo'<h4>Empleado : ' . $id_empleado . '</h4>';
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
          <input type="submit" class="btn btn-info" value="Cargar otro precio" onClick="location.href = 'cargaprecios.php' ">
          <input type="submit" class="btn btn-danger" value="Volver al index" onClick="location.href = 'indexUsuario.php' ">
        </div>
        <div class="col-sm-4">
        </div>
      </div>


    </div>
  </div>
</body>
</html>
