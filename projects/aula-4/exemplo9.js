function Exemplo9() {
  return `
        <h3>Efeito Hover</h3>
        <div class="caixa">Passe o mouse!</div>

        <style>
            .caixa {
                width: 150px;
                height: 100px;
                background-color: lightblue;
                transition: 0.3s;
                text-align: center;
                line-height: 100px;
            }
            .caixa:hover {
                background-color: darkblue;
                color: white;
                transform: scale(1.1);
            }
        </style>
    `;
}
