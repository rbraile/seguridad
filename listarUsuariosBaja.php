<?php
    require_once "modelo/Conexion.php";
    require_once "validarLogin.php";
    require_once "controller/Usuario.php";
    require_once"credentials/userCredentialsCheck.php";

if(isset($_GET['current'])){
    $value = $_GET['current'];
    $id= base64_decode($value);
    $user= new UsuarioDao();
    $wasDeleted= $user->setFielEnable($id);

    if($wasDeleted == 1){
        echo "<script>window.location='listarUsuariosBaja.php';</script>";
    }else{
        echo'Error al borrar. Intente más tarde.';
    }
} else {
?>
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
			
			$data=$_SESSION["activeUser"];
			if (checkCredentials('admin',$data)){ 
                $user = new Usuario();
                $listaUsuarios = $user->getUsersDeletables();
				?>

				<div class="container">
				    <?php include("headerAdmin.php");?>
                </div>
		<div class="container">
			<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading"><h3 class="text-center">Usuarios</h3></div>
				   <!-- Table -->
				   
				   <table class="table">
				   	<tr>
				  		<td>id</td>
				  		<td>nombre</td>
				  		<td>email</td>
				  		<td>habilitado</td>
				  		<td>Acción</td>
				  	</tr>
				  	<tr>
					<?php
						if(isset($listaUsuarios)){
							foreach ($listaUsuarios as $usuario) {
							echo'<tr>';
							echo'<td> '.$usuario["id"].' </td>';
							echo'<td> '.$usuario["nombre"].'  </td>';
							echo'<td> '.$usuario["email"].'  </td>';
							echo'<td> '.$usuario["habilitado"].'  </td>';
							echo'<td>' . '<a  class="btn btn-default" name="darBaja" href="listarUsuariosBaja.php?current='.base64_encode($usuario["id"]).'">Eliminar</a>'.'</td>';
							echo'</tr>';	
						}
					}
					?>
					</tr>	   
				  </table>
				</div>
		</div>
		<?php
			}else{
				header("Location: index.php");
			}
		?>
<?php }//else?>
	</body>

</html>