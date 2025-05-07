// Obtener los elementos
const menuIcon = document.getElementById('menu-icon');
const menu = document.getElementById('menu');
const closeIcon = document.getElementById('close-icon');
const textarea = document.getElementById('auto-resize-textarea');

// Función para abrir el menú
menuIcon.addEventListener('click', () => {
    menu.classList.add('active');
    menuIcon.style.display = 'none';  // Ocultar el icono de abrir
});

// Función para cerrar el menú
closeIcon.addEventListener('click', () => {
    menu.classList.remove('active');
    menuIcon.style.display = 'flex';  // Mostrar el icono de abrir nuevamente
});


textarea.addEventListener('input', () => {
    textarea.style.height = 'auto'; // Restablece la altura
    textarea.style.height = `${textarea.scrollHeight}px`; // Ajusta al contenido
});

