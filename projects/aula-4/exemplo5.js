function Exemplo5() {
  return `
        <h3>Bordas Arredondadas</h3>
        <div class="caixa">Sou arredondada!</div>
        <div class="caixa2">Sou mais arredondada!</div>

        <style>
           .caixa {
                width: 200px;
                height: 100px;
                background-color: lightgreen;
                border-radius: 20px;
                text-align: center;
                line-height: 100px;
            }

            .caixa2 {
                width: 200px;
                height: 200px;
                background-color: lightgreen;
                border-radius: 50%;
                text-align: center;
                line-height: 200px;
            }
        </style>
    `;
}
