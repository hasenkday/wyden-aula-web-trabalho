function Exemplo9() {
  return `
        <h3>Efeito Hover</h3>
        <div class="caixa">Passe o mouse!</div>

        <style>
            .caixa {
                width: 150px;
                height: 100px;
                background-color: lightgreen;
                transition: 0.3s;
                text-align: center;
                line-height: 100px;
                transition: all 200ms ease-out;
            }
            .caixa:hover {
                background-color: darkgreen;
                color: white;
                transform: scale(1.2) translateX(15px) translateY(15px);
            }
        </style>
    `;
}
