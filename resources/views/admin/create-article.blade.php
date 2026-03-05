@extends('layouts.app')

@section('content')

<section class="py-20 bg-gray-50 dark:bg-gray-900">

<div class="max-w-3xl mx-auto px-6">

<!-- Title -->
<div class="mb-10 text-center">
<h1 class="text-3xl font-bold text-gray-800 dark:text-white">
Tambah Artikel
</h1>

<p class="text-gray-500 dark:text-gray-400 mt-2">
Tambahkan artikel edukasi keamanan pangan
</p>
</div>


<div class="bg-white dark:bg-gray-800 shadow-xl rounded-3xl p-8">

<form action="/article" method="POST" class="space-y-6">

@csrf

<!-- Judul -->
<div>
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Judul Artikel
</label>

<input
type="text"
name="title"
placeholder="Masukkan judul artikel"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-green-500 outline-none"
/>
@error('title')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<!-- Image -->
<div>
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Link Artikel (URL Gambar)
</label>

<input
type="text"
name="image"
placeholder="https://example.com/image.jpg"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-green-500 outline-none"
/>
</div>


<!-- Content -->
<div>
<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Isi Artikel
</label>

<textarea
name="content"
rows="6"
placeholder="Tulis isi artikel di sini..."
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-green-500 outline-none"></textarea>
</div>


<!-- Button -->
<div class="pt-4">

<button
type="submit"
class="w-full bg-green-600 hover:bg-green-700
text-white font-semibold py-3 rounded-xl transition">

Simpan Artikel

</button>

</div>

</form>

</div>

</div>

</section>

@endsection
