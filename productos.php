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
            //include('altaUsuario.php');
            if (isset($_SESSION["activeUser"]))
            { 
                
                include("controller/Producto.php");
                $producto = new Producto();

                if(isset($_GET["deleteProducto"])) {
                    $productoById = $producto->getProductoById($_GET["deleteProducto"]);
                    $result = $producto->deleteProducto($productoById[0]["id"]);
                    header("Location: productos-lista.php");
                } else {



        ?>
                <div class="container">
                    <?php include("headerAdmin.php");?>
                </div>

                <div class="container">
                    <div class="panel panel-default">
                <?php if(isset($_GET["idProducto"])) {
                    $productoById = $producto->getProductoById($_GET["idProducto"]);
                    ?>
                    <div class="panel-heading">Alta de Productos</div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <input type="text" name="nombre" value="<?php echo $productoById[0]['nombre'];?>" />
                        <br />
                        <label for="habilitado">Producto habilitado</label>
                        <input type="checkbox" name="habilitado" id="habilitado" <?php if($productoById[0]['habilitado'] == 1){ echo 'checked="checked"';}?> />
                        <br />
                        <input type="hidden" value="<?php echo $_GET["idProducto"];?>" name="id">
                        <input type="submit" name="editar" value="Editar" />
                    </form>  
                <?php } else {?>

                        <div class="panel-heading">Alta de Productos</div>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type="text" name="nombre" placeholder="Nombre del producto" />
                            <br />
                            <label for="habilitado">Producto habilitado</label>
                            <input type="checkbox" name="habilitado" id="habilitado" value="1" />
                            <br />
                            <input type="submit" name="altaP" value="Guardar" />
                        </form>
                <?php }?>
                <?php 
                    if(isset($_POST["altaP"]) && isset($_POST["nombre"])) {
                        $nombre = $_POST["nombre"];
                        $habilitado = (isset($_POST["habilitado"]))?1:0;
                        $id = $producto->setProducto($nombre, $habilitado);
                    }

                    if(isset($_POST["editar"]) && isset($_POST["nombre"])) {
                        $nombre = $_POST["nombre"];
                        $habilitado = (isset($_POST["habilitado"]))?1:0;
                        $id = $_POST["id"];
                        $id = $producto->editarProducto($id,$nombre, $habilitado);
                        
                        
                    }
                ?>
                    </div>
                </div>

        <?php
            }
                }
                else {
                    header("Location: index.php");
                }
        ?>
        
        
    </body>

</html>