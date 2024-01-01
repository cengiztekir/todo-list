<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'total_assign_hour',
    ];

    protected $casts = [
        'total_assign_hour' => 'float'
    ];

    /**
     * @return HasMany
     */
    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }
}
