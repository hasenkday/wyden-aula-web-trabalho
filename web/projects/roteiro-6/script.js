document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('space-container');
  const ship = document.getElementById('enterprise-ship');

  // 1. Seguir o mouse verticalmente para posicionar a nave
  container.addEventListener('mousemove', (e) => {
    const rect = container.getBoundingClientRect();
    const relativeY = e.clientY - rect.top;

    // Ajustar para manter o centro da nave próximo ao mouse verticalmente
    let targetY = relativeY - 60;
    if (targetY < 10) targetY = 10;
    if (targetY > 260) targetY = 260;

    ship.style.top = targetY + 'px';
  });

  // 2. Evento de clique para disparar
  container.addEventListener('mousedown', (e) => {
    const rect = container.getBoundingClientRect();
    const clickX = e.clientX - rect.left;
    const clickY = e.clientY - rect.top;

    // Posição de origem aproximada dos lasers (frente da nave)
    const shipTop = parseFloat(ship.style.top) || 100;
    const startX = 380;
    const startY = shipTop + 35; // Alinhado com a parte frontal superior
    const startY2 = shipTop + 45; // Alinhado com a parte frontal inferior

    criarLaser(startX, startY, clickX, clickY);
    criarLaser(startX, startY2, clickX, clickY);
  });

  // 3. Função para instanciar e animar os disparos
  function criarLaser(x, y, targetX, targetY) {
    const laser = document.createElement('div');
    laser.classList.add('laser');
    laser.style.left = x + 'px';
    laser.style.top = y + 'px';

    // Calcular ângulo matemático em direção ao clique do mouse
    const angle = Math.atan2(targetY - y, targetX - x);
    laser.style.transform = `rotate(${angle}rad)`;

    container.appendChild(laser);

    // Animar o laser indo até o final da tela na direção do ângulo
    const speed = 15;
    let currentX = x;
    let currentY = y;
    const cos = Math.cos(angle);
    const sin = Math.sin(angle);

    function mover() {
      currentX += speed * cos;
      currentY += speed * sin;
      laser.style.left = currentX + 'px';
      laser.style.top = currentY + 'px';

      // Remove o elemento da memória se sair dos limites do container
      if (
        currentX > container.clientWidth ||
        currentX < 0 ||
        currentY > container.clientHeight ||
        currentY < 0
      ) {
        laser.remove();
      } else {
        requestAnimationFrame(mover);
      }
    }
    requestAnimationFrame(mover);
  }
});
