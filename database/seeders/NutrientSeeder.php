<?php

namespace Database\Seeders;

use App\Models\Nutrient;
use Illuminate\Database\Seeder;

class NutrientSeeder extends Seeder
{
    public static function definitions(): array
    {
        return Nutrient::foodCompositionDefinitions();
    }

    public function run(): void
    {
        foreach (static::definitions() as $slug => $row) {
            Nutrient::query()->updateOrCreate(
                ['slug' => $slug],
                $row
            );
        }
    }
}
