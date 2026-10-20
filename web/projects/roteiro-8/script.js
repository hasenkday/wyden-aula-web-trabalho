async function switchExemple(url, button) {
  const example = document.getElementById('playground-example');
  const output = document.getElementById('playground-output');

  try {
    const response = await fetch(url);
    const result = await response.json();

    if (!response.ok || result.error) {
      example.textContent = JSON.stringify(result.error ?? result, null, 2);
      output.textContent = `Erro HTTP ${response.status}`;
      return;
    }

    example.textContent = result.data.source;
    output.textContent = result.data.output;

    document.querySelectorAll('.roteiro-8 button').forEach((btn) => {
      btn.classList.remove('active');
    });

    if (button) {
      button.classList.add('active');
    }
  } catch (error) {
    example.textContent = error;
    output.textContent = 'Não foi possível conectar à API.';
    console.error(error);
  }
}

switchExemple(
  `${CONFIG.API_URL}/roteiro-8/exemplos/1`,
  document.querySelector('.roteiro-8 button'),
);
