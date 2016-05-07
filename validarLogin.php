<?php
if(!isset($_SESSION)) {
    session_start();
}

require_once "controller/Usuario.php";

    if(isset($_POST['login'])) {
        if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])){
        $FormPassword= $_POST['password']; 
            $FormPassword= $_POST['password']; 
            $formEmail= trim(mb_strtolower($_POST['email']));
            $emailType= filter_var($formEmail, FILTER_VALIDATE_EMAIL);
            
             if($emailType){
                $user = new Usuario();
                $resultado = $user->getUserCredential($formEmail,$FormPassword);

                 if($resultado){
                         $_SESSION["activeUser"]= $formEmail;

                         if($resultado['habilitado'] == 1){
                             $token = sha1(rand(0,999).rand(999,9999).rand(1,300));
                             $_SESSION['token'] = $token;

                                    $time = new DateTime();
                                    $time->add(new DateInterval('PT' . 1 . 'M'));
                                    $datetime= $time->format('Y-m-d H:i:s');
                                    $_SESSION['expirationDate'] = $time;

                                    if($resultado['nombre'] == "admin") {
                                         $_SESSION["userLevel"] = "admin";
                                        
                                        $userToken= new Usuario();
                                        $tokenSucces= $userToken->updateUsuarioKey($token,$datetime,$formEmail);
                                        if($tokenSucces== 1){
                                            header("Location: bodyForAdmin.php");
                                        }else{echo'Error al crear claves de acceso.';
                                            header('index.php');}
                                         
                                    }else{
                                        $_SESSION["userLevel"] = "user";
                                        $_SESSION["activeUser"]= $formEmail;                
                                        $_SESSION["userId"] = $resultado["id"];
                                        $userToken= new Usuario();
                                        $tokenSucces= $userToken->updateUsuarioKey($token,$datetime,$formEmail);
                                        if($tokenSucces==1){
                                            header("Location: panel.php");
                                        }else{echo'Error al crear claves de acceso.';header('index.php');} 
                                    }
                                      

                         }else{
                             echo '<p>Si hace poco se registró. Espere ser dado de alta. </p>';}
                        
                 }else{echo'Los valores ingresados no son válidos';
                    header("Location: index.php");}
            }else{

                echo'Los valores ingresados no son válidos';}
        }
    }
			
       
?>
