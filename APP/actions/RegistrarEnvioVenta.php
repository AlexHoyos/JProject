<?php

include '../main.php';

if(isset($_SESSION["uid"])){

    $admin = Admin::getById($_SESSION["uid"]);
    if($admin!=null){

        if(isset($_POST["id"], $_POST["proveedor"], $_POST["guia"], $_POST["url_rastreo"], $_POST["costo"])){

            $costo = floatval($_POST["costo"]);
            if(!empty($_POST["proveedor"]) && !empty($_POST["guia"]) && $costo >= 1){

                $venta = Venta::getVentaById($_POST["id"]);
                if($venta != null){

                    if($venta->estado == "pendiente"){

                        $registroEnvio = Envio::createEnvio($_POST["proveedor"], $_POST["guia"], $_POST["url_rastreo"], $costo);
                        if($registroEnvio > 0){

                            $actualizarVenta = Venta::update(Venta::class, ["id_envio" => $registroEnvio], "id", $venta->id);
                            if($actualizarVenta){

                                $email->isHTML();
                                $email->addAddress($venta->correo, $venta->nombre);
                                $email->Subject = "Envio registrado!";
                                $email->Body = "Hola! Tu compra <b>#{$venta->id}</b> ha sido enviada a tu domicilio! <br>";
                                $email->Body .= "Tu compra fue enviada por <b>".$_POST["proveedor"]."</b> <br>";
                                $email->Body .= "Tu guía de rastreo es: <b>".$_POST["guia"]."</b> <br>";
                                if(!empty($_POST["url_rastreo"]))
                                    $email->Body .= "Rastrea tu paquete <a href=\"".$_POST["url_rastreo"]."\" >Aquí</a> <br>";
                                $email->Body .= "Si encuentras algun problema comunicate con nosotros :)";

                                if($email->send()){
                                    echo "Envio registrado!";
                                } else {
                                    echo "Envio registrado pero no se pudo enviar el correo de confirmación!";
                                }

                            } else {
                                echo "No se pudo actualizar el envio en la venta!";
                            }

                        } else {
                            echo "No se registrar el envio!";
                        }

                    } else {
                        echo "El envio no es posible ya que esta venta esta cancelada o ya fue realizada";
                    }

                } else {
                    echo "No se encontro la venta con ese id";
                }

            } else {
                echo "Se enviaron datos vacios!";
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
