<?php
// 2. Cálculo de Fatorial com Laço While:

// Escreva um algoritmo em PHP que calcule o fatorial de 
//   um número inteiro (exemplo: 5! = 5 * 4 * 3 * 2 * 1 = 120) 
//   utilizando o laço de repetição while.

class Exercicio2Service
{
    function CalcularFatorial(int $numero) {
        $fatorial = 1;

        for ($i = $numero; $i >= 1; $i--) {
            $fatorial *= $i;
        }
        
        return $fatorial;
    }

    public function executar(): array
    {

        $output = "Fatorial de 5: \n";
        $output .= $this->CalcularFatorial(5);

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
