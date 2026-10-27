<?php

namespace Roteiro9\Exemplos;

class Exemplo2Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exemplo2.php'),
            'output' => '/roteiro-9/paginas/exemplo2',
            'type' => 'iframe',
        ];
    }
}
