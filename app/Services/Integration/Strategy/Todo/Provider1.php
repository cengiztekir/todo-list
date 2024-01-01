<?php

namespace App\Services\Integration\Strategy\Todo;

use App\Models\Todo;
use Illuminate\Support\Facades\Http;

class Provider1 implements IntegrationStrategyTodoInterface
{
    public function run(): void
    {
        $todoIntegrations = config('todos.integrations');

        $info = $todoIntegrations[env('PROVIDER1_NAME')];

        $todos = Http::get($info['client_url'])
            ->json();

        foreach ($todos as $todo)
        {
            Todo::query()->firstOrCreate([
                'name' => $todo['id'],
                'provider_name' => env('PROVIDER1_NAME'),
                'level' => 1,
                'estimated_duration' => $todo['sure'] * $todo['zorluk']
            ]);
        }
    }
}
