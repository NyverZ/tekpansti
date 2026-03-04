<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\NutrientSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            NutrientSeeder::class,
            PlantSeeder::class,
        ]);

        User::updateOrCreate(
            ['email' => 'admin@plantintel.local'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
            ]
        );
    }
}
