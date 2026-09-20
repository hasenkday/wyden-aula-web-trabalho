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
import { LocalStorage } from '../../utils/storage.js';

export function updateTasksCounter(tasks, element) {
  const count = tasks.length;

  if (count === null || count === undefined) return;

  if (count > 0) {
    element.textContent = `(${count})`;
  } else {
    element.textContent = '';
  }
}
