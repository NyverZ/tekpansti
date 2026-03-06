@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Nutrition comparison</span>
                <h1 class="mt-4 text-5xl font-bold text-slate-900">Compare ingredients side by side</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">
                    Turn the previous plant comparison into a decision tool for food safety education, meal planning, and nutritional analysis.
                </p>
            </div>
        </div>

        <div class="sf-panel mt-10 p-6">
            <form method="POST" action="{{ route('foods.compare.result') }}" class="grid gap-4 lg:grid-cols-[1fr_1fr_auto]">
                @csrf
                <div>
                    <label for="food_1" class="mb-2 block text-sm font-semibold text-slate-700">Ingredient A</label>
                    <select id="food_1" name="food_1" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
                        <option value="">Select ingredient</option>
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}" @selected((int) old('food_1', $foodA->id ?? 0) === $food->id)>{{ $food->local_name }}</option>
                        @endforeach
                    </select>
                    @error('food_1')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="food_2" class="mb-2 block text-sm font-semibold text-slate-700">Ingredient B</label>
                    <select id="food_2" name="food_2" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800">
                        <option value="">Select ingredient</option>
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}" @selected((int) old('food_2', $foodB->id ?? 0) === $food->id)>{{ $food->local_name }}</option>
                        @endforeach
                    </select>
                    @error('food_2')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-end">
                    <button class="sf-button-primary">Compare</button>
                </div>
            </form>
        </div>

        @isset($foodA, $foodB, $comparisonRows)
            <div class="mt-10 grid gap-6 lg:grid-cols-2">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Ingredient A</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">{{ $foodA->local_name }}</h2>
                    <p class="mt-2 text-sm italic text-slate-500">{{ $foodA->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-7 text-slate-600">{{ $foodA->description }}</p>
                </div>
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Ingredient B</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">{{ $foodB->local_name }}</h2>
                    <p class="mt-2 text-sm italic text-slate-500">{{ $foodB->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-7 text-slate-600">{{ $foodB->description }}</p>
                </div>
            </div>

            <div class="mt-10 grid gap-6 xl:grid-cols-[1fr_0.95fr]">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Chart.js comparison</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Nutrition difference overview</h2>
                    <div class="mt-8">
                        <canvas id="comparisonChart" height="300"></canvas>
                    </div>
                </div>

                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Comparison table</p>
                    <div class="mt-6 space-y-3">
                        @foreach ($comparisonRows as $row)
                            <div class="rounded-[1.5rem] bg-slate-50 px-5 py-4">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $row['label'] }}</p>
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-500">{{ $row['unit'] ?: 'unitless' }}</p>
                                    </div>
                                    <div class="grid gap-1 text-right text-sm">
                                        <span class="text-teal-700">{{ $foodA->local_name }}: {{ $row['food_a'] }}</span>
                                        <span class="text-amber-700">{{ $foodB->local_name }}: {{ $row['food_b'] }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <script>
                const comparisonRows = @json($comparisonRows);
                const comparisonChart = document.getElementById('comparisonChart');

                new Chart(comparisonChart, {
                    type: 'radar',
                    data: {
                        labels: comparisonRows.map(row => row.label),
                        datasets: [
                            {
                                label: @json($foodA->local_name),
                                data: comparisonRows.map(row => row.food_a),
                                borderColor: '#0f766e',
                                backgroundColor: 'rgba(15, 118, 110, 0.18)',
                            },
                            {
                                label: @json($foodB->local_name),
                                data: comparisonRows.map(row => row.food_b),
                                borderColor: '#d97706',
                                backgroundColor: 'rgba(217, 119, 6, 0.18)',
                            }
                        ]
                    },
                    options: {
                        scales: {
                            r: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        @else
            <div class="sf-panel mt-10 p-10 text-center">
                <h2 class="text-2xl font-bold text-slate-900">Choose two ingredients to see the nutrition comparison.</h2>
                <p class="mt-3 text-sm text-slate-600">Example: chicken vs tempeh, apple vs banana, or rice vs corn.</p>
            </div>
        @endisset
    </section>
@endsection
