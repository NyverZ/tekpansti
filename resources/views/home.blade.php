@extends('layouts.app')

@section('content')

<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- HERO -->
<section class="hero-animate relative overflow-hidden bg-gradient-to-r from-green-600 via-emerald-600 to-green-700 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">

<div class="absolute -top-20 -left-20 w-72 h-72 bg-yellow-300/20 blur-3xl rounded-full"></div>
<div class="absolute -bottom-20 -right-20 w-72 h-72 bg-emerald-300/20 blur-3xl rounded-full"></div>

<div class="container mx-auto px-6 py-20 grid md:grid-cols-2 gap-10 items-center relative z-10">

<div data-aos="fade-right">

<h1 class="text-5xl md:text-6xl font-bold leading-tight text-white">
Edukasi Keamanan Pangan
<span class="text-yellow-300">Untuk Masyarakat</span>
</h1>

<p class="text-lg text-white/90 mt-6 mb-8 max-w-xl">
Platform edukasi mengenai keamanan pangan,
sanitasi, higiene, dan gizi pangan yang dikembangkan
oleh mahasiswa Teknologi Pangan dan Sistem Informasi.
</p>

<div class="flex gap-4">

<a href="{{ route('edukasi') }}"
class="bg-white text-green-600 px-6 py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
Mulai Belajar
</a>

<a href="{{ route('konsultasi') }}"
class="border border-white text-white px-6 py-3 rounded-xl hover:bg-white hover:text-green-600 transition">
Konsultasi
</a>

</div>

</div>

<div class="hidden md:block" data-aos="fade-left">

<img
src="https://images.unsplash.com/photo-1498837167922-ddd27525d352"
class="rounded-3xl shadow-2xl w-full h-[380px] object-cover hover:scale-105 transition duration-500">

</div>

</div>

</section>


<!-- STATISTICS -->
<section class="py-20 bg-gray-50 dark:bg-gray-900">

<div class="container mx-auto px-6">

<div class="grid md:grid-cols-4 gap-8 text-center">

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow card-glow transition" data-aos="zoom-in">

<i data-lucide="sprout" class="mx-auto mb-3 text-emerald-500"></i>

<p class="text-4xl font-bold text-emerald-500 counter"
data-target="{{ \App\Models\Plant::count() }}">0</p>

<p class="text-gray-600 dark:text-gray-400 mt-2">
Tanaman Pangan
</p>

</div>


<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow card-glow transition" data-aos="zoom-in">

<i data-lucide="apple" class="mx-auto mb-3 text-blue-500"></i>

<p class="text-4xl font-bold text-blue-500 counter"
data-target="{{ \App\Models\Nutrient::count() }}">0</p>

<p class="text-gray-600 dark:text-gray-400 mt-2">
Jenis Nutrisi
</p>

</div>


<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow card-glow transition" data-aos="zoom-in">

<i data-lucide="users" class="mx-auto mb-3 text-purple-500"></i>

<p class="text-4xl font-bold text-purple-500 counter"
data-target="{{ \App\Models\User::count() }}">0</p>

<p class="text-gray-600 dark:text-gray-400 mt-2">
Pengguna
</p>

</div>


<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow card-glow transition" data-aos="zoom-in">

<i data-lucide="message-circle" class="mx-auto mb-3 text-orange-500"></i>

<p class="text-4xl font-bold text-orange-500 counter"
data-target="{{ \App\Models\Suggestion::count() }}">0</p>

<p class="text-gray-600 dark:text-gray-400 mt-2">
Saran Masuk
</p>

</div>

</div>

</div>

</section>


<!-- FITUR -->
<section class="py-24 bg-gray-100 dark:bg-gray-900">

<div class="container mx-auto px-6 text-center">

<h2 class="text-3xl font-bold mb-14 text-gray-800 dark:text-white" data-aos="fade-up">
Fitur Platform
</h2>

<div class="grid md:grid-cols-3 gap-10">

<div class="card-glow bg-white dark:bg-gray-800 p-10 rounded-3xl shadow transition" data-aos="fade-up">

<i data-lucide="book-open" class="mx-auto mb-4 text-emerald-500"></i>

