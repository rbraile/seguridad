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
            include('controller/Precio.php');
            include('controller/Semana.php');
        ?>

        <div class="container">
            <div class="row centered">
                <div class="jumbotron col-md-6">        
                    <h2 class="text-center">Ingreso</h2>
                    <form action="validarLogin.php" method="POST">
                        <div class="form-group">   
                           <label>Email:</label>
                             <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="password"  placeholder="Contraseña" required>
                        </div>                       
                        <button type="submit" name="login" class="btn btn-default">Aceptar</button>
                        <p class="help-block">Si aún no eres usuario Ingresa <span><a href="registro.php">Aquí</a><span></p>
                    </form>
                </div>
            </div>      
        </div>
        <?php 
            $semana = new Semana();
            $semanaCurrent = $semana->getCurrentSemana();
            $semanas = $semana->getAllSemanas();

        ?>
        <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Semanas anteriores del historial de precios del <?php echo $semanaCurrent['fecha_ini'] ?> al <?php echo $semanaCurrent['fecha_fin'] ?></div>
                <ul class="list-group">
                    <?php foreach ($semanas as $key => $value) {?>
                        <?php if($value["id"] != $semanaCurrent["id"]):?>
                            <li class="list-group-item"><a href="/precio-semana.php?idSemana=<?php echo $value["id"];?>"><?php echo $value["fecha_ini"] . " - " . $value["fecha_fin"];?></a></li>
                        <?php endif;?>
                    <?php }?>
                </ul>
            </div>
        </div>

        <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Precios de semanas actual</div>
                <?php
                    $idSemana = $semanaCurrent["id"];

                    $precio = new Precio();
                    $precios = $precio->getPreciosHistorial($idSemana);   
                ?>
                <table class="table">
                    <thead>
                    <?php if($precios != 0): ?>
                        <tr>
                            <th>Producto</th>
                            <th>Maximo</th>
                            <th>Minimo</th>
                            <th>promedio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($precios as $key => $value) {?>
                            <tr>
                                <td><strong><?php echo $key;?></strong></td>
                                <td><?php echo $value['maximo'];?></td>
                                <td><?php echo $value['minimo'];?></td>
                                <td><?php echo ($value['sumaTotal']/$value['contador']);?></td>
                                
                            </tr>
                    
                        <?php }?>
                        </tbody>
                    <?php else:?>
                        <h1>No hay resultados para mostrar</h1>
                    <?php endif;?>
                </table>
            </div>
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Cometarios de la aplicación</div>
                <div class="">
                    <form action="comentario.php" method="POST">
                        <label>Comentario</label>
                        <textarea name="comentario">
                            
                        </textarea>
                        <input type="submit" value="Comentar" name="comentar" />
                    </form>
                </div>
            </div>
        </div>
	</body>
</html>