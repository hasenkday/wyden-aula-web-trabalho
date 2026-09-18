// Captura de Elementos do DOM
const formTarefa = document.getElementById('form-tarefa');
const inputTarefa = document.getElementById('input-tarefa');
const listaTarefas = document.getElementById('lista-tarefas');
const erroMsg = document.getElementById('erro-msg');
const btnLimpar = document.getElementById('btn-limpar');
const btnTema = document.getElementById('btn-tema');

// Estado da Aplicação
let tarefas = JSON.parse(localStorage.getItem('tarefas_app')) || [];

// 1. Inicialização
document.addEventListener('DOMContentLoaded', () => {
  carregarTema();
  renderizarTarefas();
});

// 2. Escutadores de Eventos (addEventListener)
formTarefa.addEventListener('submit', (e) => {
  e.preventDefault(); // Impede o recarregamento da página
  adicionarTarefa();
});

btnLimpar.addEventListener('click', () => {
  if (confirm('Tem certeza que deseja apagar todas as tarefas?')) {
    tarefas = [];
    salvarERenderizar();
  }
});

btnTema.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
  const eEscuro = document.body.classList.contains('dark-mode');
  localStorage.setItem('tema_escuro', eEscuro);
});

// 3. Funções Práticas
function adicionarTarefa() {
  const texto = inputTarefa.value.trim();

  if (texto === '') {
    erroMsg.textContent = 'Por favor, digite uma descrição para a tarefa.';
    return;
  }

  erroMsg.textContent = '';

  const novaTarefa = {
    id: Date.now(),
    texto: texto,
    concluida: false,
  };

  tarefas.push(novaTarefa);
  salvarERenderizar();
  inputTarefa.value = '';
  inputTarefa.focus();
}

function alternarStatus(id) {
  tarefas = tarefas.map((t) => {
    if (t.id === id) t.concluida = !t.concluida;
    return t;
  });
  salvarERenderizar();
}

function removerTarefa(id) {
  tarefas = tarefas.filter((t) => t.id !== id);
  salvarERenderizar();
}

function salvarERenderizar() {
  localStorage.setItem('tarefas_app', JSON.stringify(tarefas));
  renderizarTarefas();
}

function renderizarTarefas() {
  listaTarefas.innerHTML = '';

  if (tarefas.length === 0) {
    listaTarefas.innerHTML = '<li><small>Nenhuma tarefa cadastrada.</small></li>';
    return;
  }

  tarefas.forEach((t) => {
    const li = document.createElement('li');
    if (t.concluida) li.classList.add('concluida');

    const span = document.createElement('span');
    span.textContent = t.texto;
    span.addEventListener('click', () => alternarStatus(t.id));

    const btnExcluir = document.createElement('button');
    btnExcluir.textContent = 'Excluir';
    btnExcluir.className = 'btn-remove';
    btnExcluir.addEventListener('click', () => removerTarefa(t.id));

    li.appendChild(span);
    li.appendChild(btnExcluir);
    listaTarefas.appendChild(li);
  });
}

function carregarTema() {
  const eEscuro = JSON.parse(localStorage.getItem('tema_escuro'));
  if (eEscuro) {
    document.body.classList.add('dark-mode');
  }
}
