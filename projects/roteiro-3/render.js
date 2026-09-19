import { Exemplo1 } from './exemplo1.js';
import { Exemplo2 } from './exemplo2.js';
import { Exemplo3 } from './exemplo3.js';
import { Exemplo4 } from './exemplo4.js';
import { Exemplo5 } from './exemplo5.js';
import { Exemplo6 } from './exemplo6.js';
import { Exemplo7 } from './exemplo7.js';
import { Exemplo8 } from './exemplo8.js';
import { Exemplo9 } from './exemplo9.js';
import { Exemplo10 } from './exemplo10.js';

const EXAMPLES_ENUM = {
  1: Exemplo1,
  2: Exemplo2,
  3: Exemplo3,
  4: Exemplo4,
  5: Exemplo5,
  6: Exemplo6,
  7: Exemplo7,
  8: Exemplo8,
  9: Exemplo9,
  10: Exemplo10,
};
document.querySelector('#playground').innerHTML = EXAMPLES_ENUM[1]();

const container = document.querySelector('#examples-container');
container.addEventListener('click', (event) => {
  const targetButton = event.target.closest('.button');
  if (!targetButton) return;

  container.querySelectorAll('.button').forEach((button) => button.classList.remove('active'));
  targetButton.classList.add('active');

  const targetExample = targetButton.dataset.example;
  const useExample = EXAMPLES_ENUM[targetExample];
  if (useExample) {
    document.querySelector('#playground').innerHTML = useExample();
  }
});
