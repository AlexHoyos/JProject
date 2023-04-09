//Inicio interactivo

let main = document.getElementById('main');
let triangulo = document.getElementById('triangulo');
let gotas = document.getElementById('gotas');
let text = document.getElementById('text');
let btn = document.getElementById('btn');
let main_front = document.getElementById('main_front');
let main_front2 = document.getElementById('main_front2');
let title = document.getElementById('title');
let header = document.getElementById('galery');
let coords = header.getBoundingClientRect();
console.log(coords.top)
window.addEventListener('scroll', function(){
    if(coords.top <= this.window.scrollY){
        let value = parseFloat(window.scrollY-coords.top);
        gotas.style.top = value * 1.05 + 'px';
        triangulo.style.left = value * -0.45 + 'px';
        main.top = value * 0.5 + 'px';
        main_front.style.left = value * -2 + 'px';
        main_front2.style.left = value * 4 + 'px';
        text.style.marginRight = value * -7 + 'px';
        text.style.marginTop = value * 0.7 + 'px';
        btn.style.marginTop = value * 1 + 'px';
        title.style.marginRight = value * 9 + 'px';
        title.style.marginTop = value * 0.7 + 'px';
        //header.style.top = value * -0.35 + 'px';
    }
})