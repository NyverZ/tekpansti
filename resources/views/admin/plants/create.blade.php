@extends('layouts.app')

@section('content')

<div class="container mx-auto py-10 max-w-xl">

<h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
Tambah Tanaman
</h1>

<form method="POST"
      action="{{ route('admin.plants.store') }}"
      enctype="multipart/form-data"
      class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg space-y-4">

@csrf

<input name="local_name"
placeholder="Nama Lokal"
class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 w-full rounded-lg text-gray-800 dark:text-white">

<input name="scientific_name"
placeholder="Nama Ilmiah"
class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 w-full rounded-lg text-gray-800 dark:text-white">

<textarea name="description"
placeholder="Deskripsi"
class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 w-full rounded-lg text-gray-800 dark:text-white"></textarea>

<textarea name="health_benefits"
placeholder="Manfaat Kesehatan"
class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 w-full rounded-lg text-gray-800 dark:text-white"></textarea>

<textarea name="processing_potential"
placeholder="Potensi Pengolahan"
class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 w-full rounded-lg text-gray-800 dark:text-white"></textarea>

<select name="category_id"
class="border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 p-3 w-full rounded-lg text-gray-800 dark:text-white">

@foreach($categories as $cat)
<option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach

</select>

<!-- Upload Image -->
<div>
<label class="block text-sm mb-2 text-gray-600 dark:text-gray-300">
Upload Gambar Tanaman
</label>

<input type="file"
name="image"
class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-2 bg-white dark:bg-gray-900 text-gray-800 dark:text-white">
</div>

<label class="flex items-center gap-2 text-gray-700 dark:text-gray-300">
<input type="checkbox" name="is_published">
Publish
</label>

<button class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg transition">
Simpan
</button>

</form>

</div>

@endsection
