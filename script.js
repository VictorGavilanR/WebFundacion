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
         }, 300); // El tiempo aquí debe coincidir con la duración de la transición en CSS
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




// Modo Accesible
// Modo Accesible

// Función para abrir y cerrar el menú de accesibilidad
function toggleAccessibilityMenu() {
  const menu = document.getElementById('accessibility-menu');
  menu.classList.toggle('open');
}

// Ajustar tamaño de texto con límites
function adjustTextSize(action) {
  const minSize = 15; // Tamaño mínimo en píxeles
  const maxSize = 25; // Tamaño máximo en píxeles

  const textElements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, span, li, a'); 
  textElements.forEach(element => {
    let currentSize = parseFloat(window.getComputedStyle(element).fontSize);

    if (action === 'increase' && currentSize < maxSize) {
      element.style.fontSize = (currentSize + 2) + 'px';
    } else if (action === 'decrease' && currentSize > minSize) {
      element.style.fontSize = (currentSize - 2) + 'px';
    }
  });
}

// Alternar contraste alto
// Alternar contraste alto
function toggleContrast() {
  document.body.classList.toggle("high-contrast");

}

// Resaltar elementos interactivos
function highlightInteractiveElements() {
  const interactiveElements = document.querySelectorAll('a, button, img'); // Corrección en el selector
  interactiveElements.forEach(el => el.classList.toggle('interactive'));
}

// Leer texto en voz alta o detener la lectura
let readingActive = false;
let utterance;

function activateReading() {
  if (readingActive) {
    speechSynthesis.cancel();
    readingActive = false;
  } else {
    const content = document.querySelector('body').textContent;
    utterance = new SpeechSynthesisUtterance(content);
    speechSynthesis.speak(utterance);
    readingActive = true;
  }

  utterance.onend = function() {
    readingActive = false;
  };
}



/*Active navbar*/ 
// Seleccionar todas las secciones que quieres observar
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".navbar a");

// Crear un IntersectionObserver
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Remover la clase 'active' de todos los enlaces
      navLinks.forEach(link => link.classList.remove("active"));
      
      // Añadir la clase 'active' al enlace correspondiente
      const id = entry.target.getAttribute("id");
      document.querySelector(`.navbar a[href="#${id}"]`).classList.add("active");
    }
  });
}, {
  threshold: 0.7,  // El 70% de la sección debe estar visible
});

// Observar cada sección
sections.forEach(section => {
  observer.observe(section);
});

// Marcar "Home" como activo si la página está en la parte superior
window.addEventListener("load", () => {
  if (window.scrollY === 0) {
    navLinks.forEach(link => link.classList.remove("active"));
    document.querySelector('.navbar a[href="index.html"]').classList.add("active");
  }
});

// Alternativa para detectar el desplazamiento hacia la parte superior y activar "Home"
window.addEventListener("scroll", () => {
  if (window.scrollY === 0) {
    navLinks.forEach(link => link.classList.remove("active"));
    document.querySelector('.navbar a[href="index.html"]').classList.add("active");
  }
});

/*MODAL NOSOTROS.PHP*/ 

   // Función para abrir el modal y establecer el contenido
   function openModal(imagePath, name, profession, services, n_identificacion) {
    document.getElementById('modalImage').src = imagePath;
    document.getElementById('modalName').innerText = name;
    document.getElementById('modalProfession').innerText = "Profesión: " + profession;
    document.getElementById('modalServices').innerText = "Servicios: " + services;
    document.getElementById('modalId').innerText = "Número de Identificación: " + n_identificacion;
    document.getElementById('myModal').style.display = "block";
    document.body.classList.add('modal-open'); // Deshabilitar el desplazamiento
}


function closeModal (){
  document.getElementById
}