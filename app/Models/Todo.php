<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'provider_name',
        'level',
        'estimated_duration',
        'developer_id'
    ];

    /**
     * @return BelongsTo
     */
    public function developer(): BelongsTo
    {
        return $this->belongsTo('developers');
    }
}
