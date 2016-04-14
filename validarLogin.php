<?php
session_start();
require_once "modelo/Conexion.php";
require_once "modelo/Usuario.php";
    if(isset($_POST['login'])) {
        $formEmail= $_POST['email'];
        $FormPassword= $_POST['password'];
        $db = Database::getInstance();
        $mysqli = $db->getConnection(); 

        $user = new Usuario($mysqli);
        $resultado = $user->getUserCredential($formEmail,$FormPassword);

        if($resultado) {
            $_SESSION["activeUser"]= $formEmail;

            if($resultado['nombre'] == "admin") {
                $_SESSION["userLevel"] = "admin";
                header("Location: bodyForAdmin.php");
            } else {
                $_SESSION["userLevel"] = "user";
                header("Location: panel.php");
            }
        } else {
            echo'<script>alert("No existe registro del usuario ingresado.");</script>';
            header("Location: index.php");
        };
    }
?>
