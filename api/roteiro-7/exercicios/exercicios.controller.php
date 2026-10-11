<?php

require_once __DIR__ . '/exercicio1.service.php';

class ExerciciosController
{
    public function executar(int $numero, string $method): void
    {
        if ($method !== 'GET') {
            ApiResponse::error('Método não permitido.', 405);
            return;
        }

        $service = match ($numero) {
            1 => new Exercicio1Service(),
            default => null,
        };

        if ($service === null) {
            ApiResponse::error('Exercício não encontrado.', 404);
            return;
        }

        ApiResponse::success($service->executar());
    }
}
