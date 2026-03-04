@extends('layouts.app')

@section('content')

<section class="py-24 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">

<div class="container mx-auto px-6">

<!-- Title -->
<div class="text-center mb-16">
<h1 class="text-5xl font-extrabold text-gray-800 dark:text-white mb-4">
Edukasi Keamanan Pangan
</h1>

<p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
Pelajari berbagai informasi penting tentang keamanan pangan,
cara penyimpanan makanan yang benar, serta tips menjaga
kesehatan keluarga melalui makanan yang aman dan sehat.
</p>
</div>

<!-- Grid -->
<div class="grid md:grid-cols-3 gap-10">

@foreach(\App\Models\Article::latest()->get() as $article)

<div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg
hover:shadow-2xl transition duration-300 overflow-hidden group">

<!-- Image -->
<div class="overflow-hidden">
<img
src="{{ $article->image ?? 'https://images.unsplash.com/photo-1498837167922-ddd27525d352' }}"
class="h-52 w-full object-cover group-hover:scale-110 transition duration-500">
</div>

<!-- Content -->
<div class="p-6">

<!-- Badge -->
<span class="text-xs bg-green-100 dark:bg-green-900
text-green-700 dark:text-green-300 px-3 py-1 rounded-full">
Edukasi
</span>

<!-- Title -->
<h2 class="font-bold text-xl mt-3 mb-3
text-gray-800 dark:text-white
group-hover:text-green-600 dark:group-hover:text-green-400 transition">

{{ $article->title }}

</h2>

<!-- Description -->
<p class="text-gray-600 dark:text-gray-400 text-sm mb-5 leading-relaxed">
{{ Str::limit(strip_tags($article->content),120) }}
</p>

<!-- Button -->
<a href="#"
class="inline-block bg-green-600 dark:bg-green-500
text-white px-5 py-2 rounded-lg
hover:bg-green-700 dark:hover:bg-green-400
transition font-medium">

Baca Artikel →

</a>

</div>

</div>

@endforeach

</div>

</div>

</section>

@endsection
