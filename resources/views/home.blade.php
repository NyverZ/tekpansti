@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-green-600 to-emerald-500 dark:from-gray-900 dark:to-gray-800 transition-colors duration-500">

<div class="container mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">

<div>

<h1 class="text-5xl font-bold leading-tight mb-6 text-white">
Edukasi Keamanan Pangan <br>
<span class="text-yellow-200">Untuk Masyarakat</span>
</h1>

<p class="text-lg text-white/90 mb-8">
Platform edukasi mengenai keamanan pangan,
sanitasi, higiene, dan gizi pangan yang dikembangkan
oleh mahasiswa Teknologi Pangan dan Sistem Informasi.
</p>

<div class="flex gap-4">

<a href="{{ route('edukasi') }}"
class="bg-white text-green-600 px-6 py-3 rounded-xl font-semibold shadow hover:scale-105 transition">
Mulai Belajar
</a>

<a href="{{ route('konsultasi') }}"
class="border border-white text-white px-6 py-3 rounded-xl hover:bg-white hover:text-green-600 transition">
Konsultasi
</a>

</div>

</div>

<div class="hidden md:block">
<img
src="https://images.unsplash.com/photo-1498837167922-ddd27525d352"
class="rounded-2xl shadow-2xl w-full h-[350px] object-cover hover:scale-105 transition duration-500">
</div>

</div>

</section>



<!-- STATISTICS -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">

<div class="container mx-auto px-6">

<div class="grid md:grid-cols-4 gap-8 text-center">

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-3xl font-bold text-emerald-600">
{{ \App\Models\Plant::count() }}
</p>
<p class="text-gray-600 dark:text-gray-400">
Tanaman Pangan
</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-3xl font-bold text-blue-600">
{{ \App\Models\Nutrient::count() }}
</p>
<p class="text-gray-600 dark:text-gray-400">
Jenis Nutrisi
</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-3xl font-bold text-purple-600">
{{ \App\Models\User::count() }}
</p>
<p class="text-gray-600 dark:text-gray-400">
Pengguna
</p>
</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow hover:shadow-lg transition">
<p class="text-3xl font-bold text-orange-600">
{{ \App\Models\Suggestion::count() }}
</p>
<p class="text-gray-600 dark:text-gray-400">
Saran Masuk
</p>
</div>

</div>

</div>
</section>


<!-- FITUR -->
<section class="py-20 bg-gray-50 dark:bg-gray-900">

<div class="container mx-auto px-6 text-center">

<h2 class="text-3xl font-bold mb-12 text-gray-800 dark:text-white">
Fitur Platform
</h2>

<div class="grid md:grid-cols-3 gap-10">

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<div class="text-4xl mb-4">📚</div>

<h2 class="font-semibold text-gray-800 dark:text-white">
Edukasi Keamanan Pangan
</h2>

<p class="text-gray-600 dark:text-gray-400 text-sm">
Informasi mengenai keamanan pangan,
sanitasi dan gizi pangan untuk masyarakat.
</p>

</div>


<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<div class="text-4xl mb-4">💬</div>

<h2 class="font-semibold text-gray-800 dark:text-white">
Konsultasi
</h2>

<p class="text-gray-600 dark:text-gray-400 text-sm">
Masyarakat dapat berkonsultasi langsung
mengenai keamanan pangan.
</p>

</div>


<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow hover:shadow-xl hover:-translate-y-1 transition">

<div class="text-4xl mb-4">✔</div>

<h3 class="font-semibold text-gray-800 dark:text-white">
Self Check
</h3>

<p class="text-gray-600 dark:text-gray-400 text-sm">
Cek kondisi keamanan pangan secara mandiri
melalui form evaluasi.
</p>

</div>

</div>

</div>

</section>


<!-- TANAMAN TERBARU -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">

<div class="container mx-auto px-6">

<h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">
Tanaman Pangan Terbaru
</h2>

<div class="grid md:grid-cols-3 gap-8">

@foreach(\App\Models\Plant::latest()->take(3)->get() as $plant)

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-xl transition">

<img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399"
class="rounded-t-2xl h-48 w-full object-cover">

<div class="p-6">

<h3 class="font-semibold text-lg text-gray-800 dark:text-white">
{{ $plant->local_name }}
</h3>

<p class="text-sm text-gray-500 italic mb-2">
{{ $plant->scientific_name }}
</p>

<p class="text-gray-600 dark:text-gray-400 text-sm">
{{ Str::limit($plant->description,100) }}
</p>

</div>

</div>

@endforeach

</div>

</div>

</section>


<!-- CTA -->
<section class="bg-green-600 dark:bg-green-700 text-white py-16 text-center">

<h2 class="text-3xl font-bold mb-4">
Butuh Konsultasi?
</h2>

<p class="mb-6 opacity-90">
Tim kami siap membantu menjawab pertanyaan
tentang keamanan pangan dan gizi.
</p>

<a href="{{ route('konsultasi') }}"
class="bg-white text-green-600 px-8 py-3 rounded-xl font-semibold hover:scale-105 transition">
Mulai Konsultasi
</a>

</section>

@endsection
