<?php
    include 'templates/Header.php';
?>
<body>
  <main>
    <?php require('templates/Sidebar.php'); ?>

    <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#index">
      <div class="row g-2 w-75">

        <div class="col-6 d-flex flex-column justify-content-center align-items-center bg-danger text-light p-3 border rounded">
          <h3><?=Pintura::countAll(Pintura::class)?></h3>
          <p class="text-light bg-gradient-dark">Pinturas registradas</p>
        </div>

        <div class="col-6 d-flex flex-column justify-content-center align-items-center bg-warning text-dark p-3 border rounded">
          <h3><?=intval(Venta::countAll(Venta::class)-count(Venta::getAllPendVentas()))?></h3>
          <p>Ventas realizadas</p>
        </div>

        <div class="col-12 d-flex flex-column justify-content-center align-items-center bg-success text-light p-3 border rounded">
          <h2><b>$<?=Venta::getIngresosBrutosTotal()?></b></h2>
          <p>Ingreso bruto total</p>
        </div>

        <div class="col-4 d-flex flex-column justify-content-center align-items-center bg-secondary text-light p-3 border rounded">
          <h2><b>$<?=Venta::getIngresosBrutosTotal("dia")?></b></h2>
          <p>Ingreso bruto del dia</p>
        </div>

        <div class="col-4 d-flex flex-column justify-content-center align-items-center bg-dark text-light p-3 border rounded">
          <h2><b>$<?=Venta::getIngresosBrutosTotal("mes")?></b></h2>
          <p>Ingreso bruto del mes</p>
        </div>

        <div class="col-4 d-flex flex-column justify-content-center align-items-center bg-light text-dark p-3 border rounded">
          <h2><b>$<?=Venta::getIngresosBrutosTotal("anio")?></b></h2>
          <p>Ingreso bruto del año</p>
        </div>

      </div>
    </section>

  </main>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>