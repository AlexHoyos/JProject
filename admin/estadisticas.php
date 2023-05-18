<?php
    include 'templates/Header.php';
?>
<body>
  <main>
    <?php require('templates/Sidebar.php'); ?>

    <section class="w-100 bg-light d-flex flex-column justify-content-center align-items-center" id="#index">
      <div class="row w-75 border rounded">

        <div class="col-6 bg-light p-4 d-flex flex-column justify-content-center align-items-center">
            <div>
                <h3>Ventas</h3>
            </div>
            <div style="width:33vh;height:33vh">
                <canvas id="graficaVentas" ></canvas>
            </div>
            
        </div>

        <div class="col-6 bg-light p-1 d-flex flex-column justify-content-center align-items-center">
            <div class="bg-warning text-light w-100 p-2 border rounded">
                <b><?=intval(round( (Venta::countByStatus()/Venta::countAll(Venta::class)) * 100 ))?>%</b> PENDIENTES
            </div>
            <div class="bg-danger text-light w-100 p-2 border rounded">
                <b><?=intval(round( (Venta::countByStatus("cancelado")/Venta::countAll(Venta::class)) * 100 ))?>%</b> CANCELADOS
            </div>
            <div class="bg-success text-light w-100 p-2 border rounded">
                <b><?=intval(round( (Venta::countByStatus("completado")/Venta::countAll(Venta::class)) * 100 ))?>%</b> COMPLETADO
            </div>
        </div>

      </div>
    </section>

  </main>
  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const $grafica = document.querySelector("#graficaVentas");

    const etiquetas = ["pendientes", "canceladas", "completadas"]

    const datosIngresos = {
        data: [<?=Venta::countByStatus()?>, <?=Venta::countByStatus("cancelado")?>, <?=Venta::countByStatus("completado")?>],
        backgroundColor: [
            'rgba(247, 220, 111 ,0.2)',
            'rgba(236, 112, 99, 0.2)',
            'rgba(88, 214, 141, 0.2)',
        ],
        borderColor: [
            'rgba(241, 196, 15 ,1)',
            'rgba(148, 49, 38, 1)',
            'rgba(29, 131, 72, 1)',
        ],
        borderWidth: 1,
    };
    new Chart($grafica, {
        type: 'pie',
        data: {
            labels: etiquetas,
            datasets: [
                datosIngresos
            ]
        },
        options: {
            responsive: true
        }
    });
</script>
</body>
</html>