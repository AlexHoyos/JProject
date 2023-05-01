<?php
    include 'templates/Header.php';
?>
<body>
<main>
  <?php require('templates/Sidebar.php'); ?>
  
    <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#mensajes">

        <h2>Envios
            <?php

            $id = 0;
            if(isset($_GET["id"]))
                $id = intval($_GET["id"]);
            ?>
        </h2>

        <div class="row w-100">
            <div class="col-3">
                <div class="list-group w-100" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <?php
                        $envios = Envio::getEnviosNoEntregados();
                        foreach($envios as $envio){
                            $isActive = $id == $envio->id;
                    ?>
                    <a href="?id=<?=$envio->id?>" class="list-group-item list-group-item-action <?=($isActive)?"active":""?>">
                        <?=$envio->proveedor?> - <?=$envio->guia?>
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
                            $envio = Envio::getEnvioById($id);
                            if($envio != null){
                                $venta = Venta::getVentaByEnvioId($id);
                                if($venta != null) {
                                    $direccion = Direccion::getDireccionById($venta->id_direccion);
                                    if($direccion != null){
                        ?>

                        <h4 id="msgNombre">Datos del envio</h4>
                        <b>Proveedor:</b>
                        <p><?=$envio->proveedor?></p>
                        <b>Guía:</b>
                        <p><?=$envio->guia?></p>
                        <b>Enlace: </b>
                        <p><a href="<?= (!empty($envio->url_rastreo))?$envio->url_rastreo:"#"?>">Link de rastreo</a></p>
                        <b>Enviado el: </b>
                        <p><?=$envio->created_at?></p>
                        <b>Recibe: </b>
                        <p><?=$venta->nombre?> <?=$venta->apellidos?></p>
                        <b>Telefono: </b>
                        <p><?=$venta->telefono?></p>
                        <h4>Domicilio</h4>
                        <b>Calle y num:</b>
                        <p><?=$direccion->calle?> <?=$direccion->num_ext?></p>
                        <b>Num interior:</b>
                        <p><?=$direccion->num_int?></p>
                        <b>Colonia y CP:</b>
                        <p><?=$direccion->colonia?> <?=$direccion->codigo_postal?></p>
                        <b>Municipio, Estado y Pais</b>
                        <p><?=$direccion->municipio?>, <?=$direccion->estado?>, <?=$direccion->pais?></p>

                        <a href="ventas.php?id=<?=$venta->id?>" class="btn btn-primary">Ver Venta</a>
                        
                        <?php } } } ?>
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