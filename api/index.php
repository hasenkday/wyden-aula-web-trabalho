<?php

require_once __DIR__ . '/middleware.php';

CorsMiddleware::handle();

require_once __DIR__ . '/responses.php';
require_once __DIR__ . '/roteiro-7/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-7/exercicios/exercicios.module.php';
require_once __DIR__ . '/roteiro-8/exemplos/exemplos.module.php';
require_once __DIR__ . '/roteiro-8/exercicios/exercicios.module.php';

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (preg_match('#^/roteiro-7/exemplos(?:/\d+)?$#', $path)) {
        $module = new Exemplos7Module();
        $module->handle($path, $method);
        exit;
    }
    
    if (preg_match('#^/roteiro-7/exercicios(?:/\d+)?$#', $path)) {
        $module = new Exercicios7Module();
        $module->handle($path, $method);
        exit;
    }s

    if (preg_match('#^/roteiro-8/exemplos(?:/\d+)?$#', $path)) {
        $module = new Exemplos8Module();
        $module->handle($path, $method);
        exit;
    }
    
    if (preg_match('#^/roteiro-8/exercicios(?:/\d+)?$#', $path)) {
        $module = new Exercicios8Module();
        $module->handle($path, $method);
        exit;
    }

    ApiResponse::error('Rota não encontrada.', 404);

} catch (Throwable $e) {
    error_log($e);
    ApiResponse::error('Erro interno do servidor.', 500);
}