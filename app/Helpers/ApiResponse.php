<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * @param int $code
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    public static function message(int $code, string $message, $data = null): JsonResponse
    {
        $response = [
            'message' => $message
        ];
        if($data) {
            $response['data'] = $data;
        }
        return ApiResponse::json($response, $code);
    }

    /**
     * @param int $code
     * @param string $message
     * @param array|null $errors
     * @return JsonResponse
     */
    public static function exception(int $code, string $message, array $errors = null): JsonResponse
    {
        $response = [
            'message' => $message,
        ];
        if($errors) {
            $response['errors'] = $errors;
        }
        return ApiResponse::json($response, $code);
    }

    /**
     * @param $response
     * @param int $code
     * @return JsonResponse
     */
    private static function json($response, int $code = 200): JsonResponse
    {
        return response()->json($response, $code);
    }
}
