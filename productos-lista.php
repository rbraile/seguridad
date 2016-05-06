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
            include('controller/Usuario.php');
            require_once "credentials/userCredentialsCheck.php";
  
            $data= $_SESSION["activeUser"];
            if (checkCredentials('admin',$data)){
                include("controller/Producto.php");
                $Producto = new Producto();
                $productos = $Producto->getProductos(); 

        ?>
                <div class="container">
                    <?php include("headerAdmin.php");?>
                </div>

                <div class="container">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="text-center">Listado de Productos</h3> </div>
                        <ul class="list-group">
                            <?php foreach ($productos as $key => $value) { ?>
                            <li class="list-group-item">
                                <span><?php echo $value['nombre'];?></span>
                                <a class="btn btn-default navbar-btn btn-success" href="/productos.php?idProducto=<?php echo $value['id']?>">Editar</a>
                                <a class="btn btn-default navbar-btn btn-danger" href="/productos.php?deleteProducto=<?php echo $value['id']?>">Borrar</a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
        <?php }
            else {
                header("Location: index.php");
            }
            ?>
    </body>
</html>