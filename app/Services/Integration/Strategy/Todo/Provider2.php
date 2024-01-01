<?php

namespace App\Services\Integration\Strategy\Todo;

use App\Models\Todo;
use Illuminate\Support\Facades\Http;

class Provider2 implements IntegrationStrategyTodoInterface
{
    public function run(): void
    {
        $todoIntegrations = config('todos.integrations');

        $info = $todoIntegrations[env('PROVIDER2_NAME')];

        $todos = Http::get($info['client_url'])
            ->json();

        foreach ($todos as $todo)
        {
            Todo::query()->firstOrCreate([
                'name' => $todo['id'],
                'provider_name' => env('PROVIDER2_NAME'),
                'level' => 1,
                'estimated_duration' => $todo['estimated_duration'] * $todo['value']
            ]);
        }
    }
}
