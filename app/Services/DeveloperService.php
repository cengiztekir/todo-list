<?php

namespace App\Services;

use App\Models\Developer;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class DeveloperService
{
    /**
     * @return void
     */
    public function assigneAllTodos(): void
    {
        $todos = Todo::query()
            ->whereNull('developer_id')
            ->get();

        foreach ($todos as $todo)
        {
            $developer = Developer::query()
                ->orderBy('total_assign_hour')
                ->first();

            $todo->update([
                'developer_id' => $developer->id
            ]);

            $developer->update([
                'total_assign_hour' => ($developer->total_assign_hour + ($todo->estimated_duration / $developer->level))
            ]);
        }
    }

    /**
     * @return Builder[]|Collection
     */
    public function getDevelopersWithTodos(): Collection|array
    {
        return Developer::query()
            ->with(['todos'])
            ->get();
    }
}
