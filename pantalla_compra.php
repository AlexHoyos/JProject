 <html>
   <head>
      <link href="CSS/pantalla.css" rel="stylesheet" />
      <link href="CSS/factura.css" rel="stylesheet" />
   </head>
   <body>
 <!--Div para la pantalla emergente del formulario-->
       <div class="fondo" id="fondo">
         <div class="pantalla" id="pantalla">
            <a href="javascript:cerrar()" id="cerrar" class="cerrarp"><img src="IMG/cerrar.png" height="12" width="12"></a>
            <H4>Llene los datos para llevar a cabo la compra</h4>
            <div class="msj">Es necesario que ingrese su correo de forma correcta ya que la boleta de pago se le enviará por dicho medio.</div><br>
            <form action="">
               <div class="cont-input">
                  <input type="hidden" name="pintura_id" id="pid">
                  <br>Nombre: <input type="text" placeholder=" Nombres"  id="n1">
                  <input type="text" placeholder=" Primer apellido"  id="n2">
                  <input type="text" placeholder=" Segundo apellido" id="n3"><br><br>
                  Correo: <input type="email" placeholder=" Correo"  id="c1"> &nbsp
                  Confirmación del Correo: <input type="email" placeholder=" Correo de confirmación" id="c2"><br><br>
                  Número de teléfono: <input type="text" placeholder=" Número"  maxlength="10" id="num"><br><br>
                  Dirección <br>                 
                  Código Postal: <input type="number" placeholder=" CP" id="cp"> &nbsp &nbsp
                  Calle: <input type="text" placeholder="Calle" id="calle"><br><br>
                  Número casa: <input type="number" placeholder=" #Casa" id="casa"> &nbsp &nbsp &nbsp
                  Número interior: <input type="text" placeholder="#Numero Interior" id="casaInt"><br><br>
                  Colonia: <input type="text" placeholder="Colonia" id="colonia"> &nbsp &nbsp &nbsp
                  País: <input type="text" placeholder=" Pais" id="pais" value="México" disabled><br><br>
                  &nbsp &nbsp &nbsp &nbsp  Municipio: <input type="text" placeholder=" Municipio" id="mun"> 
                  Estado: <input type="text" placeholder=" Estado" id="es"><br><br>
                  <input type="button" class="enviar" value="Generar boleta de pago" onclick="Verificar ()"><br><br>
               </div>
            </form>
            <span> Al dar click al botón la boleta de pago se le descargara automáticamente en su dispositivo.</span>
         </div>
         <!--Div para la pantalla donde el correo no coincide-->
         <div class="pantalla" id="correos">
                    <form action="">
                        <label>Falto un campo de llenar o los correos ingresados no coinciden, favor de comprobar sus datos.</label><br>
                        <input type="button" class="enviar" value="OK" onclick="cerrar2 ()"><br><br>
                    </form>
        </div>
      </div>
            <!--Diseño de la factura-->
            <div class="borde" id="factura">
               <div class="margen">
               <table class="info">
               <tr>
                  <td class="espacio">
                     <img src="IMG/icon1.png" class="icono"><br>
                     <div> jpproject_staff@outlook.com</div>
                  </td>
                  <td >
                     <b>Número de cuenta: <br>
                     Banco:</b> 
                  </td>
                  <td >
                     97553536195<br>
                     Citibanamex
                  </td>
               </tr>
            </table><br><br>
            <b>Datos del cliente</b><br>
            <div id="nom">Nombre</div>
            <div id="cor">Correo</div>
            <div id="tel">Tel</div>
            <div id="postal">CP</div>
            <div id="dire">Direccion</div><br>

            <table class="pint">
               <tr class="diseño">
                  <td>No. Concepto</td>
                  <td>Concepto</td>
                  <td>Precio</td>
               </tr>
               <tr>
                  <td><b>1</b></td>
                  <td id="n_pin">---</td>
                  <td id="precio">$---</td>
               </tr>
               <tr>
                  <td><b>2</b></td>
                  <td > Envío</td>
                  <td >$200.00</td>
               </tr>
               <tr>
                  <td colspan="2" class="total final"><b>Total</b></td>
                  <td id="total" class="final"> <b>$---</b></td>
               </tr>
            </table><br><br>
            <div class="msj"><i>Una vez generada está boleta cuenta con 7 días para generar el pago, de lo contrario la pintura volvera a estar a la venta.<br> Para dudas
               o aclaraciones nos puede contactar por nuestra página web en la sección de "Contacto". </i></div>
            </div>
      </div><br><br>
      <div class="cubrir" id="cubrir"></center></div>
      <!--Script para generar el pdf--> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
   </body>
</html>