<?php

require_once __DIR__ . '/exercicios.controller.php';

class Exercicios7Module
{
    public function handle(string $path, string $method): void
    {
        if (preg_match('#^/roteiro-7/exercicios/(\d+)$#', $path, $matches)) {
            $controller = new ExerciciosController();
            $controller->executar((int) $matches[1], $method);
            return;
        }

        ApiResponse::error('Rota de exercicios não encontrada.', 404);
    }
}
