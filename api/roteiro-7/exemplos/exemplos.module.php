<?php

require_once __DIR__ . '/exemplos.controller.php';

class ExemplosModule
{
    public function handle(string $path, string $method): void
    {
        if (preg_match('#^/roteiro-7/exemplos/(\d+)$#', $path, $matches)) {
            $controller = new ExemplosController();
            $controller->executar((int) $matches[1], $method);
            return;
        }

        ApiResponse::error('Rota de exemplos não encontrada.', 404);
    }
}
