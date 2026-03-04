@extends('layouts.app')

@section('content')

<section class="container mx-auto px-6 py-16">

<!-- TITLE -->
<div class="text-center mb-12">

<h1 class="text-4xl font-bold mb-4">
📞 Hubungi Kami
</h1>

<p class="text-gray-500 dark:text-gray-400 max-w-xl mx-auto">
Jika kamu memiliki pertanyaan, saran, atau ingin berkolaborasi dengan tim EduPlant,
silakan hubungi kami melalui informasi kontak berikut atau kirim pesan langsung.
</p>

</div>


<div class="grid md:grid-cols-2 gap-10">

<!-- CONTACT INFO -->
<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg space-y-6">

<h2 class="text-xl font-semibold mb-4">
Informasi Kontak
</h2>

<div class="flex items-center gap-4 border-t border-gray-200 dark:border-gray-700 pt-2">
<div class="text-2xl">📧</div>
<div>
<p class="font-bold text-emerald-600">Email</p>
<p class="text-gray-500">edukasi@tekpansti.com</p>
</div>
</div>


<div class="flex items-center gap-4 border-t border-gray-200 dark:border-gray-700 pt-2">
<div class="text-2xl">✉️</div>
<div>
<p class="font-bold text-emerald-600">WhatsApp</p>
<p class="text-gray-500">08123456789</p>
</div>
</div>

<div class="flex items-center gap-4 border-t border-gray-200 dark:border-gray-700 pt-2">
<div class="text-2xl">📸</div>
<div class="space-y-1">
<p class="font-bold text-emerald-600">Instagram</p>
<p class="text-gray-500">@tekpansti</p>
</div>
</div>

</div>


<!-- CONTACT FORM -->
<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">

<h2 class="text-xl font-semibold mb-6">
Kirim Pesan
</h2>

<form class="space-y-4">

<input
type="text"
placeholder="Nama"
class="w-full border rounded-lg p-3 dark:bg-gray-700">

<input
type="email"
placeholder="Email"
class="w-full border rounded-lg p-3 dark:bg-gray-700">

<textarea
rows="4"
placeholder="Pesan kamu..."
class="w-full border rounded-lg p-3 dark:bg-gray-700"></textarea>

<button
class="bg-emerald-600 text-white px-6 py-3 rounded-xl hover:bg-emerald-700 transition">

Kirim Pesan

</button>

</form>

</div>

</div>


<!-- SOCIAL MEDIA -->
<div class="mt-16 text-center">

<h3 class="text-lg font-semibold mb-4">
Ikuti Kami
</h3>

<div class="flex justify-center gap-6 text-2xl">

<a href="#" class="hover:scale-110 transition">📸</a>
<a href="#" class="hover:scale-110 transition">📱</a>
<a href="#" class="hover:scale-110 transition">📧</a>

</div>

</div>

</section>

@endsection
