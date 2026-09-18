// EXERCÍCIOS (ENTREGÁVEIS)
// 1) Maior de dois números via prompt (exiba no alert e no DOM).
//    Ficou confuso o enunciado, fiz os inputs e o resultado final
//    serem renderizados, mostrando também um alert reforçando.

// 2) Tabuada do 7 (mostre no DOM com quebras de linha).
//    Fiz uma tabuada generalizada onde pode inserir o número e gerá-la.

// 3) Filtrar nomes que começam com “A” em um array e exibí-los.
// 4) Função media(a,b,c): imprimir “Aprovado” se média ≥ 6; senão “Recuperação/Reprovado”.
// 5) Adicionar potência (**) na calculadora com botão dedicado.

// DICAS PEDAGÓGICAS
// - Use console.log() para investigar valores.
// - Validação: Number.isNaN() ao ler números de inputs.
// - Troque let por const quando uma variável não muda.

// ________________________________________________________________________________________
function exercise1() {
  const n1 = Number(document.getElementById('exercise1-n1').value);
  const n2 = Number(document.getElementById('exercise1-n2').value);
  let message = '';

  if (n1 > n2) {
    message = 'O ' + n1 + ' é maior que ' + n2;
  } else if (n2 > n1) {
    message = 'O ' + n2 + ' é maior que ' + n1;
  } else {
    message = 'O ' + n1 + ' e o ' + n2 + ' são iguais';
  }

  document.getElementById('output-exercise1').textContent = message;
  alert(message);
}

function exercise2() {
  const value = Number(document.getElementById('exercise2-value').value);
  let output = document.getElementById('output-exercise2');
  output.innerHTML = '';

  const tabuada = [];
  let mult = 0;

  for (let i = 0; i <= 10; i++) {
    mult = value * i;
    tabuada.push({ tabuada: value, mult: mult });

    output.innerHTML += `<p>${value} x ${i} = ${mult}</p>`;
  }

  console.table(tabuada);
}

function exercise3() {
  const name1 = document.getElementById('exercise3-name1').value;
  const name2 = document.getElementById('exercise3-name2').value;
  const name3 = document.getElementById('exercise3-name3').value;
  const name4 = document.getElementById('exercise3-name4').value;
  const name5 = document.getElementById('exercise3-name5').value;
  const name6 = document.getElementById('exercise3-name6').value;

  let names = [name1, name2, name3, name4, name5, name6];
  names = names.filter((name) => name.toUpperCase().startsWith('A'));

  console.log(names);
  document.getElementById('output-exercise3').textContent = names.join(', ');
}

function exercise4() {
  const nota1 = Number(document.getElementById('exercise4-n1').value);
  const nota2 = Number(document.getElementById('exercise4-n2').value);
  const nota3 = Number(document.getElementById('exercise4-n3').value);

  const media = (nota1 + nota2 + nota3) / 3;
  let result = '';

  if (media >= 6) {
    result = `Aprovado :D`;
  } else {
    result = `Reprovado :c`;
  }

  document.getElementById('output-exercise4').textContent =
    `Média: ${media.toFixed(1)} -> ${result}`;
}

function exercise5() {
  const base = Number(document.getElementById('exercise5-base').value);
  const expoente = Number(document.getElementById('exercise5-expoente').value);

  const numPotencia = base ** expoente;

  document.getElementById('output-exercise5').innerHTML =
    `${base}<sup>${expoente}</sup> = ${numPotencia}`;
}
