@extends('layouts.dashboard')

@section('content')

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow max-w-xl">

<h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">
Tambah Artikel
</h2>

<form action="{{ route('articles.store') }}" method="POST">

@csrf

<div class="mb-4">
<label class="block mb-1">Judul</label>
<input type="text" name="title"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label class="block mb-1">Kategori</label>
<input type="text" name="category"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label class="block mb-1">Isi Artikel</label>
<textarea name="content"
class="w-full border rounded-lg p-2 h-40"></textarea>
</div>

<div class="mb-4">
<label class="block mb-1">Link Gambar</label>
<input type="text" name="image"
class="w-full border rounded-lg p-2">
</div>

<button class="bg-emerald-600 text-white px-6 py-2 rounded-lg">
Simpan
</button>

</form>

</div>

@endsection
