<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlantCatalogController extends Controller
{
    public function index(Request $request): View
    {
        $foods = Plant::query()
            ->published()
            ->with(['category', 'nutrients'])
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
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }

    public function show(Plant $plant): View
    {
        $plant->load(['category', 'nutrients']);

        $chartData = $plant->nutrients
            ->map(fn ($nutrient) => [
                'label' => $nutrient->name,
                'value' => (float) $nutrient->pivot->amount,
                'unit' => $nutrient->unit,
            ])
            ->values();

        return view('plants.show', [
            'food' => $plant,
            'chartData' => $chartData,
        ]);
    }

    public function compare(): View
    {
        return view('plants.compare', [
            'foods' => Plant::query()
                ->published()
                ->with('nutrients')
                ->orderBy('local_name')
                ->get(),
        ]);
    }

    public function compareResult(Request $request): View|RedirectResponse
    {
        $validated = $request->validate([
            'food_1' => ['required', 'different:food_2', 'exists:plants,id'],
            'food_2' => ['required', 'exists:plants,id'],
        ]);

        $foods = Plant::query()
            ->published()
            ->with('nutrients')
            ->orderBy('local_name')
            ->get();

        $foodA = $foods->firstWhere('id', (int) $validated['food_1']);
        $foodB = $foods->firstWhere('id', (int) $validated['food_2']);

        if (! $foodA || ! $foodB) {
            return redirect()
                ->route('foods.compare')
                ->with('error', 'Selected ingredients could not be found.');
        }

        $comparisonRows = $foodA->nutrients
            ->merge($foodB->nutrients)
            ->pluck('name')
            ->unique()
            ->values()
            ->map(function (string $label) use ($foodA, $foodB) {
                $nutrientA = $foodA->nutrients->firstWhere('name', $label);
                $nutrientB = $foodB->nutrients->firstWhere('name', $label);

                return [
                    'label' => $label,
                    'unit' => $nutrientA?->unit ?? $nutrientB?->unit ?? '',
                    'food_a' => (float) ($nutrientA?->pivot->amount ?? 0),
                    'food_b' => (float) ($nutrientB?->pivot->amount ?? 0),
                ];
            });

        return view('plants.compare', compact('foods', 'foodA', 'foodB', 'comparisonRows'));
    }
}
