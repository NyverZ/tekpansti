<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PlantRequest;
use App\NewIngredientPublishedNotification;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use App\Models\Category;
use App\Models\Nutrient;
use App\Models\Plant;
use App\Models\Region;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with('category')->latest()->paginate(15);
        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.plants.create', [
            'categories' => $this->ensureCategories(),
        ]);
    }

    public function store(PlantRequest $request)
    {
        $data = $request->validated();

        $plant = DB::transaction(function () use ($request, $data) {
            if ($request->hasFile('image')) {
                $data['image_path'] = $request->file('image')->store('plants', 'public');
            }

            $plant = Plant::create($data);

            $this->syncFoodComposition($plant, $data['nutrient_values'] ?? []);
            $this->syncRegions($plant, $data['regions'] ?? []);

            return $plant;
        });

        if ($plant->is_published) {
            $this->notifyPublicUsersAboutPublishedPlant($plant);
        }
        $this->notifyAdminUsersAboutIngredientInput($plant);

        return redirect()->route('admin.ingredients.index')->with('success', 'Bahan pangan berhasil dibuat.');
    }

    public function edit(Plant $plant)
    {
        $plant->load(['nutrients', 'regions']);

        return view('admin.plants.edit', [
            'plant' => $plant,
            'categories' => $this->ensureCategories(),
        ]);
    }

    public function update(PlantRequest $request, Plant $plant)
    {
        $data = $request->validated();
        $wasPublished = (bool) $plant->is_published;

        $plant = DB::transaction(function () use ($request, $plant, $data) {
            if ($request->hasFile('image')) {
                if ($plant->image_path) {
                    Storage::disk('public')->delete($plant->image_path);
                }
                $data['image_path'] = $request->file('image')->store('plants', 'public');
            }

            $plant->update($data);

            $this->syncFoodComposition($plant, $data['nutrient_values'] ?? []);
            $this->syncRegions($plant, $data['regions'] ?? []);

            return $plant;
        });

        if (! $wasPublished && $plant->is_published) {
            $this->notifyPublicUsersAboutPublishedPlant($plant);
        }

        return redirect()->route('admin.ingredients.index')->with('success', 'Bahan pangan berhasil diperbarui.');
    }

    public function destroy(Plant $plant)
    {
        if ($plant->image_path) {
            Storage::disk('public')->delete($plant->image_path);
        }

        $plant->delete();

        return redirect()->route('admin.ingredients.index')->with('success', 'Bahan pangan berhasil dihapus.');
    }

    private function syncFoodComposition(Plant $plant, array $values): void
    {
        $managedNutrients = collect(Nutrient::foodCompositionDefinitions())
            ->mapWithKeys(function (array $definition, string $slug) {
                return [
                    $slug => Nutrient::query()->firstOrCreate(
                        ['slug' => $slug],
                        $definition
                    ),
                ];
            });

        $managedIds = $managedNutrients->pluck('id')->all();
        $plant->nutrients()->detach($managedIds);

        $sync = collect($values)
            ->filter(fn ($amount) => $amount !== null && $amount !== '')
            ->mapWithKeys(function ($amount, string $slug) use ($managedNutrients) {
                if (! $managedNutrients->has($slug)) {
                    return [];
                }

                return [
                    $managedNutrients[$slug]->id => [
                        'amount' => (float) $amount,
                        'notes' => 'Data komposisi gizi per 100 gram',
                    ],
                ];
            })
            ->all();

        if ($sync !== []) {
            $plant->nutrients()->syncWithoutDetaching($sync);
        }
    }

    private function syncRegions(Plant $plant, array $items): void
    {
        $sync = collect($items)->mapWithKeys(fn($row) => [
            (int) $row['id'] => [
                'abundance_level' => $row['abundance_level'],
                'notes' => $row['notes'] ?? null,
            ],
        ])->all();

        $plant->regions()->sync($sync);
    }

    private function ensureCategories()
    {
        foreach (CategorySeeder::definitions() as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        return Category::query()->orderBy('name')->get();
    }

    private function notifyPublicUsersAboutPublishedPlant(Plant $plant): void
    {
        User::query()
            ->where(function ($query) {
                $query->whereNull('role')->orWhere('role', '!=', 'admin');
            })
            ->where(function ($query) {
                $query->whereNull('is_admin')->orWhere('is_admin', false);
            })
            ->select(['id'])
            ->chunkById(200, function ($users) use ($plant) {
                foreach ($users as $user) {
                    $user->notify(new NewIngredientPublishedNotification($plant));
                }
            });
    }

    private function notifyAdminUsersAboutIngredientInput(Plant $plant): void
    {
        User::query()
            ->where(function ($query) {
                $query->where('role', 'admin')->orWhere('is_admin', true);
            })
            ->select(['id'])
            ->chunkById(200, function ($users) use ($plant) {
                foreach ($users as $user) {
                    $user->notify(new NewIngredientPublishedNotification($plant));
                }
            });
    }
}
