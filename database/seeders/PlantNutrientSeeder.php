<?php

namespace Database\Seeders;

use App\Models\Nutrient;
use App\Models\Plant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlantNutrientSeeder extends Seeder
{
    public static function definitions(): array
    {
        return [
            'Nasi putih' => ['carbohydrate' => 38.1, 'protein' => 3.0, 'fat' => 0.2, 'calcium' => 6],
            'Beras merah' => ['carbohydrate' => 77.6, 'protein' => 7.5, 'fat' => 2.7, 'calcium' => 23],
            'Jagung kuning' => ['carbohydrate' => 69.1, 'protein' => 9.8, 'fat' => 7.3, 'calcium' => 30],
            'Singkong' => ['carbohydrate' => 34.7, 'protein' => 1.2, 'fat' => 0.3, 'calcium' => 33],
            'Ubi jalar' => ['carbohydrate' => 27.9, 'protein' => 1.6, 'fat' => 0.3, 'calcium' => 30],
            'Kentang' => ['carbohydrate' => 19.1, 'protein' => 2.0, 'fat' => 0.1, 'calcium' => 11],
            'Pisang' => ['carbohydrate' => 23.0, 'protein' => 1.2, 'fat' => 0.3, 'calcium' => 8],
            'Pepaya' => ['carbohydrate' => 11.0, 'protein' => 0.6, 'fat' => 0.1, 'calcium' => 20],
            'Mangga' => ['carbohydrate' => 15.0, 'protein' => 0.8, 'fat' => 0.4, 'calcium' => 15],
            'Jeruk' => ['carbohydrate' => 11.2, 'protein' => 0.9, 'fat' => 0.2, 'calcium' => 33],
            'Bayam' => ['carbohydrate' => 3.2, 'protein' => 2.1, 'fat' => 0.3, 'calcium' => 267],
            'Wortel' => ['carbohydrate' => 9.6, 'protein' => 0.9, 'fat' => 0.2, 'calcium' => 33],
            'Kubis' => ['carbohydrate' => 5.8, 'protein' => 1.3, 'fat' => 0.1, 'calcium' => 40],
            'Kacang panjang' => ['carbohydrate' => 8.0, 'protein' => 2.8, 'fat' => 0.4, 'calcium' => 50],
            'Tomat' => ['carbohydrate' => 3.9, 'protein' => 0.9, 'fat' => 0.2, 'calcium' => 10],
            'Daging sapi' => ['carbohydrate' => 0.0, 'protein' => 18.8, 'fat' => 14.0, 'calcium' => 11],
            'Daging ayam' => ['carbohydrate' => 0.0, 'protein' => 18.2, 'fat' => 25.0, 'calcium' => 14],
            'Telur ayam' => ['carbohydrate' => 1.1, 'protein' => 12.8, 'fat' => 11.5, 'calcium' => 54],
            'Susu sapi' => ['carbohydrate' => 4.8, 'protein' => 3.3, 'fat' => 3.9, 'calcium' => 125],
            'Udang' => ['carbohydrate' => 0.9, 'protein' => 20.3, 'fat' => 0.6, 'calcium' => 64],
            'Tahu' => ['carbohydrate' => 1.6, 'protein' => 10.9, 'fat' => 4.7, 'calcium' => 223],
            'Tempe' => ['carbohydrate' => 13.5, 'protein' => 20.8, 'fat' => 8.8, 'calcium' => 155],
            'Ikan tuna' => ['carbohydrate' => 0.0, 'protein' => 28.0, 'fat' => 1.3, 'calcium' => 37],
            'Ikan kembung' => ['carbohydrate' => 2.2, 'protein' => 21.3, 'fat' => 3.4, 'calcium' => 136],
            'Ikan tongkol' => ['carbohydrate' => 8.0, 'protein' => 13.7, 'fat' => 1.5, 'calcium' => 92],
            'Ikan kakap' => ['carbohydrate' => 0.0, 'protein' => 20.0, 'fat' => 0.7, 'calcium' => 20],
            'Ikan cakalang' => ['carbohydrate' => 5.5, 'protein' => 19.6, 'fat' => 0.7, 'calcium' => 23],
            'Ikan bandeng' => ['carbohydrate' => 0.0, 'protein' => 20.0, 'fat' => 4.8, 'calcium' => 20],
            'Lele' => ['carbohydrate' => 0.0, 'protein' => 17.0, 'fat' => 4.5, 'calcium' => 14],
            'Nila' => ['carbohydrate' => 0.0, 'protein' => 20.1, 'fat' => 1.7, 'calcium' => 10],
            'Gurame' => ['carbohydrate' => 0.0, 'protein' => 19.5, 'fat' => 2.0, 'calcium' => 15],
            'Patin' => ['carbohydrate' => 0.0, 'protein' => 17.0, 'fat' => 6.6, 'calcium' => 8],
        ];
    }

    public function run(): void
    {
        $this->call([
            NutrientSeeder::class,
            IngredientSeeder::class,
        ]);

        $ingredientDefinitions = collect(IngredientSeeder::definitions())
            ->keyBy('local_name');

        $nutrients = collect(Nutrient::foodCompositionDefinitions())
            ->mapWithKeys(function (array $definition, string $slug) {
                return [
                    $slug => Nutrient::query()->firstOrCreate(
                        ['slug' => $slug],
                        $definition
                    ),
                ];
            });

        foreach (static::definitions() as $plantName => $values) {
            $ingredient = $ingredientDefinitions->get($plantName);

            $plant = Plant::query()
                ->where('slug', Str::slug($plantName))
                ->orWhere('local_name', $plantName)
                ->when(
                    filled($ingredient['scientific_name'] ?? null),
                    fn ($query) => $query->orWhere('scientific_name', $ingredient['scientific_name'])
                )
                ->first();

            if (! $plant) {
                continue;
            }

            $managedIds = $nutrients->pluck('id')->all();
            $plant->nutrients()->detach($managedIds);

            $sync = collect($values)
                ->filter(fn ($amount) => $amount !== null && $amount !== '')
                ->mapWithKeys(function ($amount, string $slug) use ($nutrients) {
                    if (! $nutrients->has($slug)) {
                        return [];
                    }

                    return [
                        $nutrients[$slug]->id => [
                            'amount' => (float) $amount,
                            'notes' => 'Data Tabel Komposisi Gizi per 100 g BDD',
                        ],
                    ];
                })
                ->all();

            if ($sync !== []) {
                $plant->nutrients()->syncWithoutDetaching($sync);
            }
        }
    }
}
