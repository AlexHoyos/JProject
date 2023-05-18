<html>
   <head>
      <link href="CSS/pinturas.css" rel="stylesheet" />
   </head>
   <body>
 <!--Div para la pantalla con las pinturas-->
   <div class="fondo" id="fondo">
      <div class="button_cerrar">
         <a href="javascript:cerrar()" id="cerrar">
            <img src="IMG/cerrar.png" height="50" width="50">
         </a>
      </div>
         <img src="IMG/pinturas/img1.jpg" width="700" id="imagen_pintura">
      <div class="info_pintura">
         <h2 id="titulo_p">Ejemplo</h2>
         <div style="flex-direction:row;justify-content:space-between;align-items:center">
            <div>
               <p>Tamaño: <b id="tamano_p">200x100 cm</b></p>
               <p>Técnica: <b id="tecnica_p">Oleo/Tela</b></p>
               <p>Color: <b id="color_p">Frio</b></p>
            </div>
         </div>
      </div>
   </div>
       <!--Para hacer las funciones de las pinturas-->
     <script src="JS/pinturas.js"></script>
   </body>
</html>