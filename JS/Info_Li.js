const frameworks=[
    {
        name:"1988",
        description:"Docencia en el Centro de Estudios Diferenciados, Aguascalientes,Ags."
    },
    {
        name:"1989",
        description:"Realización del mural de la Esc. Prim. Federal 'Año Internacional del Niño', Aguascalientes,Ags."
    },
    {
        name:"1989-2018",
        description:"Docencia en el Centro de Artes Visuales y Casa de la Cultura de Rincón de Romos, Ags."
    },
    {
        name:"1991",
        description:"Realización del mural de la biblioteca del Centro Ecológico 'Los Cuartos', Jesús Ma.,Ags."
    },
    {
        name:"1992",
        description:"Realización de los murales de la Capilla del Centro Ecollógico 'Los Cuartos', Jesús Ma., Ags."
    },
    {
        name:"2005",
        description:"Beca de Residencia en Vermont Studio Center, Vermont, U.S.A."
    },
    {
        name:"2015",
        description:"Becario del programa de Estímulo a la Creación y Desarrollo Artístico 2014-2015"
    }
]

//render html

var html="";
frameworks.forEach(e=>{
    html +="<div class='child'><div class='content'><h4>"+e.name+"</h4><p>"+e.description+"</p></div> </div>"
})
tiempo.innerHTML=html

//animación

var _items = document.querySelectorAll(".child")
_items.forEach(element =>{
    if(element.offsetTop < 0.0001)
    element.classList.add('_show')
})

window.addEventListener("scroll", e=>{
    var scroll = document.documentElement.scrollTop
    var items = document.querySelectorAll(".child")
    items.forEach(elem=>{
        if(elem.offsetTop - window.innerHeight/2 < scroll){
            elem.classList.add('_show')
        }else{
            elem.classList.remove('_show')
            elem.classList.add('_hide')
        }
    })
})