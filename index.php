<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("head.php"); ?>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <?php include("menunav.php"); ?>
    <!-- Introduction -->
    <div class="hero_area">
        <section class="intro_section ">
            <div class="intro_bg_box">
                <img src="IMG/intro.png" alt="">
            </div>
            <div class="container ">
                <div class="row">
                    <div class="col-md-7 col-lg-6 ">
                        <div class="detail-box">
                            <h1>
                                <span>#BuscandoEmociones</span>
                                <br>Jesús Palacios
                            </h1>
                            <p>
                                Explora el trabajo de un artista de índole abstracto con una gran <br> trayectoria que ha dejado huella en diversas partes del mundo <br> desde México hasta Corea del Sur.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Galery (preview)-->
    <div class="grid-cont" id="grid-cont">
        <div class="item">
            <img src="IMG/pinturas/img1.jpg" alt="Imagen_1">
            <div class="capa">
                <p> Regocijo cósmico</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img5.jpg" alt="Imagen_5">
            <div class="capa">
                <p> Luchando con las serpientes de la conciencia</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img14.jpg" alt="Imagen_14">
            <div class="capa">
                <p> Hoguera ardiente <br> de las pasiones</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img19.jpg" alt="Imagen_19">
            <div class="capa">
                <p> Alegría del cosmos</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img12.jpg" alt="Imagen_12">
            <div class="capa">
                <p> Soltando los manubrios <br> de la cordura</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img15.jpg" alt="Imagen_15">
            <div class="capa">
                <p> Todas las veredas y caminos coinciden con la muerte</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img23.jpg" alt="Imagen_23">
            <div class="capa">
                <p> Primeros fulgores del alma</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img16.jpg" alt="Imagen_16">
            <div class="capa">
                <p> Laberintos del Pensamiento</p>
            </div>
        </div>
        <div class="item">
            <img src="IMG/pinturas/img31.jpg" alt="Imagen_31">
            <div class="capa">
                <p> Voces impregnadas de <br> sontiente felicidad</p>
            </div>
        </div>
    </div>
    <section class="galery" id="galery">
        <img src="IMG/main_m.png" id="main">
        <img src="IMG/triangulo_m.png" id="triangulo">
        <img src="IMG/gotas_m.png" id="gotas">
        <h2 id="text">Jesús Palacios</h2>
        <img src="IMG/main_mf.png" id="main_front">
        <img src="IMG/main_mff.png" id="main_front2">
        <h4 id="title">Regocijo Cósmico</h4>
        <a href="galery.php" id="btn">Explorar Galería</a>
    </section>
    <!--Biography (preview)-->
    <section class="bio">
        <div class="main">
            <div class="main-img">
                <img src="IMG/contact.png" alt="">
            </div>
            <div class="row">
                <div class="bio-text">
                    <h1>Jesús Palacios</h1>
                    <h5>Artista</h5>
                    <p>"En su trabajo, Palacios ha transitado por el informalismo, la figuración, la abstracción, etcétera con gran éxito y es precisamente en la corriente abstracta en donde, en mi opinión, está logrando mayor madurez. Agrupa poéticamente cada elemento y esto hace que al contemplar su obra se puedan descifrar signos porque el artista plástico es un creador de imágenes incubadas y proyectadas a lo largo del tiempo."<br><br>
                        <span>Alfredo Zermeño Flores <br>Artista plástico</span>
                    </p>
                    <a href="biography.php" class="btn">Biografía</a>
                </div>
            </div>
        </div>
    </section>
    <script src="JS/menunav.js"></script>
    <script src="JS/index.js"></script>
</body>

</html>