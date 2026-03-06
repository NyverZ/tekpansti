<div class="grid gap-6 md:grid-cols-2">
    <div>
        <label for="local_name" class="mb-2 block text-sm font-semibold text-slate-700">Ingredient name</label>
        <input id="local_name" name="local_name" type="text" value="{{ old('local_name', $plant?->local_name) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
    </div>
    <div>
        <label for="scientific_name" class="mb-2 block text-sm font-semibold text-slate-700">Scientific name</label>
        <input id="scientific_name" name="scientific_name" type="text" value="{{ old('scientific_name', $plant?->scientific_name) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
    </div>
</div>

<div>
    <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
    <select id="category_id" name="category_id" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected((int) old('category_id', $plant?->category_id) === $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">Description</label>
    <textarea id="description" name="description" rows="5" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">{{ old('description', $plant?->description) }}</textarea>
</div>

<div class="grid gap-6 md:grid-cols-2">
    <div>
        <label for="health_benefits" class="mb-2 block text-sm font-semibold text-slate-700">Nutrition / benefits</label>
        <textarea id="health_benefits" name="health_benefits" rows="5" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">{{ old('health_benefits', $plant?->health_benefits) }}</textarea>
    </div>
    <div>
        <label for="processing_potential" class="mb-2 block text-sm font-semibold text-slate-700">Handling / processing notes</label>
        <textarea id="processing_potential" name="processing_potential" rows="5" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">{{ old('processing_potential', $plant?->processing_potential) }}</textarea>
    </div>
</div>

<div>
    <label for="image" class="mb-2 block text-sm font-semibold text-slate-700">Image upload</label>
    <input id="image" type="file" name="image" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
</div>

<label class="inline-flex items-center gap-3 rounded-full bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700">
    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $plant?->is_published))>
    Publish ingredient
</label>

<div class="flex gap-3">
    <button class="sf-button-primary">{{ $plant ? 'Update Ingredient' : 'Save Ingredient' }}</button>
    <a href="{{ route('admin.ingredients.index') }}" class="sf-button-secondary">Cancel</a>
</div>
