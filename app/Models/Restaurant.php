<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'phone',
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
