document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
});

function eventListeners() {
    const movilmenu = document.querySelector('.movil-menu');
    movilmenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.nav');
    navegacion.classList.toggle('mostrar');
}