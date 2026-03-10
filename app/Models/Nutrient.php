<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nutrient extends Model
{
    protected $fillable = ['name', 'slug', 'unit', 'description'];

    public static function foodCompositionDefinitions(): array
    {
        return [
            'carbohydrate' => [
                'name' => 'Karbohidrat',
                'unit' => 'g',
                'description' => 'Kandungan karbohidrat per 100 gram bahan pangan.',
            ],
            'protein' => [
                'name' => 'Protein',
                'unit' => 'g',
                'description' => 'Kandungan protein per 100 gram bahan pangan.',
            ],
            'fat' => [
                'name' => 'Lemak',
                'unit' => 'g',
                'description' => 'Kandungan lemak per 100 gram bahan pangan.',
            ],
            'calcium' => [
                'name' => 'Kalsium',
                'unit' => 'mg',
                'description' => 'Kandungan kalsium per 100 gram bahan pangan.',
            ],
        ];
    }

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
