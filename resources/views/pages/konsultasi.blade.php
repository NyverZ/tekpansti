@extends('layouts.app')

@section('content')

<section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-500">

<div class="container mx-auto px-6 text-center">

<!-- TITLE -->
<div data-aos="fade-up">

<h1 class="text-4xl font-bold mb-4 text-gray-800 dark:text-white">
Konsultasi <span class="text-emerald-500">Keamanan Pangan</span>
</h1>

<p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mb-10">
Jika Anda memiliki pertanyaan mengenai keamanan pangan, sanitasi,
higiene, atau gizi makanan, Anda dapat berkonsultasi langsung
dengan tim kami melalui WhatsApp.
</p>

</div>


<!-- CONSULT CARD -->
<div class="max-w-md mx-auto">

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg hover:shadow-xl transition"
data-aos="zoom-in">

<div class="text-5xl mb-4">
💬
</div>

<h2 class="text-xl font-semibold mb-3 text-gray-800 dark:text-white">
Konsultasi Gratis
</h2>

<p class="text-gray-600 dark:text-gray-300 mb-6">
Tanyakan segala hal tentang keamanan pangan dan gizi kepada tim kami.
Kami siap membantu memberikan informasi yang bermanfaat untuk Anda.
</p>

<a href="https://wa.me/628123456789?text=Halo%20saya%20ingin%20konsultasi"
target="_blank"
class="inline-block bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl transition shadow">

Konsultasi via WhatsApp

</a>

</div>

</div>

</div>

</section>

@endsection
