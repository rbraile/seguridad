<?php

    session_start();
    if(!$_SESSION['id']) {
        header("location: /login.php");
    }

$descripcion = $_POST['descripcion'];
$descripcion2 = $_POST['descripcion2'];

			if ($descripcion == 'producto'){
				if($descripcion2 == 'ingresar')
				{
					
					$_SESSION['log']=1;
					$_SESSION['id'] = $id;
					header("location: altaproducto.php");
				}
				else
				{
					if($descripcion2 == 'modificar')
					{
						
						$_SESSION['log']=1;
						$_SESSION['id'] = $id;
						header("location: modificaproducto.php");
					}
					else
					{
						
						$_SESSION['log']=1;
						$_SESSION['id'] = $id;
						header("location: bajaproducto.php");
					}
				}
				
			}	
			else
			{
			 if($descripcion2 == 'ingresar')
				{
					$_SESSION['log']=1;
					$_SESSION['id'] = $id;
					header("location: altaempleado.php");
				}
				else
				{
					if($descripcion2 == 'modificar')
					{
						$_SESSION['log']=1;
						$_SESSION['id'] = $id;
						header("location: modificaempleado.php");
					}
					else
					{
						$_SESSION['log']=1;
						$_SESSION['id'] = $id;
						header("location: bajaempleado.php");
					}
				}
			}
            			
				
?>