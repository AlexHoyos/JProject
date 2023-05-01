<?php
    include 'templates/Header.php';
?>
<body>
<main>
  <?php require('templates/Sidebar.php'); 

    $id = 0;
    if(isset($_GET["id"]))
        $id = intval($_GET["id"]);

    $search = "";
    if(isset($_GET["search"]))
        $search = $_GET["search"];

    $filter = "all";
    if(isset($_GET["filter"]))
        $filter = $_GET["filter"];
  ?>
  
    <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#mensajes">

        <h2>Pinturas</h2>

        <div class="row w-100">
            <div class="col-6">
                <a onclick="insertParam('filter', 'dispo')" class="btn <?=($filter=="dispo")?"btn-primary":"btn-outline-primary"?>">Disponibles</a>
                <a onclick="insertParam('filter', 'vendidas')" class="btn <?=($filter=="vendidas")?"btn-primary":"btn-outline-primary"?>">Vendidas</a>
                <a onclick="insertParam('filter', 'all')" class="btn <?=($filter=="all")?"btn-primary":"btn-outline-primary"?>">Todas</a>
                <a href="pinturas.php" class="btn btn-link">Quitar filtros</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button onclick="buscar()" class="btn btn-info m-2">Buscar</button>
                <a href="pinturas.php" class="btn btn-primary m-2">+Agregar</a>
            </div>
            <div class="col-3">
                <div class="list-group w-100" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <?php
                        if($filter == "dispo")
                            $pinturas = Pintura::getPinturasDispo($search);
                        else if($filter == "vendidas")
                            $pinturas = Pintura::getPinturasVendidas($search);
                        else
                            $pinturas = Pintura::getAll($search);

                        foreach($pinturas as $pintura){
                            $isActive = $id == $pintura->id;
                    ?>
                    <a href="#" onclick="insertParam('id', <?=$pintura->id?>)" class="list-group-item list-group-item-action <?=($isActive)?"active":""?>">
                        <?=$pintura->titulo?>
                        </a>
                    <?php } ?>
                </div>   
            </div>
            <div class="col-9">
                <div class="card" style="height:500px;overflow-y:scroll;overflow-x:hidden;">
                    <div class="card-body">
                        <?php
                            $pintura = Pintura::getPinturaById($id);
                            $found = true;
                            if($pintura == null){
                                $found = false;
                                $pintura = (object) [
                                    "id" => 0,
                                    "titulo" => "",
                                    "descripcion" => "",
                                    "longitud" => "",
                                    "altura" => "",
                                    "tecnica" => "",
                                    "tipo_color" => "",
                                    "precio" => "",
                                    "vista_url" =>""
                                ];
                            }
                        ?>
                        <input type="hidden" id="pinturaID" value="<?=$pintura->id?>">
                        <label for="titulo"><b>Título</b></label>
                        <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" value="<?=$pintura->titulo?>">
                        <label for="descr"><b>Descripción</b></label>
                        <textarea name="descr" id="descr" class="form-control" placeholder="Descripción"><?=$pintura->descripcion?></textarea>
                        
                        <div class="row">
                            <div class="col-6">
                                <label for="longitud"><b>Longitud</b></label>
                                <input type="number" name="longitud" id="longitud" placeholder="Longitud (cm)" value="<?=$pintura->longitud?>" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="altura"><b>Altura</b></label>
                                <input type="number" name="altura" id="altura" placeholder="Altura (cm)" value="<?=$pintura->altura?>" class="form-control">
                            </div>
                        </div>
                        <label for="tecnica"><b>Tecnica</b></label>
                        <input type="text" name="tecnica" id="tecnica" class="form-control" placeholder="Tecnica" value="<?=$pintura->tecnica?>">
                        <label for="tipo_color"><b>Tipo color</b></label><br>
                        <input type="radio" name="tipo_color"  id="color_calido" value="calido" <?=($pintura->tipo_color=='calido')?"checked":""?> >
                        <label for="color_calido">Calido</label>
                        <input type="radio" name="tipo_color" id="color_frio" value="frio" <?=($pintura->tipo_color=='frio')?"checked":""?> >
                        <label for="color_frio">Fría</label>
                        <br>
                        <label for="precio"><b>Precio</b></label>
                        <input type="number" name="precio" id="precio" placeholder="Precio $" value="<?=$pintura->precio?>" class="form-control">
                        <br>
                        <label for="imagen"><b>Cuadro</b></label>
                        <input type="file" name="imagen" id="imagen" class="form-control" onchange="imgPreview(this)">
                        <br>
                        <img src="<?=WEB_URL?>/IMG/pinturas/<?=$pintura->vista_url?>" id="imgPrev" width="400" alt="">
                        <br><br>
                        <?php
                            $venta = Venta::getVentaByPinturaId($pintura->id);
                            if($venta != null){
                        ?>
                        <a href="ventas.php?id=<?=$venta->id?>" class="btn btn-primary">Ver venta actual</a>
                        <?php } ?>
                        <?php if($found){ ?>
                        <button class="btn btn-warning" onclick="save(<?=$pintura->id?>)">Guardar cambios</button>
                        <button class="btn btn-danger" onclick="deletePintura(<?=$pintura->id?>)">Eliminar</button>
                        <?php } else { ?>
                        <button class="btn btn-primary" onclick="add()">Añadir pintura</button>
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
<script src="../JS/admin.js"></script>
<script>
    function createFormData(){
        var formData = new FormData()

        var cuadro = $("#imagen")[0].files[0]
        var titulo = $("#titulo").val()
        var descripcion = $("#descr").val()
        var longitud = $("#longitud").val()
        var altura = $("#altura").val()
        var tecnica = $("#tecnica").val()
        var tipo_color = "calido"
        if($("#color_frio").is(":checked"))
            tipo_color = "frio"
        var precio = $("#precio").val()
        var idPintura = $("#pinturaID").val()

        formData.append('cuadro', cuadro)
        formData.append('titulo', titulo)
        formData.append('descripcion', descripcion)
        formData.append('longitud', longitud)
        formData.append('altura', altura)
        formData.append('tecnica', tecnica)
        formData.append('tipo_color', tipo_color)
        formData.append('precio', precio)
        formData.append('id', idPintura)
        return formData
    }
    function add(){
        var data = createFormData()
        $.ajax({
            url: "../APP/actions/AgregarPintura.php",
            type: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(res){
                alert(res);
                window.location.reload()
            },
            error: function(res){
                alert("Error al agregar pintura!")
            }
        })

    }

    function save(id){
        var data = createFormData()
        $.ajax({
            url: "../APP/actions/EditarPintura.php",
            type: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(res){
                alert(res);
                window.location.reload()
            },
            error: function(res){
                alert("Error al actualizar pintura!")
            }
        })
    }

    function deletePintura(id){
        var data = createFormData()
        $.ajax({
            url: "../APP/actions/EliminarPintura.php",
            type: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(res){
                alert(res);
                window.location.reload()
            },
            error: function(res){
                alert("Error al eliminar pintura!")
            }
        })
    }


    function imgPreview(fileInput){

        const [file] = fileInput.files
        if(file) {
            document.getElementById("imgPrev").src = URL.createObjectURL(file)
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

    function buscar(){
        let searchQuery = prompt('Buscar por titulo o descripcion');
        if(searchQuery != null)
            insertParam('search', searchQuery)
    }
</script>
</body>
</html>