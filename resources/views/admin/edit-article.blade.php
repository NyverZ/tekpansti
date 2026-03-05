@extends('layouts.dashboard')

@section('content')

<div class="max-w-xl mx-auto">

<h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>

<form action="/article/{{ $article->id }}" method="POST">

@csrf
@method('PUT')

<input type="text" name="title" value="{{ $article->title }}" class="border p-2 w-full mb-4">

<textarea name="content" class="border p-2 w-full mb-4">{{ $article->content }}</textarea>

<input type="text" name="image" value="{{ $article->image }}" class="border p-2 w-full mb-4">

<button class="bg-green-600 text-white px-4 py-2 rounded">
Update Artikel
</button>

</form>

</div>

@endsection
