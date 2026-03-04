<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Region extends Model
{
    protected $fillable = ['name', 'province', 'latitude', 'longitude'];

    public function plants(): BelongsToMany
    {
        return $this->belongsToMany(
            Plant::class,
            'plant_region',
            'region_id',
            'plant_id'
        )
            ->withPivot(['abundance_level', 'notes'])
            ->withTimestamps();
    }
}
