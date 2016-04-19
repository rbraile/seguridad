<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
        <link href="css/cssApp.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/funciones.js"></script>
        <title>Historial semanal de precios</title>
    </head>
    <body>
        <?php
            include('validarLogin.php');
            require_once "modelo/UsuarioDao.php";  


            if (isset($_SESSION["activeUser"])){ 

                        $email = $_SESSION["activeUser"];

                        $user= new UsuarioDao();

                        $activeUser = $user->getUserForEmail($email);

                        $id= $activeUser["id_usuario"];      
                ?>
        <div class="container">
            <?php include("nav.php");?>
            <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Productos</div>
                   <!-- Table -->
                   <p>Aquí usted puede editar los precios y visualizarlos haciendo click al botón Editar</p>
                    <?php 
                        include('controller/Precio.php');
                        include('controller/Semana.php');
                        $semana = new Semana();
                        $semanaObj = $semana->getCurrentSemana();
                        $precio = new Precio();
                        $precios = $precio->getPrecios($semanaObj["id"]);
                    ?>
                    <table class="table">
                        <?php //foreach ($precios as $key => $value) {?>
                           <!--  <tr>
                                <td><?php echo $value["id_usuario"];?></td>
                                <td><?php echo $value["precio"];?></td>
                                
                            </tr> -->
                    
                        <?php //}?>
                    </table>

                  <table class="table">
                    <?php
                        include('controller/Producto.php');
                        $producto = New Producto();
                        $productos = $producto->getProductos();

                        foreach ($productos as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                    <?php print_r($value["id"]); ?>
                                </td>
                                <td>
                                
                                    <?php print_r($value["nombre"]); ?>
                                </td>
                                <td><a class="btn btn-default navbar-btn btn-success" href="editar-precio.php?idProducto=<?php echo $value["id"];?>" class="edit-precio">editar</a></td>
                               <!--  <td>
                                    <form action="guardarPrecio.php" method="POST">
                                        <input type="hidden" name="idProducto" value="<?php echo $value["id"];?>">
                                        <input type="text" name="precio" />
                                        <input type="hidden" name="idSemana" value="<?php echo $idSemana['id']; ?>" />
                                        <input type="submit" name="enviar" value="Eniar precio" />
                                    </form>
                                </td> -->
                            </tr>
                        <?php
                        }

                    ?>  
                  </table>
                </div>
        </div>

        
        <?php

                
            }else{

                header("Location: index.php");
            }
        ?>
        
    </body>

</html>