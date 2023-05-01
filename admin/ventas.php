<?php
    include 'templates/Header.php';
?>
<body>
<main>
  <?php require('templates/Sidebar.php'); 

    $id = 0;
    if(isset($_GET["id"]))
        $id = intval($_GET["id"]);
  ?>
  
    <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#mensajes">

        <h2>Ventas</h2>

        <div class="row w-100">
            <div class="col-12 d-flex justify-content-end">
                <a href="#" class="btn btn-primary m-2">Buscar</a>
            </div>
            <div class="col-3">
                <div class="list-group w-100" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <?php
                        $ventas = Venta::getAllPendVentas();
                        foreach($ventas as $venta){
                            $isActive = $id == $venta->id;
                            $pintura = Pintura::getPinturaById($venta->id_pintura)
                    ?>
                    <a href="?id=<?=$venta->id?>" class="list-group-item list-group-item-action <?=($isActive)?"active":""?>">
                        <b>#<?=$venta->id?></b> <?=$pintura->titulo?>
                        </a>
                    <?php } ?>
                </div>   
            </div>
            <div class="col-9">
                <div class="card" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <div class="card-body">
                        <?php
                            $venta = Venta::getVentaById($id);
                            if($venta != null){
                        ?>
                        <b>Nombre:</b>
                        <p><?=$venta->nombre?> <?=$venta->apellidos?></p>
                        <b>Correo:</b>
                        <p><?=$venta->correo?></p>
                        <b>Telefono:</b>
                        <p><?=$venta->telefono?></p>
                        <b>Precio pactado:</b>
                        <p>$<?=$venta->precio_venta?></p>
                        <h4>
                            <?php
                                if($venta->pagado == 's'){
                            ?>
                                <span class="badge badge-success">Pago confirmado</span>
                            <?php } else { ?>
                                <span class="badge badge-danger">No se ha confirmado el pago</span>
                            <?php } ?>
                        </h4>
                        <h4>
                            <?php if($venta->estado == 'pendiente') { ?>
                                <span class="badge badge-warning">Venta en proceso</span>
                            <?php } else if($venta->estado == 'cancelado') { ?>
                                <span class="badge badge-danger">Venta cancelada</span>
                            <?php } else { ?>
                                <span class="badge badge-success">Venta completada</span>
                            <?php } ?>
                        </h4>
                        <?php if($venta->pagado == 'n' && $venta->estado == 'pendiente'){ ?>
                            <button class="btn btn-primary" onclick="confirmPago(<?=$venta->id?>)">Confirmar pago</button>
                        <?php } else if($venta->pagado == 's' && $venta->id_envio == NULL){
                                $direccion = Direccion::getDireccionById($venta->id_direccion);
                                if($direccion != null){ 
                        ?>
                        <hr>
                            <b>Calle y num:</b>
                            <p><?=$direccion->calle?> <?=$direccion->num_ext?></p>
                            <b>Num interior:</b>
                            <p><?=$direccion->num_int?></p>
                            <b>Colonia y CP:</b>
                            <p><?=$direccion->colonia?> <?=$direccion->codigo_postal?></p>
                            <b>Municipio, Estado y Pais</b>
                            <p><?=$direccion->municipio?>, <?=$direccion->estado?>, <?=$direccion->pais?></p>
                            <?php } else { ?>
                                <b>El usuario no registro dirección, o se corrompio. Ponerse en contacto con el!</b>
                            <?php } ?>
                            <hr>
                            <h5>Datos de envio</h5>
                            <label for="proveedor">Proveedor:</label>
                            <input type="text" name="proveedor" id="proveedor" placeholder="Proveedor" class="form-control">
                            <label for="guia">Guia:</label>
                            <input type="text" name="guia" id="guia" placeholder="Guia de rastreo" class="form-control">
                            <label for="url_rastreo">Url de rastreo (opcional):</label>
                            <input type="text" name="proveedor" id="url_rastreo" placeholder="url_rastreo" class="form-control">
                            <label for="costo">Costo de envio:</label>
                            <input type="number" name="costo" id="costo" placeholder="Costo del envio" class="form-control"><br>
                            <button class="btn btn-warning" onclick="registrarEnvio(<?=$venta->id?>)">Registrar Envio</button>
                        <?php } else if($venta->pagado == "s" && $venta->id_envio != NULL) {
                                $envio = Envio::getEnvioById($venta->id_envio);
                                if($envio != null){  
                        ?>
                            <hr>
                                <b>Proveedor: </b>
                                <p><?=$envio->proveedor?></p>
                                <b>Guia: </b>
                                <p><?=$envio->guia?></p>
                                <b>Link de rastreo:</b><br>
                                <a href="<?=(!empty($envio->url_rastreo)?$envio_url_rastreo:"#")?>">Enlace de rastreo</a><br>
                                <b>Costo de envio:</b>
                                <p>$<?=$envio->costo?></p>
                        <?php       }
                                } ?>
                        <?php if($venta->pagado == "s" && $venta->id_envio != NULL && $venta->estado == 'pendiente') { ?>
                            <button class="btn btn-primary" onclick="confirmarEntrega(<?=$venta->id?>)">Confirmar entrega</button>
                        <?php } ?>
                        
                        <?php if($venta->estado != "cancelado"){?>
                            <button class="btn btn-danger" onclick="cancelarVenta(<?=$venta->id?>)">Cancelar venta</button>
                        <?php } ?>
                    <?php } ?>
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
    
    function registrarEnvio(id){
        var opcion = confirm("Desea ya registrar el envio?");
        if (opcion == true) {
            $.ajax({
                url: "../APP/actions/RegistrarEnvioVenta.php",
                type: "POST",
                data: {
                    id: id,
                    proveedor: $("#proveedor").val(),
                    guia: $("#guia").val(),
                    url_rastreo: $("#url_rastreo").val(),
                    costo: $("#costo").val()
                },
                success: function(res){
                    alert(res);
                    window.location.reload()
                },
                error: function(res){
                    alert("Error al registrar envio!")
                }
            })
        } else {
            alert("Cancelado el registro de envio")
        }
    }

    function confirmPago(id){
        var opcion = confirm("Desea confirmar el pago de esta venta?");
        if (opcion == true) {
            $.ajax({
                url: "../APP/actions/ConfirmarPagoVenta.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(res){
                    alert(res);
                    window.location.reload()
                },
                error: function(res){
                    alert("Error al confirmar el pago!")
                }
            })
        } else {
            alert("Cancelada la confirmación")
        }
    }

    function confirmarEntrega(id){
        var opcion = confirm("Desea confirmar la entrega de esta venta?");
        if (opcion == true) {
            $.ajax({
                url: "../APP/actions/ConfirmarEntrega.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(res){
                    alert(res);
                    window.location.reload()
                },
                error: function(res){
                    alert("Error al cancelar venta!")
                }
            })
        } else {
            alert("Cancelada la confirmación de entrega")
        }
    }

    function cancelarVenta(id){
        var opcion = confirm("Desea cancelar esta venta?");
        if (opcion == true) {
            $.ajax({
                url: "../APP/actions/CancelarVenta.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(res){
                    alert(res);
                    window.location.reload()
                },
                error: function(res){
                    alert("Error al cancelar venta!")
                }
            })
        } else {
            alert("Deteniendo la cancelación!")
        }
    }

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