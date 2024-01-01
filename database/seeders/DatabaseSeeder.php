<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'Test123'
         ]);

         \App\Models\Developer::factory()->create([
             'name' => 'Dev1',
             'level' => '1',
             'total_assign_hour' => '0'
         ]);

         \App\Models\Developer::factory()->create([
             'name' => 'Dev2',
             'level' => '2',
             'total_assign_hour' => '0'
         ]);

         \App\Models\Developer::factory()->create([
             'name' => 'Dev3',
             'level' => '3',
             'total_assign_hour' => '0'
         ]);

         \App\Models\Developer::factory()->create([
             'name' => 'Dev4',
             'level' => '4',
             'total_assign_hour' => '0'
         ]);

         \App\Models\Developer::factory()->create([
             'name' => 'Dev5',
             'level' => '5',
             'total_assign_hour' => '0'
         ]);
    }
}
