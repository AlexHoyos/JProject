function cerrar(){
    document.getElementById('fondo').style.display="none";
 }

 
function abrir(item){
    var $fondo = $("#fondo")
    var $imagen_pintura = $("#imagen_pintura")
    
    var $item = $(item)
    var img_url = $item.attr("data-img")
    console.log(img_url)

    $imagen_pintura.attr("src", img_url)
    $imagen_pintura.css("display", "flex")
    $fondo.css("display", "flex")
    /*
    switch(num){

        case 1:
            document.getElementById('img1').style.display="flex";
            break;
        case 2:
            document.getElementById('img2').style.display="flex";
            break;
        case 3:
            document.getElementById('img3').style.display="flex";
            break;
        case 4:
            document.getElementById('img4').style.display="flex";
            break;
        case 5:
            document.getElementById('img5').style.display="flex";
            break;
        case 6:
            document.getElementById('img6').style.display="flex";
            break;  
        case 7:
            document.getElementById('img7').style.display="flex";
            break; 
        case 8:
            document.getElementById('img8').style.display="flex";
            break; 
        case 9:
            document.getElementById('img9').style.display="flex";
            break; 
        case 10:
            document.getElementById('img10').style.display="flex";
            break; 
        case 11:
            document.getElementById('img11').style.display="flex";
            break; 
        case 12:
            document.getElementById('img12').style.display="flex";
            break; 
        case 13:
            document.getElementById('img13').style.display="flex";
            break; 
        case 14:
            document.getElementById('img14').style.display="flex";
            break; 
        case 15:
            document.getElementById('img15').style.display="flex";
            break; 
        case 16:
            document.getElementById('img16').style.display="flex";
            break; 
        case 17:
            document.getElementById('img17').style.display="flex";
            break; 
        case 18:
            document.getElementById('img18').style.display="flex";
            break; 
        case 19:
            document.getElementById('img19').style.display="flex";
            break; 
        case 20:
            document.getElementById('img20').style.display="flex";
            break; 
        case 21:
            document.getElementById('img21').style.display="flex";
            break; 
        case 22:
            document.getElementById('img22').style.display="flex";
            break; 
        case 23:
            document.getElementById('img23').style.display="flex";
            break; 
        case 24:
            document.getElementById('img24').style.display="flex";
            break; 
        case 25:
            document.getElementById('img25').style.display="flex";
            break; 
        case 26:
            document.getElementById('img26').style.display="flex";
            break; 
        case 27:
            document.getElementById('img27').style.display="flex";
            break; 
        case 28:
            document.getElementById('img28').style.display="flex";
            break; 
        case 29:
            document.getElementById('img29').style.display="flex";
            break; 
        case 30:
            document.getElementById('img30').style.display="flex";
            break; 
        case 31:
            document.getElementById('img31').style.display="flex";
            break; 
        case 32:
            document.getElementById('img32').style.display="flex";
            break; 
        case 33:
            document.getElementById('img33').style.display="flex";
            break; 
        case 34:
            document.getElementById('img34').style.display="flex";
            break; 
        case 35:
            document.getElementById('img35').style.display="flex";
            break; 
        case 36:
            document.getElementById('img36').style.display="flex";
            break; 
        case 37:
            document.getElementById('img37').style.display="flex";
            break; 
        case 38:
            document.getElementById('img38').style.display="flex";
            break; 
        case 39:
            document.getElementById('img39').style.display="flex";
            break; 
    }*/
}
