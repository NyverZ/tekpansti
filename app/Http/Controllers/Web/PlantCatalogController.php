<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Plant;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlantCatalogController extends Controller
{
    public function index(Request $request)
    {
        $plants = Plant::query()
            ->where('is_published', true)
            ->with('category')
            ->when(
                $request->filled('search'),
                fn($q) =>
                $q->where(function ($qq) use ($request) {
                    $qq->where('local_name', 'like', "%{$request->search}%")
                        ->orWhere('scientific_name', 'like', "%{$request->search}%");
                })
            )
            ->when(
                $request->filled('category'),
                fn($q) =>
                $q->whereHas('category', fn($qq) => $qq->where('slug', $request->category))
            )
            ->when(
                $request->filled('region'),
                fn($q) =>
                $q->whereHas('regions', fn($qq) => $qq->where('id', $request->integer('region')))
            )
            ->paginate(12)
            ->withQueryString();

        return view('plants.index', [
            'plants' => $plants,
            'categories' => Category::orderBy('name')->get(),
            'regions' => Region::orderBy('name')->get(),
        ]);
    }

    public function show(Plant $plant)
    {
        $plant->load(['category', 'nutrients', 'regions']);
        return view('plants.show', compact('plant'));
    }
    public function compare()
    {
        $plants = Plant::where('is_published', true)->get();
        return view('plants.compare', compact('plants'));
    }

    public function compareResult(Request $request)
    {
        $request->validate([
            'plant1' => 'required|different:plant2',
            'plant2' => 'required'
        ]);

        $plant1 = Plant::with('nutrients')->findOrFail($request->plant1);
        $plant2 = Plant::with('nutrients')->findOrFail($request->plant2);

        return view('plants.compare', compact('plant1', 'plant2'))
            ->with('plants', Plant::where('is_published', true)->get());
    }

    public function search(Request $request)
    {

        $keyword = $request->q;

        $plants = Plant::where('local_name', 'like', "%$keyword%")
            ->orWhere('scientific_name', 'like', "%$keyword%")
            ->get();

        return view('plants.index', compact('plants'));
    }
}
