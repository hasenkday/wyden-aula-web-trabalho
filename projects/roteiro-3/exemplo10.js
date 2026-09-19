export function Exemplo10() {
  return `
        <h3>Responsivo</h3>
        <p class="text">
            Arraste a lateral da área abaixo para testar o comportamento responsivo.
        </p>

        <div class="box-container">
            <div class="boxes">
                <div class="caixa">
                    Muda conforme a área
                </div>
                <div class="caixa">
                    Muda conforme a área
                </div>
            </div>
        </div>

        <style>
            .box-container {
                width: 100%;
                max-width: 100%;
                min-width: 200px;
                height: 100%;
                resize: horizontal;
                overflow: auto;
                padding: 16px;

                border: 1px dashed var(--color-neutral-300);
                border-radius: 8px;

                container-type: inline-size;
            }

            .boxes {
                display: flex;
                gap: 8px;
            }

            .caixa {
                flex: 1;
                height: max-content;
                background-color: lightblue;
                border: 2px solid black;
                text-align: center;
                padding: 48px 20px;
            }

            .text {
                font-size: var(--font-size-small); 
                color: var(--color-text-muted)
            }

            @container (max-width: 200px) {
                .boxes {
                    flex-direction: column;
                }

                .caixa {
                    background-color: yellow;
                }
            }
        </style>
    `;
}
