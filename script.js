
document.addEventListener('DOMContentLoaded', function () {
    let observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target); // Dejar de observar una vez que la animación se ha activado
            }
        });
    });

    let nosotrosSection = document.querySelector('.nosotros');
    observer.observe(nosotrosSection);
});


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


// Función para cambiar el tema
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    if (currentTheme === 'dark') {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    } else {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    }
}

// Al cargar la página, establece el tema guardado en localStorage
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);

    // Configura el botón para cambiar el tema
    document.getElementById('theme-toggle').addEventListener('click', toggleTheme);
});



let lastScrollTop = 0;

window.addEventListener("scroll", function() {
  const img = document.querySelector(".nosotros_img");
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    // Scroll hacia abajo - rota a la derecha (5 grados)
    img.style.transform += "rotate(3deg)";
  } else {
    // Scroll hacia arriba - rota a la izquierda (5 grados)
    img.style.transform += "rotate(-3deg)";
  }

  lastScrollTop = scrollTop;
});

