import { LocalStorage } from '../../utils/storage.js';
import { updateTasksCounter, searchFilter, formatDate, sortTasks, editTask } from './exercicios.js';

const formTarefa = document.getElementById('tasks-form');
const inputTarefa = document.getElementById('task-input');
const renderedTasksList = document.getElementById('tasks-list');
const taskCounter = document.getElementById('tasks-counter');
const taskFilter = document.getElementById('task-filter');
const sortTasksSelect = document.getElementById('sort-tasks');

const erroMsg = document.getElementById('error-msg');
const btnLimpar = document.getElementById('btn-limpar');

const themeButton = document.getElementById('theme-button');

// Estado inicial da Aplicação
let tarefas = JSON.parse(LocalStorage.get('tasksList')) || [];

const savedTheme = LocalStorage.get('darkTheme');
document.body.classList.toggle('dark-theme', savedTheme == 'true');

function carregarTema() {
  const eEscuro = JSON.parse(LocalStorage.get('darkTheme'));
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
  LocalStorage.set('tasksList', JSON.stringify(tarefas));

  const selectedOption = Number(sortTasksSelect.value);
  sortBySelectedOption(selectedOption);

  renderizarTarefas(tarefas);
  updateTasksCounter(tarefas, taskCounter);
}

function renderizarTarefas(list) {
  if (!list) return;

  renderedTasksList.innerHTML = '';

  if (list.length === 0) {
    renderedTasksList.innerHTML =
      '<li><small class="no-task">Nenhuma tarefa cadastrada.</small></li>';
    return;
  }

  list.forEach((item) => {
    const li = document.createElement('li');
    li.className = 'list-row flex-row items-center justify-between';
    li.id = `taskRow-${item.id}`;
    if (item.concluida) li.classList.add('concluida');

    const btnCheck = document.createElement('button');
    btnCheck.id = 'btnCheck';
    if (item.concluida) btnCheck.innerHTML = '<i class="fa-solid fa-square-check"></i>';
    else btnCheck.innerHTML = '<i class="fa-regular fa-square"></i>';
    btnCheck.className = 'button default icon';
    btnCheck.addEventListener('click', () => alternarStatus(item.id));

    const colTask = document.createElement('div');
    colTask.id = 'colTask';
    colTask.innerHTML = `<span>${item.texto}</span>`;

    const colCreationDate = document.createElement('span');
    colCreationDate.textContent = formatDate(item.id);
    colCreationDate.className = 'col-date';

    const btnEditar = document.createElement('button');
    btnEditar.id = 'btnEditar';
    btnEditar.innerHTML = '<i class="fa-solid fa-pencil"></i>';
    btnEditar.className = 'button default icon';
    btnEditar.addEventListener('click', () =>
      editTask(item.id, renderedTasksList, tarefas, renderizarTarefas, salvarERenderizar),
    );

    const btnExcluir = document.createElement('button');
    btnExcluir.id = 'btnExcluir';
    btnExcluir.innerHTML = '<i class="fa-solid fa-trash-can"></i>';
    btnExcluir.className = 'button default icon btn-danger';
    btnExcluir.addEventListener('click', () => removerTarefa(item.id));

    li.appendChild(btnCheck);
    li.appendChild(colTask);
    li.appendChild(colCreationDate);
    li.appendChild(btnEditar);
    li.appendChild(btnExcluir);
    renderedTasksList.appendChild(li);
  });
}

function sortBySelectedOption(selectedOption) {
  const sortList = sortTasks(tarefas, selectedOption);
  tarefas = sortList;
}
// 1. Inicialização --------------------------------------------------
document.addEventListener('DOMContentLoaded', () => {
  carregarTema();
  updateTasksCounter(tarefas, taskCounter);

  const selectedOption = Number(sortTasksSelect.value);
  sortBySelectedOption(selectedOption);

  renderizarTarefas(tarefas);
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
  LocalStorage.set('darkTheme', isDark);
});

taskFilter.addEventListener('input', (e) => {
  const text = e.target.value.toLowerCase();
  const filteredList = searchFilter(tarefas, text, renderedTasksList);
  renderizarTarefas(filteredList);
});

sortTasksSelect.addEventListener('change', (e) => {
  if (!e.target.value) return;

  const selectedOption = Number(e.target.value);
  sortBySelectedOption(selectedOption);
  salvarERenderizar();
});
