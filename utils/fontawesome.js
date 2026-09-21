const FONT_AWESOME_KIT = '0a2587cca2';

export function loadFontAwesome() {
  if (document.querySelector('[data-font-awesome-kit]')) {
    return;
  }

  const script = document.createElement('script');

  script.src = `https://kit.fontawesome.com/${FONT_AWESOME_KIT}.js`;
  script.crossOrigin = 'anonymous';
  script.dataset.fontAwesomeKit = '';

  document.head.appendChild(script);
}
