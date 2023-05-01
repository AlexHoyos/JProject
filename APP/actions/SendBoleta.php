<?php
include '../main.php';

if(isset($_POST["pdf"], $_POST["nombre"], $_POST["apellido_mat"], $_POST["apellido_pat"], $_POST["correo"], $_POST["telefono"], $_POST["cp"], $_POST["calle"],
    $_POST["num_int"], $_POST["num_ext"], $_POST["pais"], $_POST["municipio"], $_POST["colonia"], $_POST["estado"], $_POST["pintura_id"])){

        $pintura_id = intval($_POST["pintura_id"]);
    if(Pintura::isPinturaDisponible($pintura_id)){

        $pintura = Pintura::getPinturaById($pintura_id);

        if($pintura != null){

            $direccionID = Direccion::createDireccion($_POST["calle"], $_POST["num_int"], $_POST["num_ext"], $_POST["colonia"], $_POST["municipio"], $_POST["estado"], $_POST["cp"], $_POST["pais"], $_POST["telefono"]);
            if($direccionID != 0){
    
                $venta = Venta::createVenta($pintura_id, $_POST["nombre"], $_POST["apellido_pat"]." ".$_POST["apellido_mat"], $_POST["telefono"], $_POST["correo"], $pintura->precio, $direccionID);
                
                if($venta){

                    if(!empty($_POST["pdf"])){
                        
                        $pdfFileData = base64_decode($_POST["pdf"]);
                        $fileName = "Boleta_Pago_". $_POST["correo"] . "_". $pintura_id .".pdf";
                        file_put_contents("../storage/boletas/".$fileName, $pdfFileData) or die ("No se pudo crear el archivo");
                        $email->isHTML();
                        $email->addAddress($_POST["correo"], $_POST["nombre"]);
                        $email->addAttachment("../storage/boletas/".$fileName, $fileName);
                        $email->Subject = "Boleta de pago";
                        $email->Body = "Hola! Gracias por tu interes en la pintura <b>{$pintura->titulo}</b> <br>";
                        $email->Body .= "El monto a pagar es de <b>$".$pintura->precio." </b> <br>";
                        $email->Body .= "En el PDF adjunto incluye la información necesaria para realizar tu pago! Muchas gracias :)";
                        if($email->send()){

                            echo "Boleta creada y enviada al correo!";

                        } else {
                            echo "No se pudo enviar el correo";
                        }
                
                    } else {
                        echo "No se envio el archivo pdf";
                    }

                } else {
                    echo "Error al crear la venta";
                }

            }else {
                echo "Error al guardar la direccion";
            }

        } else {
            echo "No se encontró la pintura";
        }

    } else {
        echo "La pintura no se encuentra disponible a la venta:(";
    }

} else {
    echo "No se envio ningun dato!";
}