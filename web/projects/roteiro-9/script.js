async function switchExemple(url, button) {
  const example = document.getElementById('playground-example');
  const output = document.getElementById('playground-output');
  const preview = document.getElementById('playground-preview');

  try {
    const response = await fetch(url);
    const result = await response.json();

    if (!response.ok || result.error) {
      example.textContent = JSON.stringify(result.error ?? result, null, 2);
      output.textContent = `Erro HTTP ${response.status}`;
      output.hidden = false;
      preview.hidden = true;
      return;
    }

    example.textContent = result.data.source;

    if (result.data.type === 'iframe') {
      preview.src = new URL(result.data.output, CONFIG.API_URL).href;

      preview.hidden = false;
      output.hidden = true;
      output.textContent = '';
    } else {
      output.textContent = result.data.output;
      output.hidden = false;
      preview.hidden = true;
      preview.src = 'about:blank';
    }

    document.querySelectorAll('.roteiro-9 button').forEach((btn) => {
      btn.classList.remove('active');
    });

    if (button) {
      button.classList.add('active');
    }
  } catch (error) {
    example.textContent = error.message;
    output.textContent = 'Não foi possível conectar à API.';
    output.hidden = false;
    preview.hidden = true;
    console.error(error);
  }
}

switchExemple(
  `${CONFIG.API_URL}/roteiro-9/exemplos/1`,
  document.querySelector('.roteiro-9 button'),
);
