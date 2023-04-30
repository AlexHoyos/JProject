<?php
    include 'templates/Header.php';
?>
<body>
<main>
  <?php require('templates/Sidebar.php'); ?>
  
    <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#mensajes">

        <h2>Mensajes recibidos
            <?php

            $id = 0;
            if(isset($_GET["id"]))
                $id = intval($_GET["id"]);

            $newMsg = Mensaje::getNewMsgCount();
            if($newMsg > 0){
                if($newMsg == 99) $newMsg = "+" . $newMsg;
            ?>
            <span class="badge bg-danger text-light rounded-pill"><?=$newMsg?></span>
            <?php } ?>
        </h2>

        <div class="row w-100">
            <div class="col-3">
                <div class="list-group w-100" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <?php
                        $mensajes = Mensaje::getNewMessages();
                        foreach($mensajes as $mensaje){
                            $isActive = $id == $mensaje->id;
                    ?>
                    <a href="?id=<?=$mensaje->id?>" class="list-group-item list-group-item-action <?=($isActive)?"active":""?>">
                        <?=$mensaje->nombre?> - <?=$mensaje->created_at?>
                        </a>
                    <?php } ?>
                    <!--
                    <button type="button" class="list-group-item list-group-item-action active">
                        Cras justo odio
                    </button> -->
                </div>   
            </div>
            <div class="col-9">
                <div class="card" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <div class="card-body">
                        <?php
                            $mensaje = Mensaje::getMessageById($id);
                            if($mensaje != null){
                                if($mensaje->atendido == "n"){
                        ?>

                        <h4 id="msgNombre"><?=$mensaje->nombre?></h4>
                        <p>Enviado el: <?=$mensaje->created_at?></p>
                        <div class="d-flex flex-row">
                            <b class="mx-1">Correo: </b> <p class="mx-1" id="msgCorreo"><?=$mensaje->correo?></p>
                            <b class="mx-1">Telefono: </b> <p class="mx-1" id="msgTelefono"><?=$mensaje->telefono?></p>
                        </div>
                        <b class="mx-1">Mensaje: </b> <p class="mx-1" id="msgBody">
                            <?=$mensaje->mensaje?>
                        </p>
                        <a href="mailto:<?=$mensaje->correo?>" class="btn btn-primary">Enviar correo</a>
                        <button class="btn btn-warning" onclick="atenderMensaje(<?=$mensaje->id?>)">Marcar como atendido</button>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>   

    </section>

</main>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script>
    function atenderMensaje(id){

        $.ajax({
            url: "../APP/actions/SetMensajeAtendido.php?id="+id,
            type: "GET",
            success: function(res){
                alert(res);
                window.location.reload()
            },
            error: function(res){
                alert("Error al actualizar el mensaje!")
            }
        })

    }
</script>
</body>
</html>