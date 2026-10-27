<?php

namespace Roteiro9\Exercicios;

class Exercicio2Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exercicio2.php'),
            'output' => '/roteiro-9/paginas/exercicio2',
            'type' => 'iframe',
        ];
    }
}
