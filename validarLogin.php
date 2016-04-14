<?php
	session_start();


		include ("conexion.php");

		if(isset($_POST['login'])){

			$formEmail= $_POST['email'];
			$FormPassword= $_POST['password'];
			
			$pedido= $conexion->query("SELECT * FROM usuario WHERE email='$formEmail' AND password='$FormPassword' ");

			echo '<script>alert($pedido);</script>';


			$resultado = mysqli_fetch_array($pedido);

			
			if($resultado){

				
				$_SESSION["activeUser"]= $formEmail;

				if($resultado['habilitado'] == 1){

					if($resultado['nombre'] == "admin"){

						header("Location:bodyForAdmin.php");


					}else{
						header("Location:panel.php");
					}

				}else{

					echo '<p>Aún no ha sido habilitado.Intente otro día.</p>';
					//header("Location: index.php"); "esta comentado para que se vea el texto de respuesta. pero la idea es que redireccione"
				}

			

			}else{

				echo'<p>No existe registro del usuario ingresado.</p>';

				//header("Location: index.php");"esta comentado para que se vea el texto de respuesta. pero la idea es que redireccione"
				/*echo'<script>window.location="index.php";</script>';*/
			};
		}
?>
