document.addEventListener('DOMContentLoaded', function () {
    eventListeners();
    fetchLibro();
});

function eventListeners() {
    const movilmenu = document.querySelector('.movil-menu');
    movilmenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.nav');
    navegacion.classList.toggle('mostrar');
}

function fetchLibro() {
    fetch('../src/includes/get.php', {
        method: 'GET',
    })
        .then(res => res.json())
        .then(libro => {
            for (let i = 0; i < libro.length; i++) {
                const portada = libro[i][5];
                const titulo = libro[i][1];
                const autor = libro[i][2];
                const fecha = libro[i][3];

                addLibro(portada, titulo, autor, fecha);
            }
            /* const portada = libro['portada'];
            const titulo = libro['titulo'];
            const autor = libro['autor'];
            const fecha = libro['fecha'];

            addLibro(portada, titulo, autor, fecha); */
        })
}

function addLibro(_portada, _titulo, _autor, _fecha) {
    const urlPortada = "../../portadas/" + _portada;

    const libreria = document.querySelector('.libary');

    const libro = document.createElement('div');
    libro.classList.add('libro');

    const link = document.createElement('a');
    link.href = "./libro.html";

    const portada = document.createElement('img');
    portada.src = urlPortada;

    const titulo = document.createElement('h3');
    titulo.textContent = _titulo;

    const autor = document.createElement('p');
    autor.classList.add('autor');
    autor.textContent = _autor;

    const fecha = document.createElement('p');
    fecha.classList.add('fecha');
    fecha.textContent = _fecha;

    libreria.appendChild(libro);
    libro.appendChild(link);
    link.appendChild(portada);
    libro.appendChild(titulo);
    libro.appendChild(autor);
    libro.appendChild(fecha);
}