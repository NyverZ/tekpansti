<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlantFactory extends Factory
{
    public function definition(): array
    {
        $local = fake()->unique()->words(2, true);
        $scientific = Str::title(fake()->unique()->word()) . ' ' . fake()->unique()->word();

        return [
            'category_id' => Category::query()->inRandomOrder()->value('id') ?? Category::factory(),
            'local_name' => Str::title($local),
            'scientific_name' => $scientific,
            'slug' => Str::slug($local . '-' . fake()->unique()->numberBetween(100, 999)),
            'description' => fake()->paragraph(),
            'health_benefits' => fake()->paragraph(),
            'processing_potential' => fake()->paragraph(),
            'image_path' => null,
            'is_published' => true,
        ];
    }
}
