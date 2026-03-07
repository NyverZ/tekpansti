<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Nutrient;
use App\Models\Plant;
use App\Models\Region;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        $nutrients = Nutrient::query()->get()->keyBy('slug');
        $regions = Region::query()->pluck('id')->all();

        $categories = [
            'staple' => Category::firstOrCreate(
                ['slug' => 'staple'],
                ['name' => 'Bahan Pokok', 'description' => 'Sumber karbohidrat utama yang umum dikonsumsi sehari-hari.']
            ),
            'animal-protein' => Category::firstOrCreate(
                ['slug' => 'animal-protein'],
                ['name' => 'Protein Hewani', 'description' => 'Bahan pangan hewani yang kaya protein dan perlu penanganan higienis.']
            ),
            'plant-protein' => Category::firstOrCreate(
                ['slug' => 'plant-protein'],
                ['name' => 'Protein Nabati', 'description' => 'Sumber protein berbasis kedelai dan bahan nabati lain.']
            ),
            'vegetable' => Category::firstOrCreate(
                ['slug' => 'vegetable'],
                ['name' => 'Sayuran', 'description' => 'Sayuran segar yang mendukung pola makan seimbang dan aman.']
            ),
            'dairy' => Category::firstOrCreate(
                ['slug' => 'dairy'],
                ['name' => 'Produk Susu', 'description' => 'Produk susu yang memerlukan rantai dingin untuk menjaga mutu dan keamanan.']
            ),
        ];

        $ingredients = [
            [
                'category' => 'staple',
                'local_name' => 'Rice',
                'scientific_name' => 'Oryza sativa',
                'description' => 'Rice is a staple carbohydrate source commonly served in households, schools, and food service settings.',
                'health_benefits' => 'Provides energy and can be paired with protein and vegetables for balanced meals.',
                'processing_potential' => 'Cool cooked rice quickly, refrigerate within two hours, and reheat thoroughly before serving to reduce Bacillus cereus risk.',
                'nutrients' => [
                    'calories' => 130,
                    'protein' => 2.7,
                    'fat' => 0.3,
                    'carbohydrate' => 28.2,
                ],
            ],
            [
                'category' => 'animal-protein',
                'local_name' => 'Chicken',
                'scientific_name' => 'Gallus gallus domesticus',
                'description' => 'Chicken is a common source of protein widely consumed in many cooked dishes and ready-to-eat meals.',
                'health_benefits' => 'Rich in protein and important for growth, muscle maintenance, and daily energy balance.',
                'processing_potential' => 'Cook chicken to an internal temperature of at least 75 C and avoid contact between raw chicken juices and ready-to-eat foods.',
                'nutrients' => [
                    'calories' => 165,
                    'protein' => 31,
                    'fat' => 3.6,
                    'carbohydrate' => 0,
                    'iron' => 0.9,
                ],
            ],
            [
                'category' => 'animal-protein',
                'local_name' => 'Egg',
                'scientific_name' => 'Gallus gallus domesticus ovum',
                'description' => 'Egg is a versatile ingredient used in breakfast, baking, and many home-cooked recipes.',
                'health_benefits' => 'Contains high-quality protein, healthy fats, and micronutrients needed for daily nutrition.',
                'processing_potential' => 'Store eggs in a cool place, cook until the yolk and white are firm, and avoid using cracked shells for direct consumption.',
                'nutrients' => [
                    'calories' => 155,
                    'protein' => 13,
                    'fat' => 11,
                    'carbohydrate' => 1.1,
                    'iron' => 1.8,
                ],
            ],
            [
                'category' => 'animal-protein',
                'local_name' => 'Fish',
                'scientific_name' => 'Pisces edible fillet',
                'description' => 'Fish is a nutrient-dense ingredient often prepared by frying, steaming, grilling, or soups.',
                'health_benefits' => 'Provides protein and important minerals, and some fish also contribute beneficial fats.',
                'processing_potential' => 'Keep fish chilled with ice or refrigeration, prevent raw drips onto other foods, and cook until flesh is opaque and flakes easily.',
                'nutrients' => [
                    'calories' => 128,
                    'protein' => 26,
                    'fat' => 2.7,
                    'carbohydrate' => 0,
                    'iron' => 0.7,
                ],
            ],
            [
                'category' => 'dairy',
                'local_name' => 'Milk',
                'scientific_name' => 'Bos taurus milk',
                'description' => 'Milk is a widely used ingredient for beverages, desserts, and cooking preparations.',
                'health_benefits' => 'Contributes protein and energy and is commonly included in nutritious meal planning.',
                'processing_potential' => 'Use pasteurized milk, keep it refrigerated below 5 C, and do not leave opened milk at room temperature for extended periods.',
                'nutrients' => [
                    'calories' => 61,
                    'protein' => 3.2,
                    'fat' => 3.3,
                    'carbohydrate' => 4.8,
                ],
            ],
            [
                'category' => 'plant-protein',
                'local_name' => 'Tofu',
                'scientific_name' => 'Glycine max tofu',
                'description' => 'Tofu is a soybean-based ingredient that is easy to cook and often used in soups, stir-fries, and healthy menus.',
                'health_benefits' => 'Offers plant protein and can support balanced diets when cooked and served safely.',
                'processing_potential' => 'Store tofu in the refrigerator, use clean water if soaking, and cook thoroughly before serving to maintain quality and safety.',
                'nutrients' => [
                    'calories' => 76,
                    'protein' => 8,
                    'fat' => 4.8,
                    'carbohydrate' => 1.9,
                    'iron' => 1.6,
                ],
            ],
            [
                'category' => 'plant-protein',
                'local_name' => 'Tempeh',
                'scientific_name' => 'Glycine max fermented cake',
                'description' => 'Tempeh is a traditional fermented soybean ingredient that is popular, affordable, and nutritious.',
                'health_benefits' => 'Contains protein, fiber, and minerals, making it a practical ingredient for food education content.',
                'processing_potential' => 'Keep tempeh refrigerated, use clean utensils during slicing, and cook until hot throughout before serving.',
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
                'category' => 'vegetable',
                'local_name' => 'Spinach',
                'scientific_name' => 'Spinacia oleracea',
                'description' => 'Spinach is a leafy green ingredient commonly added to soups, stir-fries, and healthy side dishes.',
                'health_benefits' => 'Provides fiber, iron, and vitamin C as part of a varied and balanced meal.',
                'processing_potential' => 'Wash spinach thoroughly under running water, trim damaged leaves, and avoid leaving chopped greens at room temperature for too long.',
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
                'category' => 'vegetable',
                'local_name' => 'Carrot',
                'scientific_name' => 'Daucus carota',
                'description' => 'Carrot is a root vegetable often prepared raw or cooked in soups, salads, and mixed dishes.',
                'health_benefits' => 'Adds fiber and supports nutritious meal variety in home and school food preparation.',
                'processing_potential' => 'Wash and peel carrots with clean tools, especially when they will be served raw or lightly cooked.',
                'nutrients' => [
                    'calories' => 41,
                    'protein' => 0.9,
                    'carbohydrate' => 9.6,
                    'fiber' => 2.8,
                    'vitamin_c' => 5.9,
                ],
            ],
            [
                'category' => 'vegetable',
                'local_name' => 'Tomato',
                'scientific_name' => 'Solanum lycopersicum',
                'description' => 'Tomato is a common kitchen ingredient used in sambal, soups, sauces, and fresh salads.',
                'health_benefits' => 'Contributes hydration, fiber, and vitamin C to daily meals and snacks.',
                'processing_potential' => 'Rinse tomatoes before cutting, separate them from raw meat areas, and use clean knives and boards for ready-to-eat dishes.',
                'nutrients' => [
                    'calories' => 18,
                    'protein' => 0.9,
                    'carbohydrate' => 3.9,
                    'fiber' => 1.2,
                    'vitamin_c' => 13.7,
                ],
            ],
        ];

        foreach ($ingredients as $ingredient) {
            $plant = Plant::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($ingredient['local_name'])],
                [
                    'category_id' => $categories[$ingredient['category']]->id,
                    'local_name' => $ingredient['local_name'],
                    'scientific_name' => $ingredient['scientific_name'],
                    'description' => $ingredient['description'],
                    'health_benefits' => $ingredient['health_benefits'],
                    'processing_potential' => $ingredient['processing_potential'],
                    'is_published' => true,
                ]
            );

            $syncData = collect($ingredient['nutrients'])
                ->filter(fn ($amount, $slug) => $nutrients->has($slug))
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
