
<?php

require_once __DIR__ . '/responses.php';
require_once __DIR__ . '/middleware.php';
require_once __DIR__ . '/roteiro-7/exemplos/exemplos.module.php';
// require_once __DIR__ . '/roteiro-7/exercicios/exercicios.module.php';

header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

CorsMiddleware::handle();

// Trata CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (preg_match('#^/roteiro-7/exemplos(?:/\d+)?$#', $path)) {
        $module = new ExemplosModule();
        $module->handle($path, $method);
        exit;
    }

    ApiResponse::error('Rota não encontrada.', 404);

} catch (Throwable $e) {
    error_log($e);
    ApiResponse::error('Erro interno do servidor.', 500);
}