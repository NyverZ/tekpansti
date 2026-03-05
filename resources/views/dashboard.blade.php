@extends('layouts.dashboard')

@section('content')

@if(Auth::user()->role === 'admin')

<!-- ADMIN DASHBOARD -->
<div class="grid md:grid-cols-5 gap-6 mb-10">

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
<h2 class="text-sm text-gray-600 dark:text-gray-400">Total Tanaman</h2>
<p class="text-3xl font-bold text-emerald-600">
{{ \App\Models\Plant::count() }}
</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
<h2 class="text-sm text-gray-600 dark:text-gray-400">Total Nutrisi</h2>
<p class="text-3xl font-bold text-blue-500">
{{ \App\Models\Nutrient::count() }}
</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
<h2 class="text-sm text-gray-600 dark:text-gray-400">Total User</h2>
<p class="text-3xl font-bold text-purple-500">
{{ \App\Models\User::count() }}
</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
<h2 class="text-sm text-gray-600 dark:text-gray-400">Suggestion Pending</h2>
<p class="text-3xl font-bold text-orange-500">

@if(\Schema::hasTable('suggestions'))
{{ \App\Models\Suggestion::where('status','pending')->count() }}
@else
0
@endif

</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">
<h2 class="text-sm text-gray-600 dark:text-gray-400">Total Artikel</h2>
<p class="text-3xl font-bold text-green-600">
{{ \App\Models\Article::count() }}
</p>
</div>

</div>


<!-- CHART -->
<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow mb-10">

<h2 class="font-semibold text-gray-800 dark:text-white mb-6">
📊 Statistik EduPlant
</h2>

<canvas id="chart"></canvas>

</div>

<script>
const ctx=document.getElementById('chart')

new Chart(ctx,{
type:'bar',
data:{
labels:['Tanaman','Nutrisi','User','Artikel'],
datasets:[{
label:'Total Data',
data:[
{{ \App\Models\Plant::count() }},
{{ \App\Models\Nutrient::count() }},
{{ \App\Models\User::count() }},
{{ \App\Models\Article::count() }}
]
}]
}
})
</script>





@else

<!-- USER DASHBOARD -->

<div class="grid md:grid-cols-2 gap-6">

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow">

<h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">
🌱 Jelajahi Tanaman Herbal
</h2>

<p class="text-gray-600 dark:text-gray-400 mb-4">
Pelajari berbagai tanaman herbal Indonesia beserta manfaat nutrisinya.
</p>

<a href="{{ route('plants.index') }}"
class="bg-emerald-600 text-white px-6 py-3 rounded-xl hover:bg-emerald-700 transition">

Mulai Belajar

</a>

</div>


<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow">

<h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">
📊 Total Tanaman EduPlant
</h2>

<p class="text-4xl font-bold text-emerald-600">
{{ \App\Models\Plant::count() }}
</p>

<p class="text-gray-600 dark:text-gray-400 mt-2">
Tanaman herbal tersedia untuk dipelajari
</p>

</div>

</div>

@endif

@endsection
