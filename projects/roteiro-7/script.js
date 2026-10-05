async function switchExemple(filePath, button) {
  const example = document.getElementById('playground-example');
  const output = document.getElementById('playground-output');

  const response = await fetch(filePath);
  const code = await response.text();

  example.textContent = code;
  output.data = filePath;

  document.querySelectorAll('.roteiro-7 button').forEach((btn) => btn.classList.remove('active'));

  if (button) {
    button.classList.add('active');
  }
}

switchExemple(
  './projects/roteiro-7/exemplos/exemplo1.php',
  document.querySelector('.roteiro-7 button'),
);
