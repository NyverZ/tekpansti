@extends('layouts.app')

@section('content')
    <section class="sf-container">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="sf-chip">Perbandingan Nutrisi</span>
                <h1 class="mt-4 text-5xl font-bold text-slate-900 dark:text-white">Bandingkan bahan pangan secara berdampingan</h1>
                <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600 dark:text-slate-300">
                    Ubah perbandingan tanaman sebelumnya menjadi alat pengambilan keputusan untuk edukasi keamanan pangan, perencanaan menu, dan analisis nutrisi.
                </p>
            </div>
        </div>

        <div class="sf-panel mt-10 p-6">
            <form method="POST" action="{{ route('foods.compare.result') }}" class="grid gap-4 lg:grid-cols-[1fr_1fr_auto]">
                @csrf
                <div>
                    <label for="food_1" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Bahan Pangan A</label>
                    <select id="food_1" name="food_1" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        <option value="">Pilih bahan pangan</option>
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}" @selected((int) old('food_1', $foodA->id ?? 0) === $food->id)>{{ $food->local_name }}</option>
                        @endforeach
                    </select>
                    @error('food_1')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="food_2" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">Bahan Pangan B</label>
                    <select id="food_2" name="food_2" class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-800 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-100">
                        <option value="">Pilih bahan pangan</option>
                        @foreach ($foods as $food)
                            <option value="{{ $food->id }}" @selected((int) old('food_2', $foodB->id ?? 0) === $food->id)>{{ $food->local_name }}</option>
                        @endforeach
                    </select>
                    @error('food_2')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-end">
                    <button class="sf-button-primary">Bandingkan</button>
                </div>
            </form>
        </div>

        @isset($foodA, $foodB, $comparisonRows)
            <div class="mt-10 grid gap-6 lg:grid-cols-2">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Bahan Pangan A</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">{{ $foodA->local_name }}</h2>
                    <p class="mt-2 text-sm italic text-slate-500 dark:text-slate-400">{{ $foodA->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $foodA->description }}</p>
                </div>
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Bahan Pangan B</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">{{ $foodB->local_name }}</h2>
                    <p class="mt-2 text-sm italic text-slate-500 dark:text-slate-400">{{ $foodB->scientific_name }}</p>
                    <p class="mt-5 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $foodB->description }}</p>
                </div>
            </div>

            <div class="mt-10 grid gap-6 xl:grid-cols-[1fr_0.95fr]">
                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Grafik Perbandingan</p>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900 dark:text-white">Ringkasan perbedaan nutrisi</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-600 dark:text-slate-300">
                        Grafik menggunakan skala relatif per komponen agar karbohidrat, protein, lemak, dan kalsium tetap terlihat jelas meskipun memiliki satuan berbeda.
                    </p>
                    <div class="relative mt-8 h-80">
                        <canvas id="comparisonChart" height="300"></canvas>
                    </div>
                </div>

                <div class="sf-panel p-8">
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-500 dark:text-slate-400">Tabel perbandingan</p>
                    <div class="mt-6 space-y-3">
                        @foreach ($comparisonRows as $row)
                            <div class="rounded-[1.5rem] bg-slate-50 px-5 py-4 dark:bg-slate-900/70">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="font-semibold text-slate-900 dark:text-white">{{ $row['label'] }}</p>
                                        <p class="text-xs uppercase tracking-[0.2em] text-slate-500 dark:text-slate-400">{{ $row['unit'] ?: 'tanpa satuan' }}</p>
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

            @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const comparisonRows = @json($comparisonRows);
                    const comparisonChartElement = document.getElementById('comparisonChart');

                    if (comparisonChartElement && window.Chart && comparisonRows.length) {
                        const isDarkMode = document.documentElement.classList.contains('dark');
                        const tickColor = isDarkMode ? '#cbd5e1' : '#475569';
                        const gridColor = isDarkMode ? 'rgba(148, 163, 184, 0.18)' : 'rgba(15, 23, 42, 0.08)';
                        const tooltipBackground = isDarkMode ? '#0f172a' : '#111827';
                        const ctx = comparisonChartElement.getContext('2d');

                        const gradientA = ctx.createLinearGradient(0, 0, 0, 320);
                        gradientA.addColorStop(0, '#2dd4bf');
                        gradientA.addColorStop(1, '#0f766e');

                        const gradientB = ctx.createLinearGradient(0, 0, 0, 320);
                        gradientB.addColorStop(0, '#fbbf24');
                        gradientB.addColorStop(1, '#d97706');

                        const normalizedFoodA = comparisonRows.map((row) => {
                            const maxValue = Math.max(Number(row.food_a) || 0, Number(row.food_b) || 0, 1);

                            return Number((((Number(row.food_a) || 0) / maxValue) * 100).toFixed(1));
                        });

                        const normalizedFoodB = comparisonRows.map((row) => {
                            const maxValue = Math.max(Number(row.food_a) || 0, Number(row.food_b) || 0, 1);

                            return Number((((Number(row.food_b) || 0) / maxValue) * 100).toFixed(1));
                        });

                        window.safeFoodComparisonChart?.destroy();

                        window.safeFoodComparisonChart = new Chart(comparisonChartElement, {
                            type: 'bar',
                            data: {
                                labels: comparisonRows.map((row) => `${row.label} (${row.unit || 'tanpa satuan'})`),
                                datasets: [
                                    {
                                        label: @json($foodA->local_name),
                                        data: normalizedFoodA,
                                        rawValues: comparisonRows.map((row) => Number(row.food_a) || 0),
                                        backgroundColor: gradientA,
                                        borderRadius: 12,
                                        barThickness: 24,
                                    },
                                    {
                                        label: @json($foodB->local_name),
                                        data: normalizedFoodB,
                                        rawValues: comparisonRows.map((row) => Number(row.food_b) || 0),
                                        backgroundColor: gradientB,
                                        borderRadius: 12,
                                        barThickness: 24,
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                interaction: {
                                    mode: 'index',
                                    intersect: false,
                                },
                                plugins: {
                                    legend: {
                                        position: 'top',
                                        labels: {
                                            color: tickColor,
                                            font: {
                                                size: 14,
                                                weight: '600',
                                            }
                                        }
                                    },
                                    tooltip: {
                                        backgroundColor: tooltipBackground,
                                        titleColor: '#ffffff',
                                        bodyColor: '#e5e7eb',
                                        padding: 12,
                                        cornerRadius: 10,
                                        callbacks: {
                                            label(context) {
                                                const row = comparisonRows[context.dataIndex];
                                                const rawValue = context.dataset.rawValues[context.dataIndex];

                                                return `${context.dataset.label}: ${rawValue} ${row.unit}`;
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
                                            display: false,
                                        },
                                        ticks: {
                                            color: tickColor,
                                            font: {
                                                size: 12,
                                            }
                                        }
                                    },
                                    y: {
                                        beginAtZero: true,
                                        max: 100,
                                        grid: {
                                            color: gridColor,
                                        },
                                        ticks: {
                                            color: tickColor,
                                            callback(value) {
                                                return `${value}%`;
                                            }
                                        }
                                    }
                                },
                                animation: {
                                    duration: 1000,
                                    easing: 'easeOutQuart',
                                }
                            }
                        });
                    }
                </script>
            @endpush
        @else
            <div class="sf-panel mt-10 p-10 text-center">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Pilih dua bahan pangan untuk melihat perbandingan nutrisi.</h2>
                <p class="mt-3 text-sm text-slate-600 dark:text-slate-300">Contoh: ayam vs tempe, apel vs pisang, atau nasi vs jagung.</p>
            </div>
        @endisset
    </section>
@endsection
