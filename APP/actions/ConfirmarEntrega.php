<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["id"])){

            $venta = Venta::getVentaById($_POST["id"]);
            if($venta != null){

                if($venta->estado != "cancelado"){

                    $confirmarVenta = Venta::update(Venta::class, ["estado" => "completado"], "id", $venta->id);
                    if($confirmarVenta){

                        $email->isHTML();
                        $email->addAddress($venta->correo, $venta->nombre);
                        $email->Subject = "Has recibido tu pintura!";
                        $email->Body = "Hola! Tu compra <b>#{$venta->id}</b> ha sido entregada <br>";
                        $email->Body .= "El proveedor del envio ha confirmado la entrega de esta. <br>";
                        $email->Body .= "En caso de cualquier incoveniente no dudes en ponerte en contacto! <br>";
                        $email->Body .= "Que disfrutes tu cuadro! Muchas gracias por su compra :)";
                        if($email->send()){
                            echo "Entrega confirmada!";
                        } else {
                            echo "Entrega confirmada pero hubo un error al enviar el correo!";
                        }

                    } else {
                        echo "No se pudo confirmar la entrega de la venta!";
                    }

                } else {
                    echo "La venta no se puede confirmar la entrega debido a que ya esta cancelada";
                }

            } else {
                echo "No se encontro la venta con ese id";
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
