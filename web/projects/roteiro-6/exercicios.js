// EXERCÍCIOS (ENTREGÁVEIS)

// 1. **Contador de Disparos:** Crie um elemento `<p>` ou `<span>` que exiba no DOM quantos disparos de laser a Enterprise já realizou na sessão atual.
// 2. **Inimigo Estático (Alvo):** Adicione uma `div` contendo um símbolo Klingon ou um meteoroide no lado direito do container.
// 3. **Detecção de Colisão Básica:** Tente criar uma lógica dentro do `requestAnimationFrame` que verifica se o posicionamento X/Y do laser coincide com as coordenadas da div do inimigo. Se colidir, esconda o inimigo e destrua o laser.
// 4. **Persistência do Score:** Use os conhecimentos do Roteiro 5 para salvar a pontuação mais alta alcançada (High Score) usando o `localStorage`.

// DICAS PEDAGÓGICAS

// * A função `requestAnimationFrame()` é a maneira mais eficiente para criar animações no JavaScript moderno, evitando os gargalos de performance que métodos como o `setInterval()` poderiam causar.
// * Prefira usar `addEventListener` em vez de eventos inline no HTML para garantir uma arquitetura limpa e legível.

// * É fundamental remover o elemento (`laser.remove()`) assim que ele ultrapassar as dimensões do container, caso contrário ocorrerá o que chamamos de vazamento de memória (*memory leak*).
