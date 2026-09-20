import { LocalStorage } from '../../utils/storage.js';

const formTarefa = document.getElementById('tasks-form');
const inputTarefa = document.getElementById('task-input');
const listaTarefas = document.getElementById('tasks-list');

const erroMsg = document.getElementById('error-msg');
const btnLimpar = document.getElementById('btn-limpar');

const themeButton = document.getElementById('theme-button');

// Estado inicial da Aplicação
let tarefas = JSON.parse(localStorage.getItem('tarefas_app')) || [];

const savedTheme = LocalStorage.get('dark_theme');
document.body.classList.toggle('dark-theme', savedTheme == 'true');

function carregarTema() {
  const eEscuro = JSON.parse(localStorage.getItem('dark_theme'));
  if (eEscuro) {
    document.body.classList.add('dark-theme');
  }
}

// Functions --------------------------------------------------
function adicionarTarefa() {
  const texto = inputTarefa.value.trim();

  if (texto === '') {
    erroMsg.textContent = 'Por favor, digite uma descrição para a tarefa.';
    erroMsg.style.display = 'block';
    return;
  }

  erroMsg.textContent = '';
  erroMsg.style.display = 'none';

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
    listaTarefas.innerHTML = '<li><small class="no-task">Nenhuma tarefa cadastrada.</small></li>';
    return;
  }

  tarefas.forEach((t) => {
    const li = document.createElement('li');
    li.className = 'list-row flex-row items-center justify-between';
    if (t.concluida) li.classList.add('concluida');

    const span = document.createElement('span');
    span.textContent = t.texto;
    span.addEventListener('click', () => alternarStatus(t.id));

    const btnExcluir = document.createElement('button');
    btnExcluir.textContent = 'Excluir';
    btnExcluir.className = 'button default sm btn-danger';
    btnExcluir.addEventListener('click', () => removerTarefa(t.id));

    li.appendChild(span);
    li.appendChild(btnExcluir);
    listaTarefas.appendChild(li);
  });
}

// 1. Inicialização --------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {
  carregarTema();
  renderizarTarefas();
});

// 2. Escutadores de Eventos --------------------------------------------------
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

themeButton.addEventListener('click', () => {
  document.body.classList.toggle('dark-theme');
  const isDark = document.body.classList.contains('dark-theme');
  LocalStorage.set('dark_theme', isDark);
});
