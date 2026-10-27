<?php

namespace Roteiro9\Exemplos;

class Exemplo5Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exemplo5.php'),
            'output' => '/roteiro-9/paginas/exemplo5',
            'type' => 'iframe',
        ];
    }
}
