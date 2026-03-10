<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class IngredientSeeder extends Seeder
{
    public static function definitions(): array
    {
        return [
            ['local_name' => 'Nasi putih', 'scientific_name' => 'Oryza sativa', 'category' => 'serealia'],
            ['local_name' => 'Beras merah', 'scientific_name' => 'Oryza sativa var. indica', 'category' => 'serealia'],
            ['local_name' => 'Jagung kuning', 'scientific_name' => 'Zea mays', 'category' => 'serealia'],
            ['local_name' => 'Singkong', 'scientific_name' => 'Manihot esculenta', 'category' => 'umbi'],
            ['local_name' => 'Ubi jalar', 'scientific_name' => 'Ipomoea batatas', 'category' => 'umbi'],
            ['local_name' => 'Kentang', 'scientific_name' => 'Solanum tuberosum', 'category' => 'umbi'],
            ['local_name' => 'Pisang', 'scientific_name' => 'Musa paradisiaca', 'category' => 'buah'],
            ['local_name' => 'Pepaya', 'scientific_name' => 'Carica papaya', 'category' => 'buah'],
            ['local_name' => 'Mangga', 'scientific_name' => 'Mangifera indica', 'category' => 'buah'],
            ['local_name' => 'Jeruk', 'scientific_name' => 'Citrus sinensis', 'category' => 'buah'],
            ['local_name' => 'Bayam', 'scientific_name' => 'Amaranthus tricolor', 'category' => 'sayuran'],
            ['local_name' => 'Wortel', 'scientific_name' => 'Daucus carota', 'category' => 'sayuran'],
            ['local_name' => 'Kubis', 'scientific_name' => 'Brassica oleracea var. capitata', 'category' => 'sayuran'],
            ['local_name' => 'Kacang panjang', 'scientific_name' => 'Vigna unguiculata sesquipedalis', 'category' => 'sayuran'],
            ['local_name' => 'Tomat', 'scientific_name' => 'Solanum lycopersicum', 'category' => 'sayuran'],
            ['local_name' => 'Daging sapi', 'scientific_name' => 'Bos taurus', 'category' => 'hewani'],
            ['local_name' => 'Daging ayam', 'scientific_name' => 'Gallus gallus domesticus', 'category' => 'hewani'],
            ['local_name' => 'Telur ayam', 'scientific_name' => 'Gallus gallus domesticus ovum', 'category' => 'hewani'],
            ['local_name' => 'Susu sapi', 'scientific_name' => 'Bos taurus lac', 'category' => 'hewani'],
            ['local_name' => 'Udang', 'scientific_name' => 'Penaeus monodon', 'category' => 'hewani'],
            ['local_name' => 'Ikan tuna', 'scientific_name' => 'Thunnus albacares', 'category' => 'ikan-laut'],
            ['local_name' => 'Ikan kembung', 'scientific_name' => 'Rastrelliger kanagurta', 'category' => 'ikan-laut'],
            ['local_name' => 'Ikan tongkol', 'scientific_name' => 'Euthynnus affinis', 'category' => 'ikan-laut'],
            ['local_name' => 'Ikan kakap', 'scientific_name' => 'Lutjanus campechanus', 'category' => 'ikan-laut'],
            ['local_name' => 'Ikan cakalang', 'scientific_name' => 'Katsuwonus pelamis', 'category' => 'ikan-laut'],
            ['local_name' => 'Ikan bandeng', 'scientific_name' => 'Chanos chanos', 'category' => 'ikan-laut'],
            ['local_name' => 'Lele', 'scientific_name' => 'Clarias gariepinus', 'category' => 'ikan-air-tawar'],
            ['local_name' => 'Nila', 'scientific_name' => 'Oreochromis niloticus', 'category' => 'ikan-air-tawar'],
            ['local_name' => 'Gurame', 'scientific_name' => 'Osphronemus goramy', 'category' => 'ikan-air-tawar'],
            ['local_name' => 'Patin', 'scientific_name' => 'Pangasius hypophthalmus', 'category' => 'ikan-air-tawar'],
        ];
    }

    public function run(): void
    {
        $this->call(CategorySeeder::class);

        $categoryIds = Category::query()->pluck('id', 'slug');

        foreach (static::definitions() as $ingredient) {
            $slug = Str::slug($ingredient['local_name']);
            $existingPlant = $this->findExistingPlant($slug, $ingredient['local_name'], $ingredient['scientific_name']);

            $payload = [
                'slug' => $existingPlant?->slug ?: $slug,
                'category_id' => $this->preserve($existingPlant, 'category_id', $categoryIds[$ingredient['category']] ?? null),
                'local_name' => $this->preserve($existingPlant, 'local_name', $ingredient['local_name']),
                'scientific_name' => $this->preserve($existingPlant, 'scientific_name', $ingredient['scientific_name']),
                'description' => $this->preserve($existingPlant, 'description', $this->defaultDescription($ingredient['local_name'], $ingredient['category'])),
                'health_benefits' => $this->preserve($existingPlant, 'health_benefits', $this->defaultBenefits($ingredient['category'])),
                'processing_potential' => $this->preserve($existingPlant, 'processing_potential', $this->defaultProcessingTip($ingredient['category'])),
                'is_published' => $existingPlant?->is_published ?? true,
            ];

            if ($existingPlant) {
                $existingPlant->update($payload);
                continue;
            }

            Plant::query()->create($payload);
        }
    }

    private function findExistingPlant(string $slug, string $localName, string $scientificName): ?Plant
    {
        return Plant::query()
            ->where('slug', $slug)
            ->orWhere('local_name', $localName)
            ->orWhere('scientific_name', $scientificName)
            ->first();
    }

    private function preserve(?Plant $plant, string $attribute, mixed $fallback): mixed
    {
        if (! $plant) {
            return $fallback;
        }

        $currentValue = $plant->getAttribute($attribute);

        return blank($currentValue) ? $fallback : $currentValue;
    }

    private function defaultDescription(string $name, string $categorySlug): string
    {
        $categoryLabel = match ($categorySlug) {
            'serealia' => 'kelompok serealia',
            'umbi' => 'kelompok umbi',
            'buah' => 'kelompok buah',
            'sayuran' => 'kelompok sayuran',
            'hewani' => 'kelompok bahan pangan hewani',
            'ikan-laut' => 'kelompok ikan laut',
            'ikan-air-tawar' => 'kelompok ikan air tawar',
            default => 'kelompok bahan pangan',
        };

        return "{$name} termasuk {$categoryLabel} yang sering digunakan dalam menu harian dan edukasi gizi SafeFood.";
    }

    private function defaultBenefits(string $categorySlug): string
    {
        return match ($categorySlug) {
            'serealia', 'umbi' => 'Menyediakan energi sebagai sumber karbohidrat utama.',
            'buah', 'sayuran' => 'Mendukung variasi vitamin, mineral, dan serat dalam menu seimbang.',
            'hewani', 'ikan-laut', 'ikan-air-tawar' => 'Menyumbang protein dan mineral penting untuk kebutuhan tubuh.',
            default => 'Dapat menjadi bagian dari pola makan yang seimbang bila diolah dengan aman.',
        };
    }

    private function defaultProcessingTip(string $categorySlug): string
    {
        return match ($categorySlug) {
            'serealia', 'umbi' => 'Simpan dalam kondisi bersih dan masak hingga matang sebelum disajikan.',
            'buah', 'sayuran' => 'Cuci dengan air mengalir dan gunakan alat potong yang bersih.',
            'hewani', 'ikan-laut', 'ikan-air-tawar' => 'Simpan pada suhu dingin, hindari kontaminasi silang, dan masak hingga matang aman.',
            default => 'Tangani dengan alat bersih dan simpan sesuai kebutuhan bahan pangan.',
        };
    }
}
