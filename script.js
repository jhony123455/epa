document.addEventListener("DOMContentLoaded", function () {
    function mostrarSeccion(seccionId) {
        document.querySelectorAll(".seccion").forEach(seccion => {
            seccion.style.display = "none";
        });

        document.getElementById(seccionId).style.display = "block";
    }

    // Mostrar la sección de inicio por defecto
    mostrarSeccion("inicio");

    // Hacer la función accesible desde el HTML
    window.mostrarSeccion = mostrarSeccion;
});

document.addEventListener("DOMContentLoaded", function () {
    function mostrarSeccion(seccionId) {
        document.querySelectorAll(".seccion").forEach(seccion => {
            seccion.style.display = "none";
        });

        document.getElementById(seccionId).style.display = "block";

        // Si la sección es "ubicacion", inicializa el mapa
        if (seccionId === "ubicacion") {
            setTimeout(inicializarMapa, 500);
        }
    }

    function inicializarMapa() {
        if (window.mapa) {
            return; // Evita reinicializar el mapa
        }

        window.mapa = L.map('map').setView([19.432608, -99.133209], 12); // Coordenadas de CDMX

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(mapa);

        L.marker([19.432608, -99.133209]).addTo(mapa)
            .bindPopup('Ubicación Ejemplo')
            .openPopup();
    }

    // Mostrar la sección de inicio por defecto
    mostrarSeccion("inicio");

    // Hacer la función accesible desde el HTML
    window.mostrarSeccion = mostrarSeccion;
});


