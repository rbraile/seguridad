<?php 
session_start();
if( (isset($_POST['editPrecio']) || isset($_POST['addPrecio'])) && isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] === 'user') {
    require_once("controller/Precio.php");

    $precio = new Precio();

    if(isset($_POST['editPrecio'])) {
        if(is_numeric($_POST["precio"])){
            if($precio->updatePrecio($_POST["id"],$_POST["precio"]) != 1) {
            echo "el producto no se pudo editar";
            }

        }
        
    }
    if(isset($_POST['addPrecio'])) {
        if(is_numeric($_POST["precio"])){
             if($precio->addPrecio($_POST["idProducto"], $_SESSION["userId"], $_POST["idSemana"], $_POST["precio"]) == 0){
            echo "error al intentar guardar el precio";
             }

        }
       
    }
    header("Location: panel.php");
} else {
    header("Location: index.php");
}