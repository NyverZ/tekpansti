<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nutrient;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NutrientController extends Controller
{
    public function index()
    {
        $nutrients = Nutrient::latest()->paginate(15);
        return view('admin.nutrients.index', compact('nutrients'));
    }

    public function create()
    {
        return view('admin.nutrients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'slug' => ['nullable', 'string', 'max:140', 'unique:nutrients,slug'],
            'unit' => ['required', 'string', 'max:30'],
            'description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        Nutrient::create($data);

        return redirect()->route('admin.nutrients.index')->with('success', 'Nutrient created.');
    }

    public function edit(Nutrient $nutrient)
    {
        return view('admin.nutrients.edit', compact('nutrient'));
    }

    public function update(Request $request, Nutrient $nutrient)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'slug' => ['nullable', 'string', 'max:140', Rule::unique('nutrients', 'slug')->ignore($nutrient->id)],
            'unit' => ['required', 'string', 'max:30'],
            'description' => ['nullable', 'string'],
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);

        $nutrient->update($data);

        return redirect()->route('admin.nutrients.index')->with('success', 'Nutrient updated.');
    }

    public function destroy(Nutrient $nutrient)
    {
        $nutrient->delete();
        return redirect()->route('admin.nutrients.index')->with('success', 'Nutrient deleted.');
    }
}
