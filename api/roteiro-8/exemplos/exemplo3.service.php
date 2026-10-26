<?php
// ETAPA 3: MANIPULAÇÃO DE ELEMENTOS COMPLEXOS DE FORMULÁRIO (RADIOS, CHECKBOXES E SELECTS)

// * Campos do tipo Text e Radio Buttons: Transmitem um valor escalar único (String ou Número).
// * Checkboxes e Selects Múltiplos: Permitem selecionar uma ou mais opções simultaneamente. No atributo `name` do HTML, devem utilizar colchetes (ex: `interesses[]`) para que o PHP receba os dados como um array.
// * Processamento de Arrays: Tratamento de opções selecionadas utilizando laços de repetição como `foreach` ou funções auxiliares como `implode()`.

namespace Roteiro8\Exemplos;

class Exemplo3Service
{
    public function executar(): array
    {
        // Simulação de dados enviados por campos do tipo Radio e Checkbox
        $_POST['plano'] = "Premium"; // Radio Button (valor único)
        $_POST['tecnologias'] = ["HTML5", "CSS3", "PHP", "JavaScript"]; // Checkboxes (array)

        $plano = $_POST['plano'] ?? 'Básico';
        $tecnologias = $_POST['tecnologias'] ?? [];

        $output = "=== PREFERÊNCIAS DO USUÁRIO ===\n";
        $output .= "Plano Selecionado: $plano\n";

        $output .= "Tecnologias de Interesse:\n";
        if (!empty($tecnologias) && is_array($tecnologias)) {
            foreach ($tecnologias as $tech) {
                $output .= "- " . htmlspecialchars($tech) . "\n";
            }
            // Formatação em lista separada por vírgulas
            $output .= "Resumo em linha: " . implode(", ", $tecnologias) . "\n";
        } else {
            $output .= "Nenhuma tecnologia foi selecionada.\n";
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
