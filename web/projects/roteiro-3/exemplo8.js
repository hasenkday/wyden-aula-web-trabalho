export function Exemplo8() {
  return `
        <h3>Caixas em Flexbox</h3>
        <div class="box-container">
            <div class="caixa">1</div>
            <div class="caixa">2</div>
            <div class="caixa">3</div>
        </div>

        <style>
            .box-container {
                display: flex;
                gap: 8px;
            }
            .caixa {
                flex: 1;
                height: 100px;
                background-color: lightcoral;
                text-align: center;
                line-height: 100px;
            }
        </style>
    `;
}
