<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public static function definitions(): array
    {
        return [
            ['slug' => 'serealia', 'name' => 'Serealia', 'description' => 'Kelompok pangan sumber karbohidrat seperti beras dan jagung.'],
            ['slug' => 'umbi', 'name' => 'Umbi', 'description' => 'Kelompok umbi sebagai sumber energi alternatif.'],
            ['slug' => 'buah', 'name' => 'Buah', 'description' => 'Kelompok buah segar yang umum dikonsumsi sehari-hari.'],
            ['slug' => 'sayuran', 'name' => 'Sayuran', 'description' => 'Kelompok sayuran segar untuk menu seimbang.'],
            ['slug' => 'hewani', 'name' => 'Hewani', 'description' => 'Kelompok bahan pangan hewani seperti daging, telur, susu, dan udang.'],
            ['slug' => 'ikan-laut', 'name' => 'Ikan Laut', 'description' => 'Kelompok ikan laut yang memerlukan rantai dingin yang baik.'],
            ['slug' => 'ikan-air-tawar', 'name' => 'Ikan Air Tawar', 'description' => 'Kelompok ikan air tawar yang umum dibudidayakan dan dikonsumsi.'],
            ['slug' => 'kacang-kacangan', 'name' => 'Kacang-kacangan', 'description' => 'Kelompok kacang sebagai sumber protein nabati dan serat.'],
            ['slug' => 'produk-susu', 'name' => 'Produk Susu', 'description' => 'Kelompok olahan susu dan minuman susu.'],
            ['slug' => 'lainnya', 'name' => 'Lainnya', 'description' => 'Kategori cadangan untuk bahan pangan lain yang belum tercakup.'],
        ];
    }

    public function run(): void
    {
        foreach (static::definitions() as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
