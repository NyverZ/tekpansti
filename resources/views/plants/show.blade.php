@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="sf-panel overflow-hidden">
                <div class="h-72 bg-[linear-gradient(145deg,#0f766e,#f59e0b)]"></div>
                <div class="p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">{{ $food->category?->name ?? 'Bahan Pangan' }}</p>
                    <h1 class="mt-3 text-4xl font-bold text-slate-900">{{ $food->local_name }}</h1>
                    <p class="mt-2 text-sm italic text-slate-500">{{ $food->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-8 text-slate-600">{{ $food->description }}</p>
                    <div class="mt-8 grid gap-4">
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Konteks nutrisi</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $food->health_benefits ?: 'Gunakan bahan pangan ini sebagai bagian dari pola makan seimbang yang disiapkan dengan aman.' }}</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Catatan pengolahan aman</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600">{{ $food->processing_potential ?: 'Tinjau langkah penyimpanan, sanitasi, dan persiapan sebelum menyajikan bahan pangan ini.' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Grafik nutrisi</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900">Profil nutrisi utama</h2>
                    <div class="mt-8">
                        <canvas id="foodNutritionChart" height="280"></canvas>
                    </div>
                </div>

                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500">Data nutrisi</p>
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

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const nutrientData = @json($chartData);

            new Chart(document.getElementById('foodNutritionChart'), {
                type: 'bar',
                data: {
                    labels: nutrientData.map(item => item.label),
                    datasets: [{
                        label: 'Acuan per 100 g',
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
    @endpush
@endsection
