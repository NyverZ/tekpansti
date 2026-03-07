<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(IngredientSeeder::class);
    }
}
