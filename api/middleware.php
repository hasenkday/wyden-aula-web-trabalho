<?php

class CorsMiddleware
{
    public static function handle(): void
    {
        $origins = 'http://localhost:5500,http://127.0.0.1:5500,https://wyden-nadiahase.netlify.app';

        $allowedOrigins = array_map(
            'trim',
            explode(',', $origins)
        );

        $origin = $_SERVER['HTTP_ORIGIN'] ?? '';

        if ($origin !== '' && in_array($origin, $allowedOrigins, true)) {
            header("Access-Control-Allow-Origin: $origin");
            header('Vary: Origin');
        }

        header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(204);
            exit;
        }
    }
}
