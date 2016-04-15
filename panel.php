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

            if (isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] === 'user' ){ ?>
                
                <div class="container">
                </div>
        <div class="container">
            <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Productos disponibles para ponerle precio</div>
                   <!-- Table -->
                   <p>formar la tabla en base a lo que se muestra. datos y cantidad de columnas</p>
                    <?php 
                        include('controller/Precio.php');
                        include('controller/Semana.php');
                        $semana = new Semana();
                        $idSemana = $semana->getCurrentSemana();
                        $precio = new Precio();
                        $precios = $precio->getPrecios($idSemana["id"]);
                    ?>


                    <table class="table">
                        <?php foreach ($precios as $key => $value) {?>
                            <tr>
                                <td><?php echo $value["id_usuario"];?></td>
                                <td><?php echo $value["precio"];?></td>
                                <td><a href="#" data-id="<?php echo $value["id_usuario"];?>" class="edit-precio">editar</a></td>
                            </tr>
                    
                        <?php }?>
                    </table>

                  <table class="table">
                    <?php
                        include('controller/Producto.php');
                        $producto = New Producto();
                        $productos = $producto->getProductos($idSemana["id"]);

                        foreach ($productos as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                    <?php print_r($value["id"]); ?>
                                </td>
                                <td>
                                    <?php print_r($value["nombre"]); ?>
                                </td>
                                <td>
                                <form action="guardarPrecio.php" method="POST">
                                    <input type="hidden" name="idProducto" value="<?php echo $value["id"];?>">
                                    <input type="text" name="precio" />
                                    <input type="hidden" name="idSemana" value="<?php echo $idSemana['id']; ?>" />
                                    <input type="submit" name="enviar" value="Eniar precio" />
                                </form>
                                </td>
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