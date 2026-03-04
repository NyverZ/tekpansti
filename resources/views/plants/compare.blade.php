@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-12">

    {{-- HERO --}}
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-emerald-700 mb-4">
            🔬 Compare Tanaman Herbal
        </h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Bandingkan manfaat, potensi pengolahan, dan kandungan nutrisi dua tanaman herbal secara ilmiah dan visual.
        </p>
    </div>

    {{-- FORM --}}
    <div class="bg-white p-8 rounded-3xl shadow-lg mb-12">
        <form method="POST" action="{{ route('compare.result') }}">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm mb-2 font-medium">Tanaman Pertama</label>
                    <select name="plant1" class="w-full border rounded-xl p-3">
                        <option value="">Pilih Tanaman</option>
                        @foreach($plants as $plant)
                            <option value="{{ $plant->id }}">
                                {{ $plant->local_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm mb-2 font-medium">Tanaman Kedua</label>
                    <select name="plant2" class="w-full border rounded-xl p-3">
                        <option value="">Pilih Tanaman</option>
                        @foreach($plants as $plant)
                            <option value="{{ $plant->id }}">
                                {{ $plant->local_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="text-center mt-8">
                <button class="bg-emerald-600 text-white px-8 py-3 rounded-2xl hover:bg-emerald-700 transition">
                    🚀 Bandingkan Sekarang
                </button>
            </div>
        </form>
    </div>


    {{-- RESULT --}}
    @isset($plant1)
    <div class="grid md:grid-cols-2 gap-10">

        {{-- PLANT 1 --}}
        <div class="bg-white p-6 rounded-3xl shadow-lg">
            <h2 class="text-xl font-bold text-emerald-700 mb-4">
                {{ $plant1->local_name }}
            </h2>
            <p class="text-gray-500 italic mb-4">
                {{ $plant1->scientific_name }}
            </p>

            <p class="mb-4">
                <strong>Manfaat:</strong> {{ $plant1->health_benefits }}
            </p>

            <p class="mb-4">
                <strong>Potensi Pengolahan:</strong> {{ $plant1->processing_potential }}
            </p>

            <canvas id="chart1"></canvas>
        </div>

        {{-- PLANT 2 --}}
        <div class="bg-white p-6 rounded-3xl shadow-lg">
            <h2 class="text-xl font-bold text-blue-700 mb-4">
                {{ $plant2->local_name }}
            </h2>
            <p class="text-gray-500 italic mb-4">
                {{ $plant2->scientific_name }}
            </p>

            <p class="mb-4">
                <strong>Manfaat:</strong> {{ $plant2->health_benefits }}
            </p>

            <p class="mb-4">
                <strong>Potensi Pengolahan:</strong> {{ $plant2->processing_potential }}
            </p>

            <canvas id="chart2"></canvas>
        </div>

    </div>

    {{-- CHART SCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function renderChart(id, labels, data, color) {
            new Chart(document.getElementById(id), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: color
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    responsive: true
                }
            });
        }

        renderChart(
            'chart1',
            {!! json_encode($plant1->nutrients->pluck('name')) !!},
            {!! json_encode($plant1->nutrients->pluck('pivot.amount')) !!},
            '#10b981'
        );

        renderChart(
            'chart2',
            {!! json_encode($plant2->nutrients->pluck('name')) !!},
            {!! json_encode($plant2->nutrients->pluck('pivot.amount')) !!},
            '#3b82f6'
        );
    </script>
    @endisset

</div>

@endsection
