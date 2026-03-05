@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-12">

{{-- HERO --}}
<div class="text-center mb-12">
<h1 class="text-4xl font-bold text-emerald-700 dark:text-emerald-400 mb-4">
🔬 Compare Tanaman Herbal
</h1>

<p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
Bandingkan manfaat, potensi pengolahan, dan kandungan nutrisi dua tanaman herbal secara ilmiah dan visual.
</p>
</div>


{{-- FORM --}}
<div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-lg mb-12">

<form method="POST" action="{{ route('compare.result') }}">
@csrf

<div class="grid md:grid-cols-2 gap-6">

<div>
<label class="block text-sm mb-2 font-medium text-gray-700 dark:text-gray-300">
Tanaman Pertama
</label>

<select name="plant1" class="w-full border border-gray-300 dark:border-gray-600 rounded-xl p-3 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">

<option value="">Pilih Tanaman</option>

@foreach($plants as $plant)
<option value="{{ $plant->id }}">
{{ $plant->local_name }}
</option>
@endforeach

</select>
</div>


<div>
<label class="block text-sm mb-2 font-medium text-gray-700 dark:text-gray-300">
Tanaman Kedua
</label>

<select name="plant2" class="w-full border border-gray-300 dark:border-gray-600 rounded-xl p-3 bg-white dark:bg-gray-700 text-gray-800 dark:text-white">

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

<button
class="bg-emerald-600 text-white px-8 py-3 rounded-2xl hover:bg-emerald-700 transition">

🚀 Bandingkan Sekarang

</button>

</div>

</form>

</div>


{{-- RESULT --}}
@isset($plant1, $plant2)

<div class="grid md:grid-cols-2 gap-10 mb-12">

{{-- PLANT 1 --}}
<div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-lg">

<h2 class="text-xl font-bold text-emerald-600 mb-4">
{{ $plant1->local_name }}
</h2>

<p class="text-gray-500 italic mb-4">
{{ $plant1->scientific_name }}
</p>

<p class="mb-4 text-gray-700 dark:text-gray-300">
<strong>Manfaat:</strong> {{ $plant1->health_benefits }}
</p>

<p class="mb-4 text-gray-700 dark:text-gray-300">
<strong>Potensi Pengolahan:</strong> {{ $plant1->processing_potential }}
</p>

<canvas id="chart1"></canvas>

</div>


{{-- PLANT 2 --}}
<div class="bg-white dark:bg-gray-800 p-6 rounded-3xl shadow-lg">

<h2 class="text-xl font-bold text-blue-600 mb-4">
{{ $plant2->local_name }}
</h2>

<p class="text-gray-500 italic mb-4">
{{ $plant2->scientific_name }}
</p>

<p class="mb-4 text-gray-700 dark:text-gray-300">
<strong>Manfaat:</strong> {{ $plant2->health_benefits }}
</p>

<p class="mb-4 text-gray-700 dark:text-gray-300">
<strong>Potensi Pengolahan:</strong> {{ $plant2->processing_potential }}
</p>

<canvas id="chart2"></canvas>

</div>

</div>


{{-- TABEL PERBANDINGAN --}}
<div class="bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-lg">

<h2 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-white">
📊 Perbandingan Nutrisi
</h2>

<table class="w-full border border-gray-200 dark:border-gray-700">

<thead class="bg-gray-100 dark:bg-gray-700">

<tr class="text-left text-gray-700 dark:text-gray-200">

<th class="p-3">Nutrisi</th>
<th class="p-3">{{ $plant1->local_name }}</th>
<th class="p-3">{{ $plant2->local_name }}</th>

</tr>

</thead>

<tbody>

@php
$nutrients = $plant1->nutrients->merge($plant2->nutrients)->unique('id');
@endphp

@foreach($nutrients as $nutrient)

<tr class="border-t border-gray-200 dark:border-gray-700">

<td class="p-3 font-medium text-gray-700 dark:text-gray-200">
{{ $nutrient->name }}
</td>

<td class="p-3 text-emerald-600 font-semibold">

{{ optional($plant1->nutrients->firstWhere('id',$nutrient->id))->pivot->amount ?? '-' }}

</td>

<td class="p-3 text-blue-600 font-semibold">

{{ optional($plant2->nutrients->firstWhere('id',$nutrient->id))->pivot->amount ?? '-' }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>


{{-- CHART SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

function renderChart(id, labels, data, color){

new Chart(document.getElementById(id),{

type:'bar',

data:{
labels: labels,
datasets:[{
data: data,
backgroundColor: color
}]
},

options:{
plugins:{ legend:{display:false}},
responsive:true
}

})

}


renderChart(
'chart1',
{!! json_encode($plant1->nutrients->pluck('name')) !!},
{!! json_encode($plant1->nutrients->pluck('pivot.amount')) !!},
'#10b981'
)


renderChart(
'chart2',
{!! json_encode($plant2->nutrients->pluck('name')) !!},
{!! json_encode($plant2->nutrients->pluck('pivot.amount')) !!},
'#3b82f6'
)

</script>

@endisset


{{-- EMPTY MESSAGE --}}
@if(!isset($plant1))

<div class="text-center text-gray-500 dark:text-gray-400 mt-12">
Silakan pilih dua tanaman untuk dibandingkan.
</div>

@endif

</div>

@endsection
