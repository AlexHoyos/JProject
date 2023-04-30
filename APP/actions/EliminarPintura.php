<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["id"])){

            $pintura = Pintura::getPinturaById(intval($_POST["id"]));

            if($pintura != null){

               if(Pintura::delete(Pintura::class, "id", $pintura->id)){
                    echo "Pintura eliminada con exito!";
               } else {
                    echo "No se pudo eliminar la pintura:(";
               }

            } else {
                echo "No se encontro la pintura!";
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
