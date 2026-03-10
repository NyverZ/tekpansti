<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            NutrientSeeder::class,
            IngredientSeeder::class,
            PlantNutrientSeeder::class,
            ArticleSeeder::class,
            AdminSeeder::class,
        ]);

        Cache::forget('safefood.categories.options');
        Cache::forget('safefood.compare.food-options');
        Cache::forget('safefood.home.stats');
        Cache::forget('safefood.home.latest-articles');
        Cache::forget('safefood.education.featured-articles');
    }
}
