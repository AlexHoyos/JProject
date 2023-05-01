<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["id"])){

            $venta = Venta::getVentaById($_POST["id"]);
            if($venta != null){

                if($venta->estado != "cancelado"){

                    $cancelarVenta = Venta::update(Venta::class, ["estado" => "cancelado"], "id", $venta->id);
                    if($cancelarVenta){

                        $email->isHTML();
                        $email->addAddress($venta->correo, $venta->nombre);
                        $email->Subject = "Compra cancelada!";
                        $email->Body = "Hola! Tu compra <b>#{$venta->id}</b> ha sido cancelada <br>";
                        $email->Body .= "Esto normalmente es debido a falta de pago, reembolso solicitado por el cliente o por error en logistica <br>";
                        $email->Body .= "Si crees que se trata de un error intenta comunicarse con el administrador :)";
                        if($email->send()){
                            echo "Venta cancelada!";
                        } else {
                            echo "Venta cancelada pero hubo un error al enviar el correo!";
                        }

                    } else {
                        echo "No se pudo cancelar la venta!";
                    }

                } else {
                    echo "La venta no se puede cancelar debido a que ya esta cancelada";
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
