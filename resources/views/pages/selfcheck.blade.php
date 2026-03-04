@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-emerald-600 to-green-500 dark:from-gray-900 dark:to-gray-800 py-12">

<div class="container mx-auto px-6 text-center text-white">

<h1 class="text-4xl font-bold mb-4">
Self-Check Keamanan Pangan
</h1>

<p class="max-w-2xl mx-auto text-white/90">
Lakukan evaluasi mandiri mengenai praktik keamanan pangan Anda.
Isi form berikut untuk mengetahui sejauh mana penerapan sanitasi,
higiene, dan keamanan pangan yang telah dilakukan.
</p>

</div>

</section>


<!-- FORM SECTION -->
<section class="py-12 bg-gray-50 dark:bg-gray-900">

<div class="container mx-auto px-6">

<div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-6">

<h2 class="text-xl font-semibold mb-6 text-gray-800 dark:text-white">
Form Evaluasi Keamanan Pangan
</h2>

<div class="rounded-xl overflow-hidden border dark:border-gray-700">

<iframe
src="https://docs.google.com/forms/d/e/1FAIpQLScYhtXphyyl0-f2Zj1kr-e8XoWqnRnx-ypLdlSGurTgZExxnw/viewform?embedded=true"
width="100%"
height="850"
class="bg-white dark:bg-gray-800">
</iframe>

</div>

</div>

</div>

</section>

@endsection
