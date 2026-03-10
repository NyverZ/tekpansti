<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Plant;
use App\Models\Nutrient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class PlantCatalogController extends Controller
{
    public function index(Request $request): View
    {
        $foods = Plant::query()
            ->published()
            ->with('category')
            ->withCount('nutrients')
            ->when(
                $request->filled('search'),
                fn ($query) => $query->where(function ($foodQuery) use ($request) {
                    $search = $request->string('search');

                    $foodQuery
                        ->where('local_name', 'like', '%' . $search . '%')
                        ->orWhere('scientific_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                })
            )
            ->when(
                $request->filled('category'),
                fn ($query) => $query->whereHas(
                    'category',
                    fn ($categoryQuery) => $categoryQuery->where('slug', $request->string('category'))
                )
            )
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('plants.index', [
            'foods' => $foods,
            'categories' => Cache::remember('safefood.categories.options', now()->addHour(), fn () => Category::query()
                ->orderBy('name')
                ->select(['id', 'name', 'slug'])
                ->get()),
        ]);
    }

    public function show(Plant $plant): View
    {
        $plant->load(['category', 'nutrients']);

        $chartData = $this->buildNutrientRows($plant);

        return view('plants.show', [
            'food' => $plant,
            'chartData' => $chartData,
        ]);
    }

    public function compare(): View
    {
        return view('plants.compare', [
            'foods' => Cache::remember('safefood.compare.food-options', now()->addMinutes(15), fn () => Plant::query()
                ->published()
                ->orderBy('local_name')
                ->select(['id', 'local_name'])
                ->get()),
        ]);
    }

    public function compareResult(Request $request): View|RedirectResponse
    {
        $validated = $request->validate([
            'food_1' => ['required', 'different:food_2', 'exists:plants,id'],
            'food_2' => ['required', 'exists:plants,id'],
        ]);

        $foods = Cache::remember('safefood.compare.food-options', now()->addMinutes(15), fn () => Plant::query()
            ->published()
            ->orderBy('local_name')
            ->select(['id', 'local_name'])
            ->get());

        $selectedFoods = Plant::query()
            ->published()
            ->with('nutrients')
            ->whereIn('id', [$validated['food_1'], $validated['food_2']])
            ->get()
            ->keyBy('id');

        $foodA = $selectedFoods->get((int) $validated['food_1']);
        $foodB = $selectedFoods->get((int) $validated['food_2']);

        if (! $foodA || ! $foodB) {
            return redirect()
                ->route('foods.compare')
                ->with('error', 'Bahan pangan yang dipilih tidak ditemukan.');
        }

        $comparisonRows = $this->buildComparisonRows($foodA, $foodB);

        return view('plants.compare', compact('foods', 'foodA', 'foodB', 'comparisonRows'));
    }

    private function nutrientDefinitions()
    {
        $definitions = collect(Nutrient::foodCompositionDefinitions());
        $existing = Nutrient::query()
            ->whereIn('slug', $definitions->keys())
            ->get()
            ->keyBy('slug');

        return $definitions->map(function (array $definition, string $slug) use ($existing) {
            $nutrient = $existing->get($slug);

            return (object) [
                'slug' => $slug,
                'name' => $nutrient?->name ?? $definition['name'],
                'unit' => $nutrient?->unit ?? $definition['unit'],
            ];
        })->values();
    }

    private function buildNutrientRows(Plant $plant)
    {
        return $this->nutrientDefinitions()
            ->map(function (object $nutrient) use ($plant) {
                $current = $plant->nutrients->firstWhere('slug', $nutrient->slug);

                return [
                    'label' => $nutrient->name,
                    'slug' => $nutrient->slug,
                    'value' => (float) ($current?->pivot->amount ?? 0),
                    'unit' => $current?->unit ?? $nutrient->unit,
                ];
            })
            ->values();
    }

    private function buildComparisonRows(Plant $foodA, Plant $foodB)
    {
        $nutrients = $this->nutrientDefinitions();

        return $nutrients->map(function (object $nutrient) use ($foodA, $foodB) {
            $nutrientA = $foodA->nutrients->firstWhere('slug', $nutrient->slug);
            $nutrientB = $foodB->nutrients->firstWhere('slug', $nutrient->slug);

            return [
                'label' => $nutrient->name,
                'unit' => $nutrient->unit,
                'food_a' => (float) ($nutrientA?->pivot->amount ?? 0),
                'food_b' => (float) ($nutrientB?->pivot->amount ?? 0),
            ];
        })->values();
    }
}
