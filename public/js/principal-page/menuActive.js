const menuIcon = document.getElementById('menu-icon');
const menu = document.getElementById('menu');
const closeIcon = document.getElementById('close-icon');
const textarea = document.getElementById('auto-resize-textarea');

if (menuIcon && menu && closeIcon) {
  menuIcon.addEventListener('click', () => {
    menu.classList.add('active');
    // menuIcon.style.display = 'none';  
  });

  closeIcon.addEventListener('click', () => {
    menu.classList.remove('active');
    menuIcon.style.display = 'flex';  
  });
}

if (textarea) {
  textarea.addEventListener('input', () => {
    textarea.style.height = 'auto';
    textarea.style.height = `${textarea.scrollHeight}px`;
  });
}
