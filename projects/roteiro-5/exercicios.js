// EXERCÍCIOS (ENTREGÁVEIS)

// 1. **Contador de Tarefas**: Crie um elemento `<p>` ou `<span>` que exiba no DOM quantas tarefas totais e quantas tarefas pendentes existem no momento.
// 2. **Filtro de Busca**: Adicione um campo `<input type="text">` para filtrar as tarefas exibidas na tela conforme o usuário digita (evento `input`).
// 3. **Edição de Tarefas**: Adicione um botão "Editar" ao lado de cada tarefa para permitir alterar a descrição de uma tarefa existente.
// 4. **Ordenação**: Adicione a opção de reordenar a lista colocando as tarefas concluídas ao final da lista.
// 5. **Data de Criação**: Adicione à estrutura do objeto da tarefa a data/hora em que ela foi criada e exiba esse valor formatado no item da lista.

// DICAS PEDAGÓGICAS

// * Utilize `JSON.stringify()` ao salvar dados estruturados (objetos/arrays) no `localStorage` e `JSON.parse()` ao recuperar.
// * Prefira usar `addEventListener` em vez de eventos inline no HTML para garantir uma arquitetura limpa e legível.
// * Trate sempre casos de listas vazias para entregar uma boa experiência ao usuário (UX).

// ------------------------------------------------------------------------------------------------------------------------------------------------------

// 1. **Contador de Tarefas** --------------------------------------------------
function isPlural(itemCount) {
  return itemCount > 1 ? 's' : '';
}

export function updateTasksCounter(tasks, element) {
  const count = tasks.length;

  if (count === null || count === undefined) return;

  const countCompleted = tasks.filter((item) => item.concluida).length;
  const countPending = tasks.filter((item) => !item.concluida).length;

  const completedTags = `<span class="tag-completed">${countCompleted} concluída${isPlural(countCompleted)}</span>`;
  const pendingTags = `<span class="tag-pending">${countPending} pendente${isPlural(countPending)}</span>`;

  if (count > 0) {
    element.innerHTML = `
      <div class="flex-row tasks-counter">
        ${countCompleted > 0 ? completedTags : ''} 
        ${countPending > 0 ? pendingTags : ''}
      </div>
    `;
  } else {
    element.innerHTML = '';
  }
}

// 2. **Filtro de Busca** --------------------------------------------------
export function searchFilter(list, typing, outputRender) {
  if (!list && list?.length === 0) return;

  if (typing.length > 0) {
    const filteredList = list.filter((item) => item.texto.includes(typing));
    if (filteredList && filteredList.length > 0) {
      return filteredList;
    } else {
      outputRender.innerHTML =
        '<li><small class="no-task">Nenhum item encontrado pelo filtro.</small></li>';
    }
  }

  if (typing.length === 0) {
    return list;
  }
}

// 3. **Edição de Tarefas** --------------------------------------------------
export function editTask() {}

// 4. **Ordenação** --------------------------------------------------
export function sortTasks(list, selectedOption) {
  const SORTERS_ENUM = {
    1: (a, b) => a.texto.localeCompare(b.texto), // AZ
    2: (a, b) => b.texto.localeCompare(a.texto), // ZA
    3: (a, b) => b.concluida - a.concluida, // Completed Up
    4: (a, b) => a.concluida - b.concluida, // Completed Down
    5: (a, b) => b.id - a.id, // Creation Up
    6: (a, b) => a.id - b.id, // Creation Down
  };

  const chosenSortFunction = SORTERS_ENUM[selectedOption];

  if (!chosenSortFunction) return list;
  return [...list.sort(chosenSortFunction)];
}

// 5. **Data de Criação** --------------------------------------------------
export function formatDate(date) {
  return Intl.DateTimeFormat('en-GB', {
    day: '2-digit',
    month: '2-digit',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
    hour12: false,
  })
    .format(date)
    .replace(',', '');
}
