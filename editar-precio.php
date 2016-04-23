<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
        <link href="css/cssApp.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/funciones.js"></script>
        <title>Precio a editar</title>
    </head>
    <body>
        <?php
            if(!isset($_SESSION)) {
                 session_start();
            }

            if (isset($_SESSION["userLevel"]) && $_SESSION["userLevel"] === 'user' ){ ?>
            <div class="container">
                <?php include("nav.php");?>

                <div class="row centered in-top">
                    <div class="col-md-6 ">
                        <div class="panel panel-default">
                                  <!-- Default panel contents -->
                              <div class="panel-heading">Productos disponibles para ponerle precio</div>
                               <!-- Table -->
                                    <?php 

                                    include('controller/Precio.php');
                                    include('controller/Semana.php');
                                    $semana = new Semana();
                                    $idSemana = $semana->getCurrentSemana();
                                    $precio = new Precio();
                                    $poductoPrecio = $precio->getPrecioById($_SESSION["userId"], $_GET["idProducto"], $idSemana["id"]);
                                    // var_dump($idSemana);

                                ?>

                                <div class="row">
                                    <div class="col-md-8 centered in-top">
                                          <table class="table">
                                            <tr>
                                              <td>
                                                <p><?php echo $poductoPrecio["nombre"];?></p>
                                                  <form action="guardar-precio.php" method="POST">
                                                            <div class="form-group centered">
                                                                 <input  class="form-control" type="text" name="precio" value="<?php echo $poductoPrecio['precio'];?>" />
                                                                 <input  class="form-control" type="hidden" name="idSemana" value="<?php echo $idSemana["id"]; ?>" />
                                                                    <?php if(isset($poductoPrecio['precio'])):?>
                                                                <input  class="form-control" type="hidden" name="id" value="<?php echo $poductoPrecio['id']; ?>" />
                                                                <input   class="no-margin  btn btn-default " type="submit" name="editPrecio" value="Enviar precio" />
                                                                 <?php else:?>
                                                                <input  class="form-control" type="hidden" name="idProducto" value="<?php echo $_GET["idProducto"]; ?>" />
                                                                <input class="no-margin btn btn-default "  type="submit" name="addPrecio" value="Enviar precio" />
                                                                <?php endif;?>
                                                            </div>
                                                           
                                                   
                                                  </form>
                                              </td>
                                            </tr>
                                         </table>
                                    </div>
                                </div>
                              
                                <a class="btn btn-default btn-primary navbar-btn" href="/panel.php">Volver</a>
                         </div>

                    </div>
                </div>
                
        </div>
        <?php
            } else {
                header("Location: index.php");
            }
        ?>
    </body>
</html>