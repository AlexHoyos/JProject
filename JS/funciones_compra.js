function abrir(){
    document.getElementById('fondo').style.display="flex";
    document.getElementById('correos').style.display="none";
 }

 function cerrar(){
    document.getElementById('fondo').style.display="none";
 }

 function cerrar2(){
    document.getElementById('correos').style.display="none";
    document.getElementById('pantalla').style.display="block";
 }

 function Verificar(){
    let c1=document.getElementById('c1').value;
    let c2=document.getElementById('c2').value;
    let co1=document.getElementById('c1').value.length;
    let co2=document.getElementById('c2').value.length;
    let n1=document.getElementById('n1').value.length;
    let n2=document.getElementById('n2').value.length;
    let n3=document.getElementById('n3').value.length;
    let num=document.getElementById('num').value.length;
    let cp=document.getElementById('cp').value.length;
    let pais=document.getElementById('pais').value.length;
    let calle=document.getElementById('calle').value.length;
    let casa=document.getElementById('casa').value.length;
    let es=document.getElementById('es').value.length;
    let mun=document.getElementById('mun').value.length;
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
      //generar pdf
      let C1=document.getElementById('c1').value;
      let N1=document.getElementById('n1').value;
      let N2=document.getElementById('n2').value;
      let N3=document.getElementById('n3').value;
      let NUM=document.getElementById('num').value;
      let CP=document.getElementById('cp').value;
      let PA=document.getElementById('pais').value;
      let CALLE=document.getElementById('calle').value;
      let CASA=document.getElementById('casa').value;
      let ES=document.getElementById('es').value;
      let MUN=document.getElementById('mun').value;

      let datos='Número de cuenta: 00000000000000000000000\nNúmero para tranferencia: 000000000000000000000\n \n Datos del cliente \n Nombre: ' +N1+ N2+ ' '+ N3+ 
      '\n Correo: '+ C1+ '\n Número: '+ NUM+ '\n \n Dirección \n Código Postal: '+ CP+ '\n Calle: '+ CALLE+'\n Número de casa: '+ CASA+ '\n Municipio: '+ MUN+ 
      '\n Estado: '+ ES+ '\n País: '+ PA; 

      var doc=new jsPDF();
      doc.text(10,10,datos);
      doc.save('Factura.pdf');

      }
  }
