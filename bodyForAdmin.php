<!DOCTYPE>
<html lang="en">
	<head>
		<?php include("head-admin.php");?>
		<title>Historial semanal de precios</title>
	</head>
	<body>
		<?php
			include('validarLogin.php');
			include('controller/Usuario.php');

			if (isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] == "admin")
			{ 

				$data = $_SESSION["activeUser"];

				$user = new Usuario();

				$pedido= $user->getUserByEmail($data);

				$id= $pedido["id_usuario"];
		?>
				<div class="container">
				    <?php include("headerAdmin.php");?>
                </div>
		<?php
			}
			else {
				header("Location: index.php");
			}
		?>
		
	</body>

</html>