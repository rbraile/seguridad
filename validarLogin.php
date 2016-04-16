<?php
session_start();

require_once "modelo/UsuarioDao.php";
    if(isset($_POST['login'])) {
        $formEmail= $_POST['email'];
        $FormPassword= $_POST['password']; 

        $user = new UsuarioDao();
        $resultado = $user->getUserCredential($formEmail,$FormPassword);

        if($resultado) {
            $_SESSION["activeUser"]= $formEmail;

            if($resultado['nombre'] == "admin") {
                $_SESSION["userLevel"] = "admin";
                header("Location: bodyForAdmin.php");
            } else {
                $_SESSION["userLevel"] = "user";
                $_SESSION["userId"] = $resultado[0]["id_usuario"];
                header("Location: panel.php");
            }
        } else {
            echo'<script>alert("No existe registro del usuario ingresado.");</script>';
            header("Location: index.php");
        };
    }
?>
