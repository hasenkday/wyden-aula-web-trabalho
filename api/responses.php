<?php

class ApiResponse
{
    public static function success(array $data): void
    {
        self::send([
            'data' => $data,
            'error' => null,
        ]);
    }

    public static function error(
        string $message,
        int $status = 400
    ): void {
        http_response_code($status);

        self::send([
            'data' => null,
            'error' => [
                'message' => $message,
            ],
        ]);
    }

    private static function send(array $response): void
    {
        header('Content-Type: application/json; charset=utf-8');

        echo json_encode(
            $response,
            JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE
        );
    }
}
