@php
    $nutrientValues = [
        'carbohydrate' => old('nutrient_values.carbohydrate', data_get($plant?->nutrients->firstWhere('slug', 'carbohydrate'), 'pivot.amount')),
        'protein' => old('nutrient_values.protein', data_get($plant?->nutrients->firstWhere('slug', 'protein'), 'pivot.amount')),
        'fat' => old('nutrient_values.fat', data_get($plant?->nutrients->firstWhere('slug', 'fat'), 'pivot.amount')),
        'calcium' => old('nutrient_values.calcium', data_get($plant?->nutrients->firstWhere('slug', 'calcium'), 'pivot.amount')),
    ];
@endphp

<div class="grid gap-6 md:grid-cols-2">
    <div>
        <label for="local_name" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Nama bahan pangan</label>
        <input id="local_name" name="local_name" type="text" value="{{ old('local_name', $plant?->local_name) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
    </div>
    <div>
        <label for="scientific_name" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Nama ilmiah</label>
        <input id="scientific_name" name="scientific_name" type="text" value="{{ old('scientific_name', $plant?->scientific_name) }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
    </div>
</div>

<div>
    <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Kategori</label>
    <select id="category_id" name="category_id" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected((int) old('category_id', $plant?->category_id) === $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label for="description" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Deskripsi</label>
    <textarea id="description" name="description" rows="5" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('description', $plant?->description) }}</textarea>
</div>

<div class="grid gap-6 md:grid-cols-2">
    <div>
        <label for="health_benefits" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Nutrisi / manfaat</label>
        <textarea id="health_benefits" name="health_benefits" rows="5" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('health_benefits', $plant?->health_benefits) }}</textarea>
    </div>
    <div>
        <label for="processing_potential" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Catatan penanganan / pengolahan</label>
        <textarea id="processing_potential" name="processing_potential" rows="5" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">{{ old('processing_potential', $plant?->processing_potential) }}</textarea>
    </div>
</div>

<div class="rounded-[1.75rem] border border-slate-200 bg-slate-50/80 p-6 dark:border-slate-700 dark:bg-slate-800/60">
    <div class="mb-5">
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Komposisi Gizi (per 100g)</h3>
        <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Masukkan data karbohidrat, protein, lemak, dan kalsium sesuai sumber gizi yang Anda gunakan.</p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div>
            <label for="nutrient_carbohydrate" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Karbohidrat (g)</label>
            <input id="nutrient_carbohydrate" name="nutrient_values[carbohydrate]" type="number" step="0.1" min="0" value="{{ $nutrientValues['carbohydrate'] }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
            @error('nutrient_values.carbohydrate')
                <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nutrient_protein" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Protein (g)</label>
            <input id="nutrient_protein" name="nutrient_values[protein]" type="number" step="0.1" min="0" value="{{ $nutrientValues['protein'] }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
            @error('nutrient_values.protein')
                <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nutrient_fat" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Lemak (g)</label>
            <input id="nutrient_fat" name="nutrient_values[fat]" type="number" step="0.1" min="0" value="{{ $nutrientValues['fat'] }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
            @error('nutrient_values.fat')
                <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nutrient_calcium" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Kalsium (mg)</label>
            <input id="nutrient_calcium" name="nutrient_values[calcium]" type="number" step="0.1" min="0" value="{{ $nutrientValues['calcium'] }}" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
            @error('nutrient_values.calcium')
                <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>

<div>
    <label for="image" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Unggah gambar</label>
    <input id="image" type="file" name="image" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
</div>

<label class="inline-flex items-center gap-3 rounded-full bg-slate-50 px-4 py-3 text-sm font-medium text-slate-700 dark:bg-slate-800 dark:text-slate-300">
    <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $plant?->is_published))>
    Publikasikan bahan pangan
</label>

<div class="flex gap-3">
    <button class="sf-button-primary">{{ $plant ? 'Perbarui Bahan Pangan' : 'Simpan Bahan Pangan' }}</button>
    <a href="{{ route('admin.ingredients.index') }}" class="sf-button-secondary">Batal</a>
</div>
