@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="sf-panel overflow-hidden">
                <div class="h-72 bg-[linear-gradient(145deg,#0f766e,#f59e0b)]"></div>
                <div class="p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">{{ $food->category?->name ?? 'Bahan Pangan' }}</p>
                    <h1 class="mt-3 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl dark:text-white">{{ $food->local_name }}</h1>
                    <p class="mt-2 text-sm italic text-slate-500 dark:text-slate-400">{{ $food->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-8 text-slate-600 dark:text-slate-300">{{ $food->description }}</p>
                    <div class="mt-8 grid gap-4">
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Konteks nutrisi</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $food->health_benefits ?: 'Gunakan bahan pangan ini sebagai bagian dari pola makan seimbang yang disiapkan dengan aman.' }}</p>
                        </div>
                        <div class="rounded-[1.5rem] bg-slate-50 p-5">
                            <p class="text-sm uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">Catatan pengolahan aman</p>
                            <p class="mt-2 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $food->processing_potential ?: 'Tinjau langkah penyimpanan, sanitasi, dan persiapan sebelum menyajikan bahan pangan ini.' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Grafik nutrisi</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Profil nutrisi utama</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        Grafik ditampilkan dalam skala relatif agar semua komponen nutrisi tetap mudah dibaca meskipun satuannya berbeda.
                    </p>
                    <div class="relative mt-8 h-72">
                        <canvas id="foodNutritionChart" height="280"></canvas>
                    </div>
                </div>

                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Data nutrisi</p>
                    <div class="mt-6 space-y-3">
                        @foreach ($chartData as $item)
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3 dark:bg-slate-900/70">
                                <span class="font-medium text-slate-700 dark:text-slate-200">{{ $item['label'] }}</span>
                                <span class="text-sm text-slate-500 dark:text-slate-400">{{ $item['value'] }} {{ $item['unit'] }}</span>
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
            const foodNutritionChart = document.getElementById('foodNutritionChart');

            if (foodNutritionChart && window.Chart && nutrientData.length) {
                const isDarkMode = document.documentElement.classList.contains('dark');
                const tickColor = isDarkMode ? '#cbd5e1' : '#475569';
                const gridColor = isDarkMode ? 'rgba(148, 163, 184, 0.18)' : 'rgba(15, 23, 42, 0.08)';
                const tooltipBackground = isDarkMode ? '#0f172a' : '#111827';
                const highestValue = Math.max(...nutrientData.map((item) => Number(item.value) || 0), 1);

                new Chart(foodNutritionChart, {
                    type: 'bar',
                    data: {
                        labels: nutrientData.map((item) => `${item.label} (${item.unit})`),
                        datasets: [{
                            label: 'Skala relatif per 100 g',
                            data: nutrientData.map((item) => Number((((Number(item.value) || 0) / highestValue) * 100).toFixed(1))),
                            rawValues: nutrientData.map((item) => Number(item.value) || 0),
                            backgroundColor: ['#0f766e', '#155e75', '#d97706', '#f59e0b'],
                            borderRadius: 10,
                            barThickness: 26,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: tooltipBackground,
                                titleColor: '#ffffff',
                                bodyColor: '#e5e7eb',
                                callbacks: {
                                    label(context) {
                                        const row = nutrientData[context.dataIndex];
                                        const rawValue = context.dataset.rawValues[context.dataIndex];

                                        return `${row.label}: ${rawValue} ${row.unit}`;
                                    },
                                    afterLabel(context) {
                                        return `Skala relatif: ${context.formattedValue}%`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: tickColor
                                }
                            },
                            y: {
                                beginAtZero: true,
                                max: 100,
                                grid: {
                                    color: gridColor
                                },
                                ticks: {
                                    color: tickColor,
                                    callback(value) {
                                        return `${value}%`;
                                    }
                                }
                            }
                        }
                    }
                });
            }
        </script>
    @endpush
@endsection
