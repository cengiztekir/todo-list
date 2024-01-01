<?php

namespace App\Http\Controllers\Developer;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperWithTodosResource;
use App\Services\DeveloperService;
use Illuminate\Http\JsonResponse;

class IndexWithTodosController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeveloperService $developerService): JsonResponse
    {
        $developers = $developerService->getDevelopersWithTodos();
        return ApiResponse::message(
            200,
            'success',
            [
                DeveloperWithTodosResource::collection($developers)
            ]
        );
    }
}
