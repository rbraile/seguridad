<?php
if(!isset($_SESSION)) {
    session_start();
}


require_once "modelo/UsuarioDao.php";

    if(isset($_POST['login'])) {

        $formEmail= $_POST['email'];

        $FormPassword= $_POST['password']; 


        $user = new UsuarioDao();
        $resultado = $user->getUserCredential($formEmail,$FormPassword);

        echo 'seession: '.$_SESSION;
			
        if($resultado) {

            $_SESSION["activeUser"]= $formEmail;

				if($resultado['habilitado'] == 1){

            if($resultado['nombre'] == "admin") {

                $_SESSION["userLevel"] = "admin";


                header("Location: bodyForAdmin.php");

            } else {

                $_SESSION["userLevel"] = "user";
                
                $_SESSION["userId"] = $resultado[0]["id_usuario"];
                header("Location: panel.php");
            }
				}else{

					echo '<p>Aún no ha sido habilitado.Intente otro día.</p>';
					//header("Location: index.php"); "esta comentado para que se vea el texto de respuesta. pero la idea es que redireccione"
				}
        } else {
            echo'<script>alert("No existe registro del usuario ingresado.");</script>';
            header("Location: index.php");
				//header("Location: index.php");"esta comentado para que se vea el texto de respuesta. pero la idea es que redireccione"
        };
    }
?>
