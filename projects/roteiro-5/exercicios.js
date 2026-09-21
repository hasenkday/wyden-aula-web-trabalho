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
export function updateTasksCounter(tasks, element) {
  const count = tasks.length;

  if (count === null || count === undefined) return;

  if (count > 0) {
    element.textContent = `(${count})`;
  } else {
    element.textContent = '';
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
export function orderByAZ() {}
export function orderByZA() {}
export function orderByStatusUp() {}
export function orderByStatusDown() {}
export function orderByCreationUp() {}
export function orderByCreationDown() {}

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
