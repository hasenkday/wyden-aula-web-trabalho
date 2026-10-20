<?php

use Roteiro7\Exemplos\ExemplosModule as Roteiro7_ExemplosModule;
use Roteiro7\Exercicios\ExerciciosModule as Roteiro7_Exercicios7Module;
use Roteiro8\Exemplos\ExemplosModule as Roteiro8_Exemplos8Module;
use Roteiro8\Exercicios\ExerciciosModule as Roteiro8_Exercicios8Module;

require_once __DIR__ . '/middleware.php';
require_once __DIR__ . '/responses.php';

require_once __DIR__ . '/roteiro-7/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-7/exercicios/exercicios.module.php';
require_once __DIR__ . '/roteiro-8/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-8/exercicios/exercicios.module.php';

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
        $module = new Roteiro7_Exercicios7Module();
        $module->handle($path, $method);
        exit;
    }

    if (preg_match('#^/roteiro-8/exemplos(?:/\d+)?$#', $path)) {
        $module = new Roteiro8_Exemplos8Module();
        $module->handle($path, $method);
        exit;
    }
    
    if (preg_match('#^/roteiro-8/exercicios(?:/\d+)?$#', $path)) {
        $module = new Roteiro8_Exercicios8Module();
        $module->handle($path, $method);
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