<?php

use Roteiro7\Exemplos\ExemplosModule as Roteiro7_ExemplosModule;
use Roteiro7\Exercicios\ExerciciosModule as Roteiro7_ExerciciosModule;
use Roteiro8\Exemplos\ExemplosModule as Roteiro8_ExemplosModule;
use Roteiro8\Exercicios\ExerciciosModule as Roteiro8_ExerciciosModule;
use Roteiro9\Exemplos\ExemplosModule as Roteiro9_ExemplosModule;
use Roteiro9\Exercicios\ExerciciosModule as Roteiro9_ExerciciosModule;

require_once __DIR__ . '/middleware.php';
require_once __DIR__ . '/responses.php';

require_once __DIR__ . '/roteiro-7/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-7/exercicios/exercicios.module.php';
require_once __DIR__ . '/roteiro-8/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-8/exercicios/exercicios.module.php';
require_once __DIR__ . '/roteiro-9/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-9/exercicios/exercicios.module.php';

CorsMiddleware::handle();

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (preg_match('#^/roteiro-7/exemplos(?:/\d+)?$#', $path)) {
        $module = new Roteiro7_ExemplosModule();
        $module->handle($path, $method);
        exit;
    }
    
    if (preg_match('#^/roteiro-7/exercicios(?:/\d+)?$#', $path)) {
        $module = new Roteiro7_ExerciciosModule();
        $module->handle($path, $method);
        exit;
    }

    if (preg_match('#^/roteiro-8/exemplos(?:/\d+)?$#', $path)) {
        $module = new Roteiro8_ExemplosModule();
        $module->handle($path, $method);
        exit;
    }
    
    if (preg_match('#^/roteiro-8/exercicios(?:/\d+)?$#', $path)) {
        $module = new Roteiro8_ExerciciosModule();
        $module->handle($path, $method);
        exit;
    }

    if (preg_match('#^/roteiro-9/exemplos(?:/\d+)?$#', $path)) {
        $module = new Roteiro9_ExemplosModule();
        $module->handle($path, $method);
        exit;
    }

    if (preg_match('#^/roteiro-9/exercicios(?:/\d+)?$#', $path)) {
        $module = new Roteiro9_ExerciciosModule();
        $module->handle($path, $method);
        exit;
    }

    if (preg_match(
        '#^/roteiro-9/paginas/(exemplo|exercicio)(\d+)$#',
        $path,
        $matches
    )) {
        if ($method !== 'GET') {
            header('Allow: GET');
            ApiResponse::error('Método não permitido.', 405);
            exit;
        }

        $tipo = $matches[1] === 'exemplo' ? 'exemplos' : 'exercicios';
        $arquivo = __DIR__ . "/roteiro-9/{$tipo}/{$matches[1]}{$matches[2]}.php";

        if (!is_file($arquivo)) {
            ApiResponse::error('Página não encontrada.', 404);
            exit;
        }

        header('Content-Type: text/html; charset=utf-8');
        require $arquivo;
        exit;
    }

    ApiResponse::error('Rota não encontrada.', 404);

} catch (\Throwable $e) {
    ApiResponse::error([
        'message' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
        'trace' => explode("\n", $e->getTraceAsString()),
    ], 500);
}