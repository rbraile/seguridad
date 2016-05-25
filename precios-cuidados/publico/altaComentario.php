<?php
session_start();
$host='localhost';
$user='root';
$pass='mysql';

$comentario = $_POST['comentario'];
$usuario_publico = 0;
$semana= date("W");

$conexion=mysql_connect($host,$user,$pass);
$sql="CREATE DATABASE IF NOT EXISTS precioscuidados";
$inseltar=mysql_query($sql,$conexion);//crea la base
$seleccion_base =mysql_select_db('precioscuidados',$conexion);//selecciona la base
$query 	= "INSERT INTO comentarios (id_comentarista,semana,texto) VALUES ('$usuario_publico','$semana','$comentario')";
$consulta = mysql_query($query, $conexion);
header("location:visualizacionPublicaSemanal.php");
?>




             
