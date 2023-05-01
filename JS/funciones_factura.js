function abrir(id){
    document.getElementById('fondo').style.display="flex";
    document.getElementById('correos').style.display="none";
    document.getElementById('pid').value=id;
 }

 function cerrar(){
    document.getElementById('fondo').style.display="none";
    document.getElementById('factura').style.display="none";
    document.getElementById('cubrir').style.display="none";
 }

 function cerrar2(){
    document.getElementById('correos').style.display="none";
    document.getElementById('pantalla').style.display="block";
 }

 function Verificar(){
  var pid = document.getElementById('pid').value
  var c1=document.getElementById('c1').value;
  var c2=document.getElementById('c2').value;
  var co1=document.getElementById('c1').value.length;
  var co2=document.getElementById('c2').value.length;
  var n1=document.getElementById('n1').value.length;
  var n2=document.getElementById('n2').value.length;
  var n3=document.getElementById('n3').value.length;
  var num=document.getElementById('num').value.length;
  var cp=document.getElementById('cp').value.length;
  var pais="México".length;
  var calle=document.getElementById('calle').value.length;
  var casa=document.getElementById('casa').value.length;
  var casa_int=document.getElementById('casaInt').value.length;
  var colonia = document.getElementById('colonia').value.length;
  var es=document.getElementById('es').value.length;
  var mun=document.getElementById('mun').value.length;
  var res= c1==c2;
  var cont=0;

    if(co1==0){
      cont++;
    }else if (co2==0){
      cont++;
    }else if(n1==0){
      cont++;
    }else if(n2==0){
      cont++;
    }else if(n3==0){
      cont++;
    }else if(num==0){
      cont++;
    }else if(cp==0){
      cont++;
    }else if(pais==0){
      cont++;
    }else if(calle==0){
      cont++;
    }else if(casa==0){
      cont++;
    }else if(es==0){
      cont++;
    }else if(mun==0){
      cont++;
    }

    if (res==false || cont>0){
        document.getElementById('pantalla').style.display="none";
        document.getElementById('correos').style.display="flex";
    }else if(res==true && cont==0){

            // Primero recuperar datos de la pintura
            $.ajax({
                method: "GET",
                url: "APP/actions/PinturaInfo.php?id="+pid,
                success: function(pinturaRes){

                    if(pinturaRes.status != "error"){
                        //llenar los datos en el diseño de la factura
                        document.getElementById('factura').style.display="block";
                        document.getElementById('cubrir').style.display="block";
                        let C1=document.getElementById('c1').value;
                        let N1=document.getElementById('n1').value;
                        let N2=document.getElementById('n2').value;
                        let N3=document.getElementById('n3').value;
                        let NUM=document.getElementById('num').value;
                        let CP=document.getElementById('cp').value;
                        let PA="México";
                        let CALLE=document.getElementById('calle').value;
                        let CASA=document.getElementById('casa').value;
                        let CASAINT=document.getElementById('casaInt').value;
                        let ES=document.getElementById('es').value;
                        let MUN=document.getElementById('mun').value;
                        let COLONIA = document.getElementById('colonia').value;
                        var nombre= "Nombre: "+N1+" "+ N2+ " "+N3;
                        nom.innerText=nombre;
                        cor.innerText="Correo: "+C1;
                        tel.innerText="Teléfono: "+NUM;
                        postal.innerText="CP: "+CP;
                        dire.innerText="Dirección: "+CALLE+" #"+ CASA +" "+ CASAINT +", "+ COLONIA +", "+MUN+", "+ES+", "+PA;
                        n_pin.innerText = pinturaRes.pintura.titulo
                        precio.innerText = "$"+pinturaRes.pintura.precio
                        total.innerText = "$"+parseFloat(pinturaRes.pintura.precio+200).toFixed(2)
                        //generar el pdf
                        var fac=document.getElementById('factura');
                        var doc=new jsPDF('p','pt','letter');
                        var margin=20;
                        var escala=(doc.internal.pageSize.width - margin * 2) / document.body.clientWidth;
                        doc.html(fac,{
                            x:margin,
                            y:margin,
                            html2canvas:{
                            scale:escala,
                            },
                            callback: function(doc){
                            doc.save('Boleta_Pago.pdf');
                            var pdf = btoa(doc.output()); 
                            $.ajax({
                                method: "POST",
                                url: "APP/actions/SendBoleta.php",
                                data: {
                                pdf: pdf,
                                nombre:N1,
                                apellido_pat: N2,
                                apellido_mat: N3,
                                correo:C1,
                                telefono:NUM,
                                cp:CP,
                                calle:CALLE,
                                num_int:CASAINT,
                                num_ext:CASA,
                                pais:PA,
                                municipio:MUN,
                                colonia:COLONIA,
                                estado:ES,
                                pintura_id:pid
                                },
                            }).done(function(data){
                            //   alert(data);
                                console.log(data);
                            }); 

                            }
                        });
                    } else {
                        console.log(pinturaRes)
                    }

                }
            })
      }
  }
