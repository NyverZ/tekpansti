<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PlantResource;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        $plants = Plant::query()
            ->where('is_published', true)
            ->with(['category', 'nutrients', 'regions'])
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
            ->paginate($request->integer('per_page', 15));

        return PlantResource::collection($plants);
    }

    public function show(Plant $plant)
    {
        $plant->load(['category', 'nutrients', 'regions']);
        return new PlantResource($plant);
    }
}
