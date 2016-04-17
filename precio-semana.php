<?php
    $idSemana = $_GET["idSemana"];

    include('controller/Precio.php');
    $precio = new Precio();
    $precios = $precio->getPreciosHistorial($idSemana);   
?>
    <table class="table">
        <?php if($precios != 0): ?>
            <?php foreach ($precios as $key => $value) {?>
                <tr>
                    <td>Producto</td>
                    <td>Maximo</td>
                    <td>Minimo</td>
                    <td>promedio</td>
                </tr>
                <tr>
                    <td><?php echo $key;?></td>
                    <td><?php echo $value['maximo'];?></td>
                    <td><?php echo $value['minimo'];?></td>
                    <td><?php echo ($value['sumaTotal']/$value['contador']);?></td>
                    
                </tr>
        
            <?php }?>
        <?php else:?>
            <h1>No hay resultados para mostrar</h1>
        <?php endif;?>
    </table>



