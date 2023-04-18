<?php
include '../main.php';

$msg = "";

if(isset($_POST["nombre"], $_POST["email"], $_POST["telefono"], $_POST["mensaje"])){

    if(!empty($_POST["mensaje"]) && !empty($_POST["nombre"])){
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) != false){

            $mensajeCreado = Mensaje::createMessage($_POST["nombre"], $_POST["email"], $_POST["telefono"], $_POST["mensaje"]);
            if($mensajeCreado){

                $email->addAddress($_POST["email"], $_POST["nombre"]);
                $email->isHTML(true);
                $email->Subject="¡Mensaje Recibido!";
                $email->Body = "<h2>Hola, ".$_POST['nombre']."</h2> <br> <p>Hemos recibido tu mensaje! Pronto nos pondremos en contacto contigo :)</p> <br> ";
                $email->Body .= "Telefono: ".$_POST["telefono"]."<br>";
                $email->Body .= "Mensaje: ".$_POST["mensaje"]."<br>";
                if($email->send()){
                    $msg = "Se ha recibido el mensaje! Enviamos una copia a tu correo electronico";
                } else {
                    $msg = "Se ha recibido el mensaje";
                }

            } else {
                $msg = "Error al enviar el mensaje";
            }

        } else {
            $msg = "Correo invalido";
        }
    } else {
        $msg = "Dejaste algunos datos vacios!";
    }

} else {
    $msg = "Peticion invalida";
}

//var_dump($msg);
header("Location: ".WEB_URL."/contact.php?msg=".$msg);