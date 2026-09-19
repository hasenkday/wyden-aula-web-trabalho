import { Storage } from '../../utils/storage.js';

// Theme switcher
const themeButton = document.getElementById('btn-tema');
themeButton.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
  const isDark = document.body.classList.contains('dark-mode');
  Storage.set('dark_theme', isDark);
});
