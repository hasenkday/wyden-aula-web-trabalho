<?php

namespace Roteiro9\Exemplos;

class Exemplo3Service
{
    public function executar(): array
    {
        return [
            'source' => file_get_contents(__DIR__ . '/exemplo3.php'),
            'output' => '/roteiro-9/paginas/exemplo3',
            'type' => 'iframe',
        ];
    }
}
