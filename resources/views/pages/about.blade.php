@extends('layouts.app')

@section('content')

<section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">

<div class="container mx-auto px-6">

<!-- TITLE -->
<div class="text-center mb-12" data-aos="fade-up">

<h1 class="text-4xl font-bold mb-4 text-gray-800 dark:text-white">
Tentang <span class="text-emerald-500">EduPlant</span>
</h1>

<p class="max-w-2xl mx-auto text-gray-600 dark:text-gray-300">
EduPlant merupakan platform edukasi yang bertujuan meningkatkan
kesadaran masyarakat tentang keamanan pangan, sanitasi, higiene,
dan gizi pangan melalui media pembelajaran digital yang interaktif.
</p>

</div>

<!-- CONTENT -->
<div class="grid md:grid-cols-2 gap-10 items-center">

<!-- TEXT -->
<div data-aos="fade-right">

<h2 class="text-2xl font-semibold mb-4 text-emerald-500">
Latar Belakang
</h2>

<p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
Website ini dikembangkan oleh mahasiswa Program Studi
Teknologi Pangan dan Sistem & Teknologi Informasi sebagai
media edukasi digital untuk masyarakat. Dengan adanya platform
ini diharapkan masyarakat dapat memahami pentingnya keamanan
pangan, sanitasi, serta pola konsumsi pangan yang sehat.
</p>

<h2 class="text-2xl font-semibold mb-4 text-emerald-500">
Tujuan
</h2>

<ul class="space-y-2 text-gray-600 dark:text-gray-300">

<li>🌱 Memberikan edukasi keamanan pangan</li>
<li>🥗 Meningkatkan kesadaran gizi masyarakat</li>
<li>🧼 Memberikan informasi sanitasi dan higiene</li>
<li>📚 Menyediakan media pembelajaran interaktif</li>

</ul>

</div>

<!-- IMAGE -->
<div data-aos="fade-left">

<img
src="https://images.unsplash.com/photo-1543353071-873f17a7a088"
class="rounded-2xl shadow-lg"
>

</div>

</div>


<!-- VISION MISSION -->
<div class="grid md:grid-cols-2 gap-8 mt-16">

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg transition" data-aos="zoom-in">

<h3 class="text-xl font-bold text-emerald-500 mb-3">
Visi
</h3>

<p class="text-gray-600 dark:text-gray-300">
Menjadi platform edukasi digital yang membantu masyarakat
memahami pentingnya keamanan pangan dan gizi untuk meningkatkan
kesehatan dan kualitas hidup.
</p>

</div>

<div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg transition" data-aos="zoom-in">

<h3 class="text-xl font-bold text-emerald-500 mb-3">
Misi
</h3>

<ul class="text-gray-600 dark:text-gray-300 space-y-2">
<li>• Menyediakan informasi edukatif yang mudah dipahami</li>
<li>• Mengembangkan pembelajaran interaktif</li>
<li>• Meningkatkan kesadaran masyarakat tentang pangan sehat</li>
</ul>

</div>

</div>

</div>

</section>

@endsection
