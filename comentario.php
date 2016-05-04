<?php 
session_start();
require_once("controller/Comentario.php");

if(isset($_POST["comentar"])){
	$userId = 0;
	if(isset($_SESSION["userId"])){
		$userId = $_SESSION["userId"];
	}

	$_POST["comentario"];
	$comentario = new Comentario();
	$comentario->addComentario($_POST["comentario"],$userId);
	header("Location: index.php");

}