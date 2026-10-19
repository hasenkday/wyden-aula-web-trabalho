<?php

require_once __DIR__ . '/exemplo1.service.php';
require_once __DIR__ . '/exemplo2.service.php';
require_once __DIR__ . '/exemplo3.service.php';
require_once __DIR__ . '/exemplo4.service.php';
require_once __DIR__ . '/exemplo5.service.php';

class Exemplos8Controller
{
    public function executar(int $numero, string $method): void
    {
        if ($method !== 'GET') {
            ApiResponse::error('Método não permitido.', 405);
            return;
        }

        $service = match ($numero) {
            1 => new Exemplo1Service(),
            2 => new Exemplo2Service(),
            3 => new Exemplo3Service(),
            4 => new Exemplo4Service(),
            5 => new Exemplo5Service(),
            default => null,
        };

        if ($service === null) {
            ApiResponse::error('Exemplo não encontrado.', 404);
            return;
        }

        ApiResponse::success($service->executar());
    }
}
