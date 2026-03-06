@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="sf-panel overflow-hidden">
                <div class="h-72 bg-[linear-gradient(145deg,#0f766e,#f59e0b)]"></div>
                <div class="p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">{{ $food->category?->name ?? 'Ingredient' }}</p>
                    <h1 class="mt-3 text-4xl font-bold text-slate-900">{{ $food->local_name }}</h1>
                    <p class="mt-2 text-sm italic text-slate-500">{{ $food->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-8 text-slate-600">{{ $food->description }}</p>
                    <div class="mt-8 grid gap-4">
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Nutrition context</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $food->health_benefits ?: 'Use this ingredient as part of a balanced and safely prepared meal plan.' }}</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Safe processing notes</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $food->processing_potential ?: 'Review storage, sanitation, and preparation steps before serving this ingredient.' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Nutrition chart</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Key nutrient profile</h2>
                    <div class="mt-8">
                        <canvas id="foodNutritionChart" height="280"></canvas>
                    </div>
                </div>

                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Nutrient data</p>
                    <div class="mt-6 space-y-3">
                        @foreach ($chartData as $item)
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <span class="font-medium text-slate-700">{{ $item['label'] }}</span>
                                <span class="text-sm text-slate-500">{{ $item['value'] }} {{ $item['unit'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const nutrientData = @json($chartData);

        new Chart(document.getElementById('foodNutritionChart'), {
            type: 'bar',
            data: {
                labels: nutrientData.map(item => item.label),
                datasets: [{
                    label: 'Per 100g reference',
                    data: nutrientData.map(item => item.value),
                    backgroundColor: ['#0f766e', '#155e75', '#d97706', '#f59e0b', '#334155', '#16a34a'],
                    borderRadius: 10,
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
