@extends('layouts.app')

@section('content')

<section class="py-24 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-950 transition-colors duration-500">

<div class="max-w-7xl mx-auto px-6">

<!-- HERO -->
<div class="text-center mb-20">

<span class="inline-block px-4 py-1 text-sm font-medium bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-full mb-4">
Edukasi Kesehatan
</span>

<h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 dark:text-white leading-tight mb-6">
Edukasi Keamanan Pangan
</h1>

<p class="text-gray-600 dark:text-gray-400 max-w-3xl mx-auto text-lg leading-relaxed">
Pelajari berbagai informasi penting tentang keamanan pangan,
cara menyimpan makanan dengan benar, serta tips menjaga kesehatan
keluarga melalui makanan yang aman dan bergizi.
</p>

</div>


<!-- GRID ARTICLE -->
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

@foreach(\App\Models\Article::latest()->get() as $article)

<div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-md hover:shadow-2xl transition duration-300 overflow-hidden">

<!-- IMAGE -->
<div class="relative overflow-hidden">

<img
src="{{ $article->image ?? 'https://images.unsplash.com/photo-1498837167922-ddd27525d352' }}"
class="h-56 w-full object-cover group-hover:scale-110 transition duration-500"
>

<div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>

<span class="absolute top-4 left-4 text-xs bg-green-600 text-white px-3 py-1 rounded-full shadow">
Artikel
</span>

</div>


<!-- CONTENT -->
<div class="p-6">

<h2 class="text-xl font-bold text-gray-800 dark:text-white mb-3 group-hover:text-green-600 dark:group-hover:text-green-400 transition">
{{ $article->title }}
</h2>

<p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-5">
{{ Str::limit(strip_tags($article->content),120) }}
</p>

<a href="/article/{{ $article->slug }}"
class="inline-flex items-center gap-2 text-green-600 dark:text-green-400 font-medium hover:gap-3 transition">

Baca Artikel
<span>→</span>

</a>

</div>

</div>

@endforeach

</div>


<!-- EMPTY STATE -->
@if(\App\Models\Article::count() == 0)

<div class="text-center mt-20">

<h3 class="text-xl text-gray-600 dark:text-gray-400">
Belum ada artikel tersedia
</h3>

</div>

@endif


</div>

</section>

@endsection
