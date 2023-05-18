function cerrar(){
    document.getElementById('fondo').style.display="none";
 }

 
function abrir(item){
    var $fondo = $("#fondo")
    var $imagen_pintura = $("#imagen_pintura")

    var $item = $(item)
    var img_url = $item.attr("data-img")
    var titulo = $item.attr("data-titulo")
    var tamano = $item.attr("data-tamano")
    var tecnica = $item.attr("data-tecnica")
    var tipocolor = $item.attr("data-tipocolor")
    console.log(img_url)

    $imagen_pintura.attr("src", img_url)
    $("#tamano_p").html(tamano+" cm")
    $("#titulo_p").html(titulo)
    $("#tecnica_p").html(tecnica)
    $("#color_p").html(tipocolor)
    $imagen_pintura.css("display", "flex")
    $fondo.css("display", "flex")
    
}
