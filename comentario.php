<?php 
session_start();
require_once("controller/Comentario.php");
header('X-Frame-Options: SAMEORIGIN');

if(isset($_POST["comentar"])){
    $userId = 0;
    if(isset($_SESSION["userId"])){
        $userId = $_SESSION["userId"];
    }

    $_POST["comentario"];
    $comentario = new Comentario();
    $comentario->addComentario($_POST["comentario"],$userId);
    header("Location: comentario.php");
} else {
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
                $comentario = new Comentario();
                if(isset($_GET["id"])) {
                    if($_GET["id"] == $_SESSION['userId']) {
                        $id = $_GET["id"];
                        $listaComentario = $comentario->comentarioByUser($id);
                    } else {
                        header("Location: panel.php");
                    }
                } else {
                    $listaComentario = $comentario->AllComentarios();
                }

                if(isset($listaComentario) && $listaComentario){
                    foreach ($listaComentario as $comentario) {
                        echo '<tr>';
                        echo '<td> '.$comentario["id"].' </td>' ;
                        if($comentario["nombre"] !== NULL) {
                            echo '<td> '. $comentario["nombre"] . '  </td>';
                        } else {
                            echo '<td>ANONIMO</td>';
                        }

                        echo '<td> '.$comentario["comentario"].'  </td>';
                        echo '</tr>';
                    }
                } else {
                    echo "no hay comentarios";
                }
                ?>
            </table>
        </div>
    </div>

<?php }?>