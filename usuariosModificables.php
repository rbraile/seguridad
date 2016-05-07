<?php
    include('validarLogin.php');
    require_once "controller/Usuario.php";
    require_once "credentials/userCredentialsCheck.php";
  
    $data= $_SESSION["activeUser"];
if (checkCredentials('admin',$data)){
?>
<!DOCTYPE>
<html lang="en">
    <?php include("head-admin.php");?>
    <body>

        <?php
          

            $data = $_SESSION["activeUser"];
            $user = new Usuario();
            $pedido= $user->getUserByEmail($data);
            $id= $pedido["id_usuario"];
        ?>
            <div class="container">
                <?php include("headerAdmin.php");?>
            </div>
           <?php if(isset($_POST['editar'])){

                if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['email']) && !empty($_POST['email'])){
                    require_once "validarString.php";
                   
                    $formNombre= trim(mb_strtolower($_POST['nombre'])); 
                    $formEmail= trim(mb_strtolower($_POST['email'])); 
                    $id= $_POST['id']; 
                    $stringType= stringValido($formNombre);
                    $emailType= filter_var($formEmail, FILTER_VALIDATE_EMAIL); 
                    $userDb= new Usuario();
                    $pedido= $userDb->getUserByEmail($formEmail);
                    if($pedido == 1){
                        echo'Error: Ese mail lo posee otro usuario';
                        echo "<script>window.location='usuariosModificables.php';</script>";
                    }else{
                        $action= 0;
                        if($stringType && $emailType){

                            $action = $user->updateUsuario($id,$formNombre,$formEmail);
                        }else{

                            echo'Error: valores ingresados inválidos.';
                        }
                        if($action == 1){
                        
                            echo "<script>window.location='usuariosModificables.php';</script>";
                        } else{
                            echo('Error al intentar cambiar los datos');
                            echo '<a  class="btn btn-default"  name="atras" href="usuariosModificables.php">Atrás</a>';
                        }
                    }
                }
            } else {
            ?>

            <div class="container">
                <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading"><h3 class="text-center">Usuarios</h3></div>
                       <!-- Table -->
                       <table class="table">
                        <tr>
                           
                            <td>nombre</td>
                            <td>email</td>
                            <td>habilitado</td>
                            <td>Acción</td>
                        </tr>
                        <tr>
                            <?php

                                $listaUsuarios = $user->getUsersDeletables();
                                foreach ($listaUsuarios as $usuario) {
                                    echo'<tr>';
                                 
                                    echo'<td> '.$usuario["nombre"].'  </td>';
                                    echo'<td> '.$usuario["email"].'  </td>';
                                    echo'<td> '.$usuario["habilitado"].'  </td>';
                                    echo'<td>' . '<a class="btn btn-default userToEdit" data-id="' . $usuario["id"] . '" href="#">Modificar</a></td>';
                                    echo'</tr>';
                                ?>
                                <tr class="userEdit-<?php echo $usuario["id"];?> hide">
                                    <form action="" name="formModificar" method="POST">
                                    <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label>Nombre:</label>
                                                <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" name="nombre" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">   
                                                <label>Email:</label>
                                                <input type="text" class="form-control" value="<?php echo $usuario["email"]; ?>" name="email" required>
                                                <input type="hidden" name="id" value="<?php echo $usuario["id"];?>">
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <button type="submit" name="editar" class="btn btn-default">Editar</button>
                                        </td>
                                    </form>
                                <tr>
                            <?php }?>
                            </tr>     
                          </table>
                        </div>
                </div>
        <?php   
            }
        } else {
            echo "<script>window.location='index.php';</script>";
        }
        ?>
    </body>

</html>