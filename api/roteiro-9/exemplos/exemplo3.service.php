<?php

namespace Roteiro9\Exemplos;

class Exemplo3Service
{
    public function executar(): array
    {
        $output = "Não feito ainda";

        return [
            'source' => file_get_contents(__FILE__),
            'output' => $output,
        ];
    }
}
