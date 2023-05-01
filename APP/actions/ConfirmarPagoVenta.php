<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["id"])){

            $venta = Venta::getVentaById($_POST["id"]);
            if($venta != null){

                $confirmacionPago = Venta::confirmarPagoVenta(intval($_POST["id"]));

                if($confirmacionPago){

                    $email->isHTML();
                    $email->addAddress($venta->correo, $venta->nombre);
                    $email->Subject = "Pago confirmado!";
                    $email->Body = "Hola! Tu pago de la venta <b>#{$venta->id}</b> <br>";
                    $email->Body .= "El monto pagado fue de <b>$".$venta->precio_venta." </b> <br>";
                    $email->Body .= "En unos días recibirá la guía de rastreo del envio a la dirección marcada :)";
                    if($email->send()){
                        echo "Pago confirmado!";
                    } else {
                        echo "Pago confirmado pero hubo un error al enviar el correo!";
                    }
                } else {
                    echo "No se pudo confirmar el pago:(";
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
