function HeaderNav() {
  return `
    <div class="header-nav">
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
    </div>
  `;
}

function getCurrentPage() {
  return window.location.pathname.split('/').pop() || 'index.html';
}

function moveNavPill(pill, link) {
  pill.style.left = `${link.offsetLeft}px`;
  pill.style.width = `${link.offsetWidth}px`;
}

function HeaderNavPillAnimation() {
  const nav = document.querySelector('nav');
  const pill = nav.querySelector('.nav-pill');
  const links = [...nav.querySelectorAll('a')];

  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  const active = links.find((link) => link.getAttribute('href') === currentPage);

  function movePill(link) {
    pill.style.width = `${link.offsetWidth}px`;
    pill.style.left = `${link.offsetLeft}px`;
  }

  active.classList.add('active');
  movePill(active);

  requestAnimationFrame(() => {
    pill.classList.add('is-ready');
  });

  links.forEach((link) => {
    link.addEventListener('mouseenter', () => movePill(link));
  });

  nav.addEventListener('mouseleave', () => movePill(active));
}
