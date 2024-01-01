<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request, AuthService $authService): JsonResponse
    {
        $token = $authService->login($request->validated());
        return ApiResponse::message(
            200,
            'success',
            [
                'type' => 'Bearer',
                'token' => $token,
                'user' => new AuthResource(FacadesAuth::user()),
            ]
        );
    }
}
