<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Nutrient;
use App\Models\Plant;
use App\Models\Region;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        $nutrients = Nutrient::query()->get()->keyBy('slug');
        $regions = Region::query()->pluck('id')->all();

        $categories = [
            'animal-protein' => Category::firstOrCreate(
                ['slug' => 'animal-protein'],
                ['name' => 'Animal Protein', 'description' => 'Chicken, fish, eggs, and other animal protein sources.']
            ),
            'plant-protein' => Category::firstOrCreate(
                ['slug' => 'plant-protein'],
                ['name' => 'Plant Protein', 'description' => 'Tempeh, tofu, legumes, and similar sources.']
            ),
            'fruit' => Category::firstOrCreate(
                ['slug' => 'fruit'],
                ['name' => 'Fruit', 'description' => 'Fresh fruit ingredients for healthy meal planning.']
            ),
            'vegetable' => Category::firstOrCreate(
                ['slug' => 'vegetable'],
                ['name' => 'Vegetable', 'description' => 'Vegetable ingredients used in healthy food practices.']
            ),
            'staple' => Category::firstOrCreate(
                ['slug' => 'staple'],
                ['name' => 'Staple Food', 'description' => 'Rice, corn, and other staple ingredients.']
            ),
        ];

        $foods = [
            [
                'slug' => 'chicken-breast',
                'category' => 'animal-protein',
                'local_name' => 'Chicken Breast',
                'scientific_name' => 'Gallus gallus domesticus',
                'description' => 'Lean animal protein that should be cooked thoroughly and stored below 5 C before use.',
                'health_benefits' => 'High protein and relatively low fat when skinless.',
                'processing_potential' => 'Store chilled, avoid cross contamination, and cook to safe internal temperature.',
                'nutrients' => [
                    'calories' => 165,
                    'protein' => 31,
                    'fat' => 3.6,
                    'carbohydrate' => 0,
                    'iron' => 0.9,
                ],
            ],
            [
                'slug' => 'tempeh',
                'category' => 'plant-protein',
                'local_name' => 'Tempeh',
                'scientific_name' => 'Glycine max fermented cake',
                'description' => 'Fermented soybean product rich in protein and suitable for healthy food education comparisons.',
                'health_benefits' => 'Provides plant protein, fiber, and minerals.',
                'processing_potential' => 'Keep refrigerated, cook thoroughly, and use clean utensils during slicing.',
                'nutrients' => [
                    'calories' => 193,
                    'protein' => 20.3,
                    'fat' => 10.8,
                    'carbohydrate' => 7.6,
                    'fiber' => 1.4,
                    'iron' => 2.7,
                ],
            ],
            [
                'slug' => 'apple',
                'category' => 'fruit',
                'local_name' => 'Apple',
                'scientific_name' => 'Malus domestica',
                'description' => 'Popular fruit ingredient that benefits from clean washing and careful storage to prevent bruising and spoilage.',
                'health_benefits' => 'Contains fiber and vitamin-rich phytonutrients.',
                'processing_potential' => 'Wash under running water and store separately from raw meats and fish.',
                'nutrients' => [
                    'calories' => 52,
                    'carbohydrate' => 13.8,
                    'fiber' => 2.4,
                    'vitamin_c' => 4.6,
                ],
            ],
            [
                'slug' => 'banana',
                'category' => 'fruit',
                'local_name' => 'Banana',
                'scientific_name' => 'Musa acuminata',
                'description' => 'Energy-dense fruit commonly used in healthy snack recommendations and easy nutrition comparisons.',
                'health_benefits' => 'Provides carbohydrates and dietary fiber.',
                'processing_potential' => 'Keep surfaces clean when peeling or slicing for ready-to-eat service.',
                'nutrients' => [
                    'calories' => 89,
                    'carbohydrate' => 22.8,
                    'fiber' => 2.6,
                    'vitamin_c' => 8.7,
                ],
            ],
            [
                'slug' => 'spinach',
                'category' => 'vegetable',
                'local_name' => 'Spinach',
                'scientific_name' => 'Spinacia oleracea',
                'description' => 'Leafy vegetable that should be washed carefully to reduce soil and microbial contamination.',
                'health_benefits' => 'Rich in iron, fiber, and vitamin C.',
                'processing_potential' => 'Wash thoroughly and avoid prolonged room-temperature exposure after cutting.',
                'nutrients' => [
                    'calories' => 23,
                    'protein' => 2.9,
                    'carbohydrate' => 3.6,
                    'fiber' => 2.2,
                    'iron' => 2.7,
                    'vitamin_c' => 28.1,
                ],
            ],
            [
                'slug' => 'carrot',
                'category' => 'vegetable',
                'local_name' => 'Carrot',
                'scientific_name' => 'Daucus carota',
                'description' => 'Root vegetable suitable for safe raw or cooked preparation when washed and peeled properly.',
                'health_benefits' => 'Contributes fiber and protective micronutrients.',
                'processing_potential' => 'Use clean peelers and sanitize prep surfaces when serving raw.',
                'nutrients' => [
                    'calories' => 41,
                    'protein' => 0.9,
                    'carbohydrate' => 9.6,
                    'fiber' => 2.8,
                    'vitamin_c' => 5.9,
                ],
            ],
            [
                'slug' => 'rice',
                'category' => 'staple',
                'local_name' => 'Rice',
                'scientific_name' => 'Oryza sativa',
                'description' => 'Staple food that requires proper cooling and reheating control to prevent bacterial growth.',
                'health_benefits' => 'Primary carbohydrate source in many balanced meals.',
                'processing_potential' => 'Cool quickly after cooking and store leftovers below 5 C.',
                'nutrients' => [
                    'calories' => 130,
                    'protein' => 2.7,
                    'fat' => 0.3,
                    'carbohydrate' => 28.2,
                ],
            ],
            [
                'slug' => 'corn',
                'category' => 'staple',
                'local_name' => 'Corn',
                'scientific_name' => 'Zea mays',
                'description' => 'Versatile staple ingredient used in healthy food products and meal diversity education.',
                'health_benefits' => 'Provides carbohydrates, fiber, and moderate micronutrients.',
                'processing_potential' => 'Store cooked corn safely and protect it from temperature abuse during display.',
                'nutrients' => [
                    'calories' => 96,
                    'protein' => 3.4,
                    'fat' => 1.5,
                    'carbohydrate' => 21,
                    'fiber' => 2.4,
                ],
            ],
        ];

        foreach ($foods as $food) {
            $plant = Plant::updateOrCreate(
                ['slug' => $food['slug']],
                [
                    'category_id' => $categories[$food['category']]->id,
                    'local_name' => $food['local_name'],
                    'scientific_name' => $food['scientific_name'],
                    'description' => $food['description'],
                    'health_benefits' => $food['health_benefits'],
                    'processing_potential' => $food['processing_potential'],
                    'is_published' => true,
                ]
            );

            $syncData = collect($food['nutrients'])
                ->mapWithKeys(fn ($amount, $slug) => [
                    $nutrients->get($slug)->id => ['amount' => $amount, 'notes' => 'per 100g'],
                ])
                ->all();

            $plant->nutrients()->sync($syncData);

            if (! empty($regions)) {
                $plant->regions()->syncWithoutDetaching([
                    $regions[0] => ['abundance_level' => 'high'],
                ]);
            }
        }
    }
}
