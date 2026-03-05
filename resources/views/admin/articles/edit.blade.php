@extends('layouts.dashboard')

@section('content')

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow max-w-xl">

<h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-white">
Edit Artikel
</h2>

<form action="{{ route('articles.update',$article->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-4">
<label>Judul</label>
<input type="text" name="title"
value="{{ $article->title }}"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label>Kategori</label>
<input type="text" name="category"
value="{{ $article->category }}"
class="w-full border rounded-lg p-2">
</div>

<div class="mb-4">
<label>Isi Artikel</label>
<textarea name="content"
class="w-full border rounded-lg p-2 h-40">{{ $article->content }}</textarea>
</div>

<div class="mb-4">
<label>Link Gambar</label>
<input type="text" name="image"
value="{{ $article->image }}"
class="w-full border rounded-lg p-2">
</div>

<button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
Update
</button>

</form>

</div>

@endsection
