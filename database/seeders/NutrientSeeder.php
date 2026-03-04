<?php

namespace Database\Seeders;

use App\Models\Nutrient;
use Illuminate\Database\Seeder;

class NutrientSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['name' => 'Protein', 'slug' => 'protein', 'unit' => 'g'],
            ['name' => 'Iron', 'slug' => 'iron', 'unit' => 'mg'],
            ['name' => 'Vitamin C', 'slug' => 'vitamin_c', 'unit' => 'mg'],
            ['name' => 'Fiber', 'slug' => 'fiber', 'unit' => 'g'],
        ];

        foreach ($rows as $row) {
            Nutrient::updateOrCreate(['slug' => $row['slug']], $row);
        }
    }
}
