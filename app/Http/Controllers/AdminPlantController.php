<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPlantController extends Controller
{
    public function index()
    {
        $plants = Plant::with('category')->latest()->paginate(10);
        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.plants.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'local_name' => 'required',
            'scientific_name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plants', 'public');
        }

        Plant::create([
            'local_name' => $request->local_name,
            'scientific_name' => $request->scientific_name,
            'slug' => Str::slug($request->local_name),
            'description' => $request->description,
            'health_benefits' => $request->health_benefits,
            'processing_potential' => $request->processing_potential,
            'category_id' => $request->category_id,
            'image_path' => $imagePath,
            'is_published' => $request->has('is_published')
        ]);

        return redirect()->route('admin.ingredients.index')
            ->with('success', 'Ingredient added successfully.');
    }

    public function edit(Plant $plant)
    {
        $categories = Category::all();
        return view('admin.plants.edit', compact('plant', 'categories'));
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'local_name' => 'required',
            'scientific_name' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $plant->update([
            'local_name' => $request->local_name,
            'scientific_name' => $request->scientific_name,
            'slug' => Str::slug($request->local_name),
            'description' => $request->description,
            'health_benefits' => $request->health_benefits,
            'processing_potential' => $request->processing_potential,
            'category_id' => $request->category_id,
            'is_published' => $request->has('is_published')
        ]);

        return redirect()->route('admin.ingredients.index')
            ->with('success', 'Ingredient updated successfully.');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
        return back()->with('success', 'Ingredient deleted successfully.');
    }
}
