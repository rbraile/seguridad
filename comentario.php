<?php 
session_start();
require_once("controller/Comentario.php");

if(isset($_POST["comentar"])){
    $userId = 0;
    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"];
    }

    $_POST["comentario"];
    $comentario = new Comentario();
    $comentario->addComentario($_POST["comentario"],$userId);
    ?>
    <div class="container">
    <div class="panel panel-default">
          <!-- Default panel contents -->
           <div class="panel-heading"><h3 class="text-center">Comentarios</h3></div>
           <!-- Table -->
         
            <table class="table">
                <tr>
                    <td>id</td>
                    <td>nombre</td>
                    <td>comentario</td>
                </tr>
            <?php
                $listaComentario = $comentario->AllComentarios();
                if(isset($listaComentario)){
                    foreach ($listaComentario as $comentario) {
                        echo '<tr>';
                        echo '<td> '.$comentario["id"].' </td>';
                        echo '<td> '.$comentario["nombre"].'  </td>';
                        echo '<td> '.$comentario["comentario"].'  </td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </div>
    </div>

<?php }?>