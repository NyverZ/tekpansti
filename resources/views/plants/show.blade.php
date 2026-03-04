@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 max-w-4xl">

    <div class="dark:bg-gray-800 shadow-lg rounded-2xl overflow-hidden">

        @if($plant->image)
            <img src="{{ asset('storage/'.$plant->image) }}"
                 class="w-full h-80 object-cover">
        @endif

        <div class="p-8">

            <h1 class="text-3xl font-bold mb-4">
                {{ $plant->name }}
            </h1>

            <p class="text-gray-700 leading-relaxed">
                {{ $plant->description }}
            </p>

            <div class="mt-6">
                <a href="{{ route('plants.index') }}"
                   class="text-green-600 hover:underline">
                    ← Kembali ke daftar
                </a>
            </div>

        </div>
    </div>
    <div class="mt-10 bg-white p-6 rounded-2xl shadow">
    <h2 class="text-xl font-bold mb-4 text-green-600">
        Grafik Kandungan Nutrisi
    </h2>

    <canvas id="nutritionChart"></canvas>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('nutritionChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($plant->nutrients->pluck('name')) !!},
            datasets: [{
                label: 'Nilai Nutrisi',
                data: {!! json_encode($plant->nutrients->pluck('pivot.value')) !!},
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

});
</script>

</div>
@endsection
