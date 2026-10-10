export function HeaderNav() {
  return `
    <header>
        <h1>Portal de Desenvolvimento Web</h1>
        <p>UniMetrocamp Wyden - Turma de HTML5 & CSS3</p>
    </header>

    <nav>
      <a href="index.html">Home</a>
      <a href="curriculo.html">Mini Currículo</a>
      <a href="hospedagem.html">Hospedagem</a>
      <a href="galeria.html">Galeria de Projetos</a>
      <!-- <a href="contato.html">Contato</a> -->

      <div class="nav-pill"></div>
    </nav>
  `;
}

function getCurrentPage() {
  return window.location.pathname.split('/').pop() || 'index.html';
}

export function HeaderNavPillAnimation() {
  const nav = document.querySelector('nav');
  const pill = nav.querySelector('.nav-pill');
  const links = [...nav.querySelectorAll('a')];

  const currentPage = getCurrentPage();
  const active = links.find((link) => link.getAttribute('href') === currentPage);

  function movePill(link) {
    pill.style.width = `${link.offsetWidth}px`;
    pill.style.left = `${link.offsetLeft}px`;
    pill.classList.add('visible');
  }

  if (active) {
    active.classList.add('active');
    movePill(active);
  }

  requestAnimationFrame(() => {
    pill.classList.add('is-ready');
  });

  links.forEach((link) => {
    link.addEventListener('mouseenter', () => movePill(link));
  });

  nav.addEventListener('mouseleave', () => {
    if (active) {
      movePill(active);
    } else {
      pill.classList.remove('visible');
    }
  });
}
