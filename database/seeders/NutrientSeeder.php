<?php

namespace Database\Seeders;

use App\Models\Nutrient;
use Illuminate\Database\Seeder;

class NutrientSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Calories', 'slug' => 'calories', 'unit' => 'kcal'],
            ['name' => 'Protein', 'slug' => 'protein', 'unit' => 'g'],
            ['name' => 'Fat', 'slug' => 'fat', 'unit' => 'g'],
            ['name' => 'Carbohydrate', 'slug' => 'carbohydrate', 'unit' => 'g'],
            ['name' => 'Iron', 'slug' => 'iron', 'unit' => 'mg'],
            ['name' => 'Vitamin C', 'slug' => 'vitamin_c', 'unit' => 'mg'],
            ['name' => 'Fiber', 'slug' => 'fiber', 'unit' => 'g'],
        ];

        foreach ($rows as $row) {
            Nutrient::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }
}
