<?php
	
	session_start();

	include("conexion.php");

	$pedido= $conexion->query("SELECT * FROM usuario WHERE email='$formEmail' AND password='$FormPassword' AND habilitado= 0 ");


	$usuario = mysqli_fetch_array($pedido);
?>