

document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider');
    const equipoContent = document.querySelector('.equipo_content');
    const cards = document.querySelectorAll('.card');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const totalCards = cards.length;
    const cardsPerView = 3; // Cantidad de cartas visibles
    let currentIndex = 0;

    function updateSlider() {
        equipoContent.style.transform = `translateX(-${currentIndex * (100 / cardsPerView)}%)`;
    }

    function showNextCard() {
        if (currentIndex < totalCards - cardsPerView) {
            currentIndex++;
        } else {
            currentIndex = 0; // Reinicia cuando no queden más cartas para llenar la vista
        }
        updateSlider();
    }

    function showPrevCard() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = totalCards - cardsPerView; // Muestra la última serie completa de cartas
        }
        updateSlider();
    }

    nextButton.addEventListener('click', showNextCard);
    prevButton.addEventListener('click', showPrevCard);

    setInterval(showNextCard, 3000); // Cambia cada 3 segundos
});


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





