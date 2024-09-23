// Función para abrir y cerrar el menú de accesibilidad
function toggleAccessibilityMenu() {
    const menu = document.getElementById('accessibility-menu');
    menu.classList.toggle('open');
  }
  
  // Ajustar tamaño de texto
  function adjustTextSize(action) {
    const body = document.body;
    let currentSize = parseFloat(window.getComputedStyle(body).fontSize);
    if (action === 'increase') {
      body.style.fontSize = (currentSize + 2) + 'px';
    } else if (action === 'decrease') {
      body.style.fontSize = (currentSize - 2) + 'px';
    }
  }
  
  // Alternar contraste alto
  function toggleContrast() {
    document.body.classList.toggle('high-contrast');
  }
  
  // Resaltar elementos interactivos
  function highlightInteractiveElements() {
    const interactiveElements = document.querySelectorAll('a, button');
    interactiveElements.forEach(el => el.classList.toggle('interactive'));
  }
  
  // Cambiar cursor personalizado
  function toggleCursor() {
    document.body.classList.toggle('custom-cursor');
  }
  
  // Leer texto en voz alta
  function activateReading() {
    const content = document.querySelector('body').textContent;
    const utterance = new SpeechSynthesisUtterance(content);
    speechSynthesis.speak(utterance);
  }
  