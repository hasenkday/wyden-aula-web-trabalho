async function switchExemple(url, button) {
  const example = document.getElementById('playground-example');
  const output = document.getElementById('playground-output');

  try {
    const response = await fetch(url);
    const result = await response.json();

    if (!response.ok || result.error) {
      example.textContent = '';
      output.textContent = result.error?.message || 'Erro ao carregar conteúdo.';
      return;
    }

    example.textContent = result.data.source;
    output.textContent = result.data.output;

    document.querySelectorAll('.roteiro-7 button').forEach((btn) => {
      btn.classList.remove('active');
    });

    if (button) {
      button.classList.add('active');
    }
  } catch (error) {
    example.textContent = '';
    output.textContent = 'Não foi possível conectar à API.';
    console.error(error);
  }
}

switchExemple(
  `${CONFIG.API_URL}/roteiro-7/exemplos/1`,
  document.querySelector('.roteiro-7 button'),
);
