<?php
    include 'templates/Header.php';
?>
<body>
    <main>
    <?php require('templates/Sidebar.php'); ?>

        <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#config">

            <h2>Configuración de cuenta</h2>

            <div class="card text-center">
                <div class="card-header">
                    Cuenta - <b><?=$admin->usuario?></b>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Cambiar contraseña</h5>
                    <input type="password" name="actualPassw" id="actualPassw" class="form-control" placeholder="Contraseña actual"><br>
                    <input type="password" name="nuevaPassw" id="nuevaPassw" class="form-control" placeholder="Nueva contraseña"><br>
                    <input type="password" name="repitePassw" id="repitePassw" class="form-control" placeholder="Repetir contraseña">
                </div>
                <div class="card-footer text-muted">
                    <button class="btn btn-primary" onclick="actualizarContra()">Actualizar</button>
                </div>
            </div>

        </section>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script>
        function actualizarContra(){
            const actualPassw = $("#actualPassw").val()
            const nuevaPassw = $("#nuevaPassw").val()
            const repitePassw = $("#repitePassw").val()
            $.ajax({
                url: "../APP/actions/ActualizarContra.php",
                type: "POST",
                data: {
                    actualPassw: actualPassw,
                    nuevaPassw: nuevaPassw,
                    repitePassw: repitePassw
                },
                success: function(res) {
                    alert(res)
                    window.location.reload()
                },
                error: function(res){
                    alert("Error al actualizar contraseña");
                }
            })
        }
    </script>
</body>