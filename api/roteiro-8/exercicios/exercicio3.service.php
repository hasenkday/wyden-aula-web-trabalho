<?php
// 3. Separador de Números Pares e Ímpares:

// Dado o vetor de números [12, 5, 8, 21, 34, 7, 19, 40], 
//   utilize um laço foreach e o operador de módulo (%) 
//   para separar e exibir quais números são PARES e quais 
//   são ÍMPARES.

class Exercicio3Service
{
    public function executar(): array
    {
        $vetor = [12, 5, 8, 21, 34, 7, 19, 40];

        $vetor_pares = [];
        $vetor_impares = [];

        foreach ($vetor as $v) {
            if ($v % 2 == 0){
                $vetor_pares[] = $v;
            } else {
                $vetor_impares[] = $v;
            }
        }

        $output = 'Pares: [' . implode(', ', $vetor_pares) . "]\n";
        $output .= 'Ímpares: [' . implode(', ', $vetor_impares) . ']';

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
