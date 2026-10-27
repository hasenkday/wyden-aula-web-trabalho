<?php

namespace Roteiro9\Exemplos;

class Exemplo4Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exemplo4.php'),
            'output' => '/roteiro-9/paginas/exemplo4',
            'type' => 'iframe',
        ];
    }
}
