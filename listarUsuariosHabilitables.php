<?php
require_once "validarLogin.php";
require_once "credentials/userCredentialsCheck.php";
$data= $_SESSION["activeUser"];
if (checkCredentials('admin',$data)){
	require_once "controller/Usuario.php";
    if(isset($_GET['current'])) {
        $value= $_GET['current'];
        $id= base64_decode($value);
        $user = new Usuario();
        $userInProgress= $user->setUserCredential($id);      
        if($userInProgress == 1){
            echo "<script>window.location='listarUsuariosHabilitables.php';</script>";
        }else{
            echo'Error al intentar habilitarlo.Intente más tarde';
            //header("Refresh:0; url=listarUsuariosHabilitables.php");
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
                        $usuario = new Usuario();
                        $listaUsuarios = $usuario->getUserWithoutCredential();
						if(isset($listaUsuarios)){
                            // var_dump($listaUsuarios);
							foreach ($listaUsuarios as $usuario) {
    							echo'<tr>';
    							echo'<td> '.$usuario["id"].' </td>';
    							echo'<td> '.$usuario["nombre"].'  </td>';
    							echo'<td> '.$usuario["email"].'  </td>';
    							echo'<td> '.$usuario["habilitado"].'  </td>';
    							echo'<td>' . '<a  class="btn btn-default"  name="darAlta" href="listarUsuariosHabilitables.php?current='.base64_encode($usuario["id"]).'">Aceptar</a>'.'</td>';
    							echo'</tr>';
						    }
						}
					?>
					</tr>	   
				  </table>
				</div>
		</div>
		<?php }?>
<?php }else {
    echo $_SESSION["userLevel"];
        header("Location: index.php");
    }?>

	</body>

</html>