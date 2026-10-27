<?php

namespace Roteiro9\Exercicios;

class Exercicio1Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exercicio1.php'),
            'output' => '/roteiro-9/paginas/exercicio1',
            'type' => 'iframe',
        ];
    }
}
