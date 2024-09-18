
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


/*Modal Equipos*/ 

function openModal(imgSrc, title, description) {
    document.getElementById('modal-img').src = imgSrc;
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal-description').innerText = description;
    document.getElementById('modal').style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

// Close the modal when clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}





