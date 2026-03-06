<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Plant extends Model
{
    protected $fillable = [
        'category_id',
        'local_name',
        'scientific_name',
        'slug',
        'description',
        'health_benefits',
        'processing_potential',
        'image_path',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot - Auto Generate Slug
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($plant) {
            $plant->slug = Str::slug($plant->local_name);
        });

        static::updating(function ($plant) {
            $plant->slug = Str::slug($plant->local_name);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function nutrients(): BelongsToMany
    {
        return $this->belongsToMany(
            Nutrient::class,
            'plant_nutrient',
            'plant_id',
            'nutrient_id'
        )
            ->withPivot(['amount', 'notes'])
            ->withTimestamps();
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(
            Region::class,
            'plant_region',
            'plant_id',
            'region_id'
        )
            ->withPivot(['abundance_level', 'notes'])
            ->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Scope Published (Untuk Public)
    |--------------------------------------------------------------------------
    */

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
