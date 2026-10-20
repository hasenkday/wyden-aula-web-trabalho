<?php

namespace Roteiro7\Exercicios;

require_once __DIR__ . '/exercicio1.service.php';
require_once __DIR__ . '/exercicio2.service.php';
require_once __DIR__ . '/exercicio3.service.php';
require_once __DIR__ . '/exercicio4.service.php';

class ExerciciosController
{
    public function executar(int $numero, string $method): void
    {
        if ($method !== 'GET') {
            \ApiResponse::error('Método não permitido.', 405);
            return;
        }

        $service = match ($numero) {
            1 => new Exercicio1Service(),
            2 => new Exercicio2Service(),
            3 => new Exercicio3Service(),
            4 => new Exercicio4Service(),
            default => null,
        };

        if ($service === null) {
            \ApiResponse::error('Exercício não encontrado.', 404);
            return;
        }

        \ApiResponse::success($service->executar());
    }
}
