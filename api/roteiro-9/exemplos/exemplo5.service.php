<?php

namespace Roteiro9\Exemplos;

class Exemplo5Service
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
