export function Exemplo2() {
  return `
        <h3>Diversas Caixinhas</h3>
        <div class="box-container">
            <div class="caixa">Caixa 1</div>
            <div class="caixa">Caixa 2</div>
            <div class="caixa">Caixa 3</div>
        </div>

        <style>
            .box-container {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            .caixa {
                width: 200px;
                height: 100px;
                background-color: lightblue;
                border: 2px solid black;
                text-align: center;
                line-height: 100px;
            }
        </style>
    `;
}
