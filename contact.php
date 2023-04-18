<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("head.php"); ?>
        <!-- font -->
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;600&display=swap" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="CSS/contact.css">
    </head>
    <body>
        <?php include("menunav.php"); ?>
        <div class="contact">
            <div class="perfil">
                <img src="IMG/c1.png">
            </div>
            <form action="APP/actions/SendMsg.php" method="post" id="formContacto">
                <div class="title">
                    <h2>CONTACTO</h2>
                </div>
                <div class="item">
                    Para mayor información, favor de ponerse en contacto con nosotros. <br><br>
                </div>
                <div class="half">
                    <div class="item">
                    <label for="name">Nombre</label>
                    <input type="text" id = "nombre" name="nombre">
                    </div>
                    <div class="item">
                    <label for="email">E-mail</label>
                    <input type="text" id = "email" name="email">
                    </div>
                    <div class="item">
                    <label for="email">Teléfono</label>
                    <input type="text" id = "telefono" name="telefono">
                    </div>
                </div>
                <div class="full">
                    <label for="message">Mensaje</label>
                    <textarea rows="4" id = "mensaje" name="mensaje" form="formContacto"></textarea>
                </div>
                <div class="action">
                    <input type="submit" value = "Enviar">
                    <input type="reset" value = "Reiniciar">
                </div>
                <div class="icons">
                    <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                </div>
            </form>
        </div>
        <script src="JS/menunav.js"></script>
    </body>
</html>
