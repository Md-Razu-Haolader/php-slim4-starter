<?php

declare(strict_types=1);

namespace App\Helpers;

class Common
{
    public function __construct()
    {
    }

    public function processApiResponse(string $message, $data = '', $errors = '', $meta = []): string
    {
        return json_encode([
            'message' => $message,
            'data' => $data,
            'errors' => $errors,
            'meta' => $meta,
        ]);
    }

    public function getRandId()
    {
        $digits = 4;
        $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        return time() . $rand;
    }
}
