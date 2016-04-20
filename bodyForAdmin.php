<!DOCTYPE>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
		<link href="css/cssApp.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<title>Historial semanal de precios</title>
	</head>
	<body>
		<?php
			include('validarLogin.php');
			//include('altaUsuario.php');

			if (isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] == "admin")
			{ 

				$data = $_SESSION["activeUser"];

				$user = new UsuarioDao();

				$pedido= $user->getUserForEmail($data);

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