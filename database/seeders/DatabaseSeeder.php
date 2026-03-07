<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            NutrientSeeder::class,
            IngredientSeeder::class,
            ArticleSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'admin@admin.local'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'is_admin' => true,
            ]
        );
    }
}
