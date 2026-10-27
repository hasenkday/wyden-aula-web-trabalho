<?php

namespace Roteiro9\Exercicios;

class Exercicio3Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exercicio3.php'),
            'output' => '/roteiro-9/paginas/exercicio3',
            'type' => 'iframe',
        ];
    }
}
