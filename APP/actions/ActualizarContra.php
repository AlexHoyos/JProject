<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["actualPassw"], $_POST["nuevaPassw"], $_POST["repitePassw"])){

            if(password_verify($_POST["actualPassw"], $admin->password)){

                if(strlen($_POST["nuevaPassw"]) >= 6 && strlen($_POST["nuevaPassw"]) <= 20){

                    if($_POST["nuevaPassw"] == $_POST["repitePassw"]){

                        $nuevaContra = password_hash($_POST["nuevaPassw"], PASSWORD_BCRYPT);
                        if(Admin::update(Admin::class, ["password" => $nuevaContra], "id", $admin->id)){

                            echo "Cotraseña actualizada!";

                        } else {
                            echo "No se pudo actualizar la conntraseña por un error interno!";
                        }

                    } else {
                        echo "Las contraseñas no son iguales";
                    }

                } else {
                    echo "La contraseña debe estar entre 6 a 20 caracteres";
                }

            } else {
                echo "Contraseña incorrecta!";
            }

        } else {
            echo "Se esperaban más parametros! ";
        }

    } else {
        echo "No eres adminn!";
    }

} else {
    echo "No eres admin!";
}
