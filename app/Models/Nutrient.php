<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nutrient extends Model
{
    protected $fillable = ['name', 'slug', 'unit', 'description'];

    public function plants(): BelongsToMany
    {
        return $this->belongsToMany(
            Plant::class,
            'plant_nutrient',
            'nutrient_id',
            'plant_id'
        )
            ->withPivot(['amount', 'notes'])
            ->withTimestamps();
    }
}
