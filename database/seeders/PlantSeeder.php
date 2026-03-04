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
        $cat = Category::firstOrCreate(
            ['slug' => 'sayuran-daun'],
            ['name' => 'Sayuran Daun', 'description' => 'Kategori sayuran daun']
        );

        $kelor = Plant::updateOrCreate(
            ['slug' => 'kelor'],
            [
                'category_id' => $cat->id,
                'local_name' => 'Kelor',
                'scientific_name' => 'Moringa oleifera',
                'description' => 'Tanaman pangan lokal kaya nutrisi.',
                'health_benefits' => 'Mendukung daya tahan tubuh.',
                'processing_potential' => 'Teh, sayur bening, tepung kelor.',
                'is_published' => true,
            ]
        );

        $nutrients = Nutrient::query()->get()->keyBy('slug');
        $regions = Region::query()->pluck('id')->all();

        $kelor->nutrients()->sync([
            $nutrients->get('protein')->id => ['amount' => 9.4, 'notes' => 'per 100g'],
            $nutrients->get('iron')->id => ['amount' => 4.0, 'notes' => 'per 100g'],
            $nutrients->get('vitamin_c')->id => ['amount' => 51.7, 'notes' => 'per 100g'],
        ]);

        if (!empty($regions)) {
            $kelor->regions()->sync([
                $regions[0] => ['abundance_level' => 'high'],
            ]);
        }
    }
}