<h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">
Edukasi Keamanan Pangan
</h3>

<p class="text-gray-600 dark:text-gray-400 text-sm">
Informasi lengkap mengenai keamanan pangan,
sanitasi dan gizi pangan.
</p>

</div>


<div class="card-glow bg-white dark:bg-gray-800 p-10 rounded-3xl shadow transition" data-aos="fade-up">

<i data-lucide="message-square" class="mx-auto mb-4 text-blue-500"></i>

<h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">
Konsultasi
</h3>

<p class="text-gray-600 dark:text-gray-400 text-sm">
Konsultasi langsung dengan tim mengenai
keamanan pangan.
</p>

</div>


<div class="card-glow bg-white dark:bg-gray-800 p-10 rounded-3xl shadow transition" data-aos="fade-up">

<i data-lucide="check-circle" class="mx-auto mb-4 text-purple-500"></i>

<h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-2">
Self Check
</h3>

<p class="text-gray-600 dark:text-gray-400 text-sm">
Evaluasi mandiri kondisi keamanan pangan.
</p>

</div>

</div>

</div>

</section>


<!-- TANAMAN TERBARU -->
<section class="py-20 bg-gray-50 dark:bg-gray-900">

<div class="container mx-auto px-6">

<h2 class="text-3xl font-bold text-center mb-14 text-gray-800 dark:text-white" data-aos="fade-up">
Tanaman Pangan Terbaru
</h2>

<div class="swiper">

<div class="swiper-wrapper">

@foreach(\App\Models\Plant::latest()->take(6)->get() as $plant)

<div class="swiper-slide">

<div class="bg-white dark:bg-gray-800 rounded-3xl shadow card-glow transition overflow-hidden">

<img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399"
class="h-52 w-full object-cover">

<div class="p-6">

<h3 class="font-semibold text-lg text-gray-800 dark:text-white">
{{ $plant->local_name }}
</h3>

<p class="text-sm text-gray-500 italic mb-3">
{{ $plant->scientific_name }}
</p>

<p class="text-gray-600 dark:text-gray-400 text-sm">
{{ Str::limit($plant->description,100) }}
</p>

</div>

</div>

</div>

@endforeach

</div>

</div>

</div>

</section>


<!-- CTA -->
<section class="bg-gradient-to-r from-green-600 to-emerald-600 text-white py-20 text-center">

<h2 class="text-4xl font-bold mb-4">
Butuh Konsultasi?
</h2>

<p class="mb-8 opacity-90 max-w-xl mx-auto">
Tim kami siap membantu menjawab pertanyaan
tentang keamanan pangan dan gizi.
</p>

<a href="{{ route('konsultasi') }}"
class="bg-white text-green-600 px-8 py-4 rounded-xl font-semibold shadow hover:scale-105 transition">
Mulai Konsultasi
</a>

</section>


<!-- SCRIPTS -->

<script src="https://unpkg.com/lucide@latest"></script>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>

lucide.createIcons()

AOS.init({
duration:1000,
once:true
})

new Swiper('.swiper',{
slidesPerView:3,
spaceBetween:30,
loop:true,
autoplay:{delay:3000},
breakpoints:{
320:{slidesPerView:1},
768:{slidesPerView:2},
1024:{slidesPerView:3}
}
})

function animateValue(obj,start,end,duration){
let startTimestamp=null
const step=(timestamp)=>{
if(!startTimestamp) startTimestamp=timestamp
const progress=Math.min((timestamp-startTimestamp)/duration,1)
obj.innerHTML=Math.floor(progress*(end-start)+start)
if(progress<1){
window.requestAnimationFrame(step)
}
}
window.requestAnimationFrame(step)
}

window.addEventListener("load",()=>{
document.querySelectorAll(".counter").forEach(el=>{
animateValue(el,0,parseInt(el.dataset.target),1200)
})
})

</script>


<style>

@keyframes gradientMove{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

.hero-animate{
background-size:200% 200%;
animation:gradientMove 10s ease infinite;
}

.card-glow:hover{
box-shadow:0 0 30px rgba(16,185,129,0.5);
}

</style>

@endsection
