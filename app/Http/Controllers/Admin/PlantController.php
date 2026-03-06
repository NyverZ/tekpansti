<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PlantRequest;
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
            'categories' => Category::orderBy('name')->get(),
            'nutrients' => Nutrient::orderBy('name')->get(),
            'regions' => Region::orderBy('name')->get(),
        ]);
    }

    public function store(PlantRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($request, $data) {
            if ($request->hasFile('image')) {
                $data['image_path'] = $request->file('image')->store('plants', 'public');
            }

            $plant = Plant::create($data);

            $this->syncNutrients($plant, $data['nutrients'] ?? []);
            $this->syncRegions($plant, $data['regions'] ?? []);
        });

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient created.');
    }

    public function edit(Plant $plant)
    {
        $plant->load(['nutrients', 'regions']);

        return view('admin.plants.edit', [
            'plant' => $plant,
            'categories' => Category::orderBy('name')->get(),
            'nutrients' => Nutrient::orderBy('name')->get(),
            'regions' => Region::orderBy('name')->get(),
        ]);
    }

    public function update(PlantRequest $request, Plant $plant)
    {
        $data = $request->validated();

        DB::transaction(function () use ($request, $plant, $data) {
            if ($request->hasFile('image')) {
                if ($plant->image_path) {
                    Storage::disk('public')->delete($plant->image_path);
                }
                $data['image_path'] = $request->file('image')->store('plants', 'public');
            }

            $plant->update($data);

            $this->syncNutrients($plant, $data['nutrients'] ?? []);
            $this->syncRegions($plant, $data['regions'] ?? []);
        });

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient updated.');
    }

    public function destroy(Plant $plant)
    {
        if ($plant->image_path) {
            Storage::disk('public')->delete($plant->image_path);
        }

        $plant->delete();

        return redirect()->route('admin.ingredients.index')->with('success', 'Ingredient deleted.');
    }

    private function syncNutrients(Plant $plant, array $items): void
    {
        $sync = collect($items)->mapWithKeys(fn($row) => [
            (int) $row['id'] => [
                'amount' => $row['amount'],
                'notes' => $row['notes'] ?? null,
            ],
        ])->all();

        $plant->nutrients()->sync($sync);
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
}
