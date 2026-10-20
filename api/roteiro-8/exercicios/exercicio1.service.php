<?php

namespace Roteiro8\Exercicios;

class Exercicio1Service
{
    public function executar(): array
    {
        $output = 'Ainda não foi feito.';

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
