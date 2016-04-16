<?php 

if(isset($_POST['enviar'])) {
    require_once("controller/Precio.php");
    require_once("controller/Semana.php");
    session_start();

    $precio = new Precio();

    echo $precio->setPrecio($_POST["idProducto"],$_SESSION["userId"],$_POST["idSemana"],$_POST["precio"]);

}

