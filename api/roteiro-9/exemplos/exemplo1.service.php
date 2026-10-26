<?php

namespace Roteiro9\Exemplos;

class Exemplo1Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exemplo1.php'),
            'output' => '/roteiro-9/paginas/exemplo1',
            'type' => 'iframe',
        ];
    }
}
