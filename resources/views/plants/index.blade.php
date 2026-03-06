@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <span class="sf-chip">Food ingredients catalog</span>
                <h1 class="mt-4 text-5xl font-bold text-slate-900">Explore ingredients with safety and nutrition context</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">
                    Refactored from the old plant catalog into a SafeFood ingredient directory focused on nutrition data, food handling, and practical educational value.
                </p>
            </div>
        </div>

        <div class="sf-panel mt-10 p-6">
            <form method="GET" action="{{ route('foods.index') }}" class="grid gap-4 lg:grid-cols-[1.3fr_0.7fr_auto]">
                <div>
                    <label for="search" class="mb-2 block text-sm font-semibold text-slate-700">Search ingredient</label>
                    <input id="search" type="text" name="search" value="{{ request('search') }}" placeholder="Chicken, tempeh, spinach, rice..." class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 focus:border-teal-600 focus:outline-none">
                </div>
                <div>
                    <label for="category" class="mb-2 block text-sm font-semibold text-slate-700">Category</label>
                    <select id="category" name="category" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 focus:border-teal-600 focus:outline-none">
                        <option value="">All categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end gap-3">
                    <button class="sf-button-primary">Apply</button>
                    <a href="{{ route('foods.index') }}" class="sf-button-secondary">Reset</a>
                </div>
            </form>
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($foods as $food)
                <article class="sf-panel overflow-hidden">
                    <div class="h-48 bg-[linear-gradient(135deg,#f59e0b,#0f766e)]"></div>
                    <div class="p-8">
                        <p class="text-sm uppercase tracking-[0.24em] text-slate-500">{{ $food->category?->name ?? 'Ingredient' }}</p>
                        <h2 class="mt-3 text-2xl font-bold text-slate-900">{{ $food->local_name }}</h2>
                        <p class="mt-2 text-sm italic text-slate-500">{{ $food->scientific_name }}</p>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ \Illuminate\Support\Str::limit($food->description, 120) }}</p>
                        <div class="mt-6 flex items-center justify-between text-sm text-slate-500">
                            <span>{{ $food->nutrients->count() }} nutrition indicators</span>
                            <a href="{{ route('foods.show', $food) }}" class="font-semibold text-teal-700">Details</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="sf-panel col-span-full p-10 text-center">
                    <h2 class="text-2xl font-bold text-slate-900">No ingredients matched your filters.</h2>
                    <p class="mt-3 text-sm text-slate-600">Try another keyword or category to continue exploring SafeFood data.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $foods->links() }}
        </div>
    </section>
@endsection
