/*header cambia de color al bajar*/
    // Selecciona el header (navbar)
    const header = document.querySelector('.header');

    // Función que se ejecuta al hacer scroll
    window.onscroll = function() {
        // Si el usuario ha hecho scroll más de 50px desde la parte superior
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            // Si el usuario vuelve a la parte superior, removemos la clase
            header.classList.remove('scrolled');
        }
    };


/*menu hamburguesa*/ 
document.querySelector('.hamburger').addEventListener('click', function() {
    document.querySelector('.navbar').classList.toggle('active');
    document.querySelector('.hamburger').classList.toggle('hidden');
    document.querySelector('.close').classList.toggle('hidden');
});

document.querySelector('.close').addEventListener('click', function() {
    document.querySelector('.navbar').classList.remove('active');
    document.querySelector('.hamburger').classList.remove('hidden');
    document.querySelector('.close').classList.add('hidden');
});

/* Animacion Nosotros*/
document.addEventListener('DOMContentLoaded', function() {
    const options = {
        root: null, // el viewport
        threshold: 0.3 // 10% visible para disparar
    };

    const observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Si la imagen está en pantalla, agregar la clase de animación
                if (entry.target.classList.contains('nosotros_img')) {
                    entry.target.classList.add('animate-slideRight');
                }
                
                // Si el texto está en pantalla, agregar la clase de animación
                if (entry.target.classList.contains('nosotros_texto')) {
                    entry.target.classList.add('animate-slideLeft');
                }

                observer.unobserve(entry.target); // Dejar de observar una vez animado
            }
        });
    }, options);

    // Seleccionar los elementos que queremos observar
    const img = document.querySelector('.nosotros_img');
    const texto = document.querySelector('.nosotros_texto');

    if (img) {
        observer.observe(img);
    }

    if (texto) {
        observer.observe(texto);
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Configura las opciones para el IntersectionObserver
    const options = {
        root: null, // el viewport
        threshold: 0.3 // 30% visible para disparar
    };

    // Crea una instancia de IntersectionObserver
    const observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Si el contenedor de la galería está en pantalla, agrega la clase de animación
                if (entry.target.classList.contains('gallery-container')) {
                    entry.target.classList.add('animate-gallery');
                }
                
                observer.unobserve(entry.target); // Dejar de observar una vez animado
            }
        });
    }, options);

    // Selecciona el contenedor de la galería y comienza a observarlo
    const galleryContainer = document.querySelector('.gallery-container');
    if (galleryContainer) {
        observer.observe(galleryContainer);
    }
});

/* Galería mostrar en pantalla grande*/ 

 // Selecciona todas las imágenes pequeñas
 const smallImages = document.querySelectorAll('.image-item img');
 // Selecciona la imagen destacada
 const featuredImage = document.getElementById('featured');

 // Agrega un listener de clic a cada imagen pequeña
 smallImages.forEach(image => {
     image.addEventListener('click', function() {
         // Inicia la animación de desvanecimiento (fade-out)
         featuredImage.style.opacity = 0;

         // Cambia la imagen después de la animación de desvanecimiento
         setTimeout(() => {
             // Cambia la imagen destacada por la que se clickeó
             featuredImage.src = this.src;

             // Vuelve a hacer visible la imagen (fade-in)
             featuredImage.style.opacity = 1;
         }, 200); // El tiempo aquí debe coincidir con la duración de la transición en CSS
     });
 });

 /*SLIDER EN GALERIA */

    // Selecciona el contenedor que tiene las imágenes pequeñas
    const imageGrid = document.querySelector('.image-grid');
    // Control de desplazamiento
    let currentIndex = 0;
    const visibleImages = 5; // Cantidad de imágenes visibles al mismo tiempo
    const imageWidth = 120; // Ancho de cada imagen incluyendo el espacio (ajústalo según tu diseño)

    // Botones de avance y retroceso
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    // Manejador de eventos para avanzar en el slider
    nextBtn.addEventListener('click', () => {
        currentIndex++;
        updateSlider();
    });

    // Manejador de eventos para retroceder en el slider
    prevBtn.addEventListener('click', () => {
        currentIndex--;
        updateSlider();
    });

    function updateSlider() {
        const maxIndex = Math.ceil(imageGrid.children.length - visibleImages);
        if (currentIndex < 0) {
            currentIndex = 0;
        } else if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }

        const offset = -(currentIndex * imageWidth);
        imageGrid.style.transform = `translateX(${offset}px)`;

        // Mostrar u ocultar los botones según la posición
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === maxIndex;
    }

    // Inicializar el slider
    updateSlider();


/// Función para abrir el modal
// Función para abrir el modal
function openModal(data) {
    document.getElementById('modal-img').src = data.imagenSrc;
    document.getElementById('modal-title').innerText = data.nombre;
    document.getElementById('modal-description').innerText = data.cargo;

    // Limpiar y agregar los servicios
    const serviciosList = document.getElementById("modal-servicios");
    serviciosList.innerHTML = ''; // Limpiar la lista actual
    data.servicios.forEach(servicio => {
        const li = document.createElement("li");
        li.textContent = servicio;
        serviciosList.appendChild(li);
    });

    // Mostrar el modal
    document.getElementById('modal').style.display = 'flex';
    
    // Deshabilitar el scroll de fondo
    document.body.style.overflow = 'hidden';
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById('modal').style.display = 'none';
    // Restaurar el scroll de fondo
    document.body.style.overflow = 'auto';
}

// Evento para cerrar el modal haciendo clic fuera del modal
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        closeModal();
    }
}

// Evento para cerrar el modal haciendo clic en la "X"
document.querySelector('.modal-close').onclick = function() {
    closeModal();
};
