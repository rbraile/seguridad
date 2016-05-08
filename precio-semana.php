<?php
    $idSemana = $_GET["idSemana"];


    if (!is_numeric( $idSemana)){


        echo "<script>window.location='index.php';</script>";

    }

    include('controller/Precio.php');
    $precio = new Precio();
    $precios = $precio->getPreciosHistorial($idSemana);   
?>
    <table class="table">
        <?php if($precios != 0): ?>
            <tr>
                <td>Producto</td>
                <td>Maximo</td>
                <td>Minimo</td>
                <td>promedio</td>
            </tr>
            <?php foreach ($precios as $key => $value) {?>
                <tr>
                    <td><strong><?php echo $key;?></strong></td>
                    <td><?php echo $value['maximo'];?></td>
                    <td><?php echo $value['minimo'];?></td>
                    <td><?php echo ($value['sumaTotal']/$value['contador']);?></td>
                    
                </tr>
        
            <?php }?>
        <?php else:?>
            <h1>No hay resultados para mostrar</h1>
        <?php endif;?>
    </table>



