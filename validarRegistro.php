<?php

	
	require_once "modelo/Conexion.php";

	$succes= false;

						
	if(isset($_POST['registrar'])){

						
		if(isset($_POST['nombre']) && !empty($_POST['nombre'])){

						

			if(isset($_POST['email']) && !empty($_POST['email'])){

						
				

				if(isset($_POST['password']) && !empty($_POST['password'])){
						
					

						$formNombre= $_POST['nombre'];
						$formEmail= $_POST['email'];
						$formPassword= $_POST['password'];
						
						$query = "INSERT INTO  usuario (id_usuario, nombre, email, password,habilitado) VALUES (NULL, '$formNombre','$formEmail',$formPassword,'false') ";
						
						$insertar= $conexion->query($query);

						if($insertar){

							$succes = true;

							echo'<script>alert("Ingreso exitoso.Espere a ser habilitado.");</script>';

						
							
						}
				}
			}
		}

	}
	if(!$succes){

		echo 'error al crearse el usuario. Intente más tarde';
	}


$conexion->close();
?>