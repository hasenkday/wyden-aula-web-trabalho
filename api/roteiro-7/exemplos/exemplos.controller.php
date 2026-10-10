<?php

require_once __DIR__ . '/exemplo1.service.php';

class ExemplosController
{
    public function executar(int $numero, string $method): void
    {
        switch ($numero) {
            case 1:
                if ($method !== 'GET') {
                    ApiResponse::error('Método não permitido.', 405);
                    return;
                }

                $service = new Exemplo1Service();

                ApiResponse::success(
                    $service->executar()
                );
                return;

            default:
                ApiResponse::error('Exemplo não encontrado.', 404);
                return;
        }
    }
}
