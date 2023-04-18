<?php

include '../main.php';

if(isset($_POST["usuario"]) && isset($_POST["password"])){
    
    $usuario = preg_replace("/[^A-Za-z0-9 ]/", '', $_POST["usuario"]);
    
    if(Admin::login($usuario, $_POST["password"])){
        $user = Admin::userExists($usuario);
        if($user != null){
            $_SESSION["uid"] = $user["id"];
            header("Location: ../../admin/index.php");
        } else {
            header("Location: ../../admin/login.php?error=Error inesperado al iniciar sesión");
        }
        
    } else {
        header("Location: ../../admin/login.php?error=Datos erroneos");
    }

} else {
    header("Location: ../../admin/login.php");
}