// 1) Variáveis
function ex1() {
  const nome = 'Ana'; // string
  let idade = 20; // number
  const estudante = true; // boolean
  idade = idade + 1;
  const msg = `nome=${nome} (string)\nidade=${idade} (number)\nestudante=${estudante} (boolean)`;
  document.getElementById('output-variaveis').textContent = msg;
  console.log('[Variáveis]', { nome, idade, estudante });
}

// 2) Entrada/Saída
function ex2() {
  const nome = prompt('Qual é o seu nome?');
  if (!nome) return alert('Sem nome, sem festa! :)');
  alert('Olá, ' + nome + '!');
  console.log('Usuário digitou:', nome);
}

// 3) Decisão
function ex3() {
  const idade = Number(document.getElementById('idade').value);
  let texto;
  if (Number.isNaN(idade)) {
    texto = 'Digite um número válido.';
  } else if (idade >= 18) {
    texto = 'Maior de idade.';
  } else {
    texto = 'Menor de idade.';
  }
  document.getElementById('output-if').textContent = texto;
}

// 4) Laços
function ex4For() {
  let s = 'Contando 1→5 (for): ';
  for (let i = 1; i <= 5; i++) s += i + ' ';
  document.getElementById('output-loops').textContent = s.trim();
}
function ex4While() {
  let s = 'Contando 5→1 (while): ';
  let i = 5;
  while (i >= 1) {
    s += i + ' ';
    i--;
  }
  document.getElementById('output-loops').textContent = s.trim();
}

// 5) Arrays
function ex5() {
  const frutas = ['maçã', 'banana', 'uva', 'melão'];
  let s = 'Frutas: ';
  for (const f of frutas) s += f + ' | ';
  document.getElementById('output-array').textContent = s.slice(0, -3);
  console.log('frutas.length =', frutas.length);
}

// 6) Funções
function soma(a, b) {
  return a + b;
}
function ex6() {
  const a = Number(document.getElementById('a').value);
  const b = Number(document.getElementById('b').value);
  if (Number.isNaN(a) || Number.isNaN(b)) {
    document.getElementById('output-funcao').textContent = 'Digite números válidos.';
    return;
  }
  document.getElementById('output-funcao').textContent = `Resultado: ${soma(a, b)}`;
}

// 7) DOM + eventos (calculadora)
function calc(op) {
  const n1 = Number(document.getElementById('n1').value);
  const n2 = Number(document.getElementById('n2').value);
  if (Number.isNaN(n1) || Number.isNaN(n2)) {
    document.getElementById('output-calc').textContent = 'Digite números válidos.';
    return;
  }
  let r;
  if (op === '+') r = n1 + n2;
  else if (op === '-') r = n1 - n2;
  else if (op === '*') r = n1 * n2;
  else if (op === '/') r = n2 === 0 ? '∞ (divisão por zero)' : n1 / n2;
  document.getElementById('output-calc').textContent = `Resultado: ${r}`;
}

// 8) Mini-jogo de adivinhação
let segredo = Math.floor(Math.random() * 10) + 1;
let tentativas = 0;

function tentar() {
  const p = Number(document.getElementById('palpite').value);
  if (Number.isNaN(p) || p < 1 || p > 10) {
    document.getElementById('output-game').textContent = 'Digite um número de 1 a 10.';
    return;
  }
  tentativas++;
  if (p === segredo) {
    document.getElementById('output-game').textContent =
      `Acertou! O número era ${segredo}. Tentativas: ${tentativas}.`;
  } else if (p < segredo) {
    document.getElementById('output-game').textContent = 'Tente um número MAIOR.';
  } else {
    document.getElementById('output-game').textContent = 'Tente um número MENOR.';
  }
}

function reiniciar() {
  segredo = Math.floor(Math.random() * 10) + 1;
  tentativas = 0;
  document.getElementById('output-game').textContent = 'Novo jogo iniciado!';
  document.getElementById('palpite').value = '';
}
