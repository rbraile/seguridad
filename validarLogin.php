<?php
	session_start();


		include ("conexion.php");

		if(isset($_POST['login'])){

			$formEmail= $_POST['email'];
			$FormPassword= $_POST['password'];
			
			$pedido= $conexion->query("SELECT * FROM usuario WHERE email='$formEmail' AND contrasenia='$FormPassword' ");




			$resultado = mysqli_fetch_array($pedido);

			echo 'hola';//$resultado;
			
			if($resultado){

				
				$_SESSION["activeUser"]= $formEmail;

				if($resultado['nombre'] == "admin"){

					header("Location:bodyForAdmin.php");


				}else{
					header("Location:panel.php");
				}
				
				
			

			}else{

				echo'<script>alert("No existe registro del usuario ingresado.");</script>';
				header("Location: index.php");
				/*echo'<script>window.location="index.php";</script>';*/
			};
		}
?>
