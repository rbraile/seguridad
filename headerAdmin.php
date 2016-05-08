<?php
    $data = $_SESSION["activeUser"];
    $user = new Usuario();
    $pedido= $user->getUserByEmail($data);
    $id= $pedido["id_usuario"];
?>
<ul class="nav nav-pills fixed-top">
    <li>
        <a href="/index.php">INICIO</a>
    </li>
    <li role="presentation" class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
     USUARIOS <span class="caret"></span>
         </a>
         <ul class="dropdown-menu">
            <li><a  href="listarUsuariosHabilitables.php">Alta</a> </li>
            <li><a href="listarUsuariosBaja.php">Baja</a> </li>
            <li><a href="usuariosModificables.php">Modificación</a> </li>

        </ul>
    </li>
    
    <li role="presentation" class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
         PRODUCTOS <span class="caret"></span>
         </a>
         <ul class="dropdown-menu">
            <li><a href="/productos.php">Alta</a> </li>
            <li><a href="/productos-lista.php">Baja y Modificación</a> </li>

        </ul>
    </li>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php

              echo''.$data.'';?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <li><?php echo '<a href="editarContrasenia.php?is='.base64_encode($id).'">Editar Contraseña</a> '?></li>
                    <li role="separator" class="divider"></li>
                    <li><?php echo "<a href='cerrar_sesion.php'> Salir</a> "?></li>
              </ul>
        </li>
    </ul>
</ul>