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
            require_once "validarString.php";
            include('controller/Usuario.php');
            require_once "credentials/userCredentialsCheck.php";
  
            $data= $_SESSION["activeUser"];
            if (checkCredentials('admin',$data)){
                
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
                <div class="row centered">
                   <div class="col-md-6"> 
                     <div class="panel panel-default">
                    <?php if(isset($_GET["idProducto"])) {
                        $productoById = $producto->getProductoById($_GET["idProducto"]);
                        ?>
                        <div class="panel-heading"><h3 class="centered">Modificar Producto</h3> </div>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

                            <input type="text" class="form-control" name="nombre" value="<?php echo $productoById[0]['nombre'];?>" />
                            
                            <div class="">
                                 <label class="form-label" for="habilitado">Producto habilitado</label>
                                 <input type="checkbox" name="habilitado" id="habilitado" <?php if($productoById[0]['habilitado'] == 1){ echo 'checked="checked"';}?> />
                                
                            </div>
                           
                            <input type="hidden" value="<?php echo $_GET["idProducto"];?>" name="id">
                            <input type="submit" name="editar" class="btn btn-default" value="Editar" />
                        </form>  
                    <?php } else {?>

                            <div class="panel-heading"><h3>Alta Producto</h3> </div>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                <input type="text" name="nombre" class="form-control"  placeholder="Nombre del producto" />
                                <br />
                                <label for="habilitado">Producto habilitado</label>
                                <input type="checkbox" name="habilitado" id="habilitado" value="1" />
                                <br />
                                <input type="submit" class="btn btn-default centered " name="altaP" value="Guardar" />
                            </form>
                    <?php }?>
                    <?php 
                        

                        if(isset($_POST["altaP"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"])) {

                            $nombre = mb_strtolower($_POST["nombre"]);

                            $productoDb= new ProductoDao();
                            $found= $productoDb->getProductoByName($nombre);

                            $typeString= stringValido($nombre);


                                if($typeString){

                                    if(!$found){
                                         $habilitado = (isset($_POST["habilitado"]))?1:0;
                                         $id = $producto->setProducto($nombre, $habilitado);
                                         echo 'Producto ingresado correctamente';
                                    }else{
                                        echo'El producto ya existe.';
                                    }
                                    
                                }else{ echo 'Ingrese un valor válido';}  
                        }

                        if(isset($_POST["editar"]) && isset($_POST["nombre"]) && !empty($_POST["nombre"])) {

                            $nombre = mb_strtolower($_POST["nombre"]);

                            $productoDb= new ProductoDao();
                            $found= $productoDb->getProductoByName($nombre);

                            $typeString= stringValido($nombre);

                             $habilitado = (isset($_POST["habilitado"]))?1:0;

                                if($typeString){
                                    if(!$found){
                                         $habilitado = (isset($_POST["habilitado"]))?1:0;
                                         $id = $_POST["id"];
                                         $id = $producto->editarProducto($id,$nombre, $habilitado);
                                         echo'Cambio exitoso.';
                                    }else{

                                        if($found && $habilitado == 1 || $habilitado ==0){

                                                $habilitado = (isset($_POST["habilitado"]))?1:0;
                                                 $id = $_POST["id"];
                                                $id = $producto->editarProducto($id,$nombre, $habilitado);
                                                 echo'Cambio exitoso.'; 

                                        }else{ echo'El producto ya existe.';} 

                                        ;}
                                    
                                }else{ echo'Ingrese un valor correcto.'; }
                            
                        }
                    ?>
                    </div>
                </div>   
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