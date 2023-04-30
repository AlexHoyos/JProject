<?php

include '../main.php';

if(isset($_GET["id"])){

    if(isset($_SESSION["uid"])){

        $admin = Admin::getById($_SESSION["uid"]);
        if($admin!=null){

            $mensaje = Mensaje::getMessageById($_GET["id"]);
            if($mensaje != null){

                if(Mensaje::update(Mensaje::class, ["atendido" => "s"], "id", $mensaje->id)){

                    echo "Mensaje actualizado!";

                } else {
                    echo "Error al actualizar mensaje:(";
                }

            } else {
                echo "No se encontro el mensaje!";
            }

        } else {
            echo "No eres adminn!";
        }
  
    } else {
        echo "No eres admin!";
    }

} else {
    echo "Se esperaba el id";
}