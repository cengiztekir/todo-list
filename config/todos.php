<?php

return [
    'work_hour' => 45,
    'start_at' => "09:00",
    'end_at' => "18:00",

    'integrations' => [
        env('PROVIDER1_NAME') => [
            'director_name' => env('PROVIDER1_DIRECTOR_NAME'),
            'client_url' => env('PROVIDER1_CLIENT_URL')
        ],
        env('PROVIDER2_NAME') => [
            'director_name' => env('PROVIDER2_DIRECTOR_NAME'),
            'client_url' => env('PROVIDER2_CLIENT_URL')
        ],
    ],
];
