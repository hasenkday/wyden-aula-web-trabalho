<?php
// ETAPA 3: LAÇOS DE REPETIÇÃO E CONTROLE DE FLUXO

// Conceito:

// * for: Utilizado quando o número de iterações é previamente determinado.
// * while: Repete um bloco enquanto a condição for verdadeira (valida antes).
// * do...while: Executa o bloco ao menos uma vez antes de testar a condição.
// * foreach: Estrutura especializada na varredura de arrays/vetores.
// * break: Interrompe e encerra o laço de repetição imediatamente.
// * continue: Pula a iteração atual e avança para a próxima.

class Exemplo3Service
{
    public function executar(): array
    {
        $output = "Contagem com FOR:\n";
        for ($i = 1; $i <= 3; $i++) {
            $output .= "Número: $i\n";
        }

        // While com Break e Continue
        $output .= "\nContagem com WHILE:\n";
        $contador = 0;
        while ($contador < 15) {
            $contador++;
            if ($contador == 3) {
                $output .= "Pulando o 3...\n";
                continue; // Pula a iteração
            }
            if ($contador == 8) {
                $output .= "Parando no 8!\n";
                break; // Interrompe o laço
            }
            $output .= "Contador: $contador\n";
        }

        // Foreach
        $output .= "\nLista com FOREACH:\n";
        $tecnologias = ["HTML", "CSS", "PHP"];
        foreach ($tecnologias as $tec) {
            $output .= "- $tec\n";
        }

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
