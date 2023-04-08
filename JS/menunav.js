
window.addEventListener('load', function(){
    let page = window.location.pathname.replace("/", "").replace(".php", "").toLowerCase()
    const pageButton = document.querySelectorAll('[data-pageName="'+ page +'"]')[0];
    if(pageButton != null){
        console.log("hola")
        pageButton.classList.add('active')
    }

})
//Añadir la clase active en la tab seleccionada
const list = document.querySelectorAll('.list');
function activeLink() {
    list.forEach((item) => item.classList.remove('active'));
    this.classList.add('active');
}
list.forEach((item) => item.addEventListener('click', activeLink));

/* Importar los iconos de Ionicons usando el módulo ESM
import { add, close } from 'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js';

// Si el navegador no soporta módulos ESM, usar el script no-module
if (!('import' in document.createElement('script'))) {
    const script = document.createElement('script');
    script.src = 'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js';
    document.head.appendChild(script);
}*/
