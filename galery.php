<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("head.php"); ?>
    <?php include("pinturas.php"); ?>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="CSS/galeria.css">
</head>
<body>
    <?php include("menunav.php"); ?>
    <section class="intro_section ">
        <div class="intro_bg_box">
            <img src="IMG/contact.png" alt="">
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-md-7 col-lg-6 ">
                    <div class="detail-box">
                        <h1>Galería</h1>
                        <p>
                            Conozca las distintas y únicas pinturas de Jesús Palacios.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Sección de las fotos principales-->
    <div class="grid-cont">
        <?php
                   $pinturas = Pintura::getPinturas();
                   foreach($pinturas as $pintura){
        ?>
        <div onclick="abrir(this)" class="item" data-img="IMG/pinturas/<?=$pintura->vista_url?>" data-titulo="<?=$pintura->titulo?>" data-tamano="<?=$pintura->longitud?>x<?=$pintura->altura?>"
            data-tecnica="<?=$pintura->tecnica?>" data-tipocolor="<?=$pintura->tipo_color?>">
            <img src="IMG/pinturas/<?=$pintura->vista_url?>" alt="<?=$pintura->titulo?>">
            <div class="capa">
                <p> <?=$pintura->titulo?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="JS/menunav.js"></script>
    <!--Para hacer las funciones de las pinturas-->
    <script src="JS/pinturas.js"></script>
</body>

</html>