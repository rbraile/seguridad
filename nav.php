<?php
require_once "modelo/UsuarioDao.php";
	$data = $_SESSION["activeUser"];

                $user = new UsuarioDao();

                $pedido= $user->getUserByEmail($data);

                $id= $pedido["id_usuario"];
?>
<header>
    <nav>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="/index.php">Inicio</a></li>
              
               <ul class="nav navbar-nav navbar-right">

               		 <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php

			              echo''.$data.'';?> <span class="caret"></span></a>
			              <ul class="dropdown-menu">
			                     <li><?php echo '<a href="editarDatosPropios.php?ID='.$id.'">Cuenta</a> '?></li>
			                     <li role="separator" class="divider"></li>
			                    <li><?php echo "<a href='cerrar_sesion.php'> Salir</a> "?></li>
			              </ul>
       		  		</li>
               </ul>
               
            <!-- <li role="presentation"><a href="#">Profile</a></li>
            <li role="presentation"><a href="#">Messages</a></li> -->
        </ul>
    </nav>       
</header>