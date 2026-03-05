@extends('layouts.app')

@section('content')

<section class="py-20 bg-gray-50 dark:bg-gray-900">

<div class="max-w-4xl mx-auto px-6">

<h1 class="text-4xl font-bold mb-6 text-gray-800 dark:text-white">
{{ $article->title }}
</h1>

<img
src="{{ $article->image }}"
class="rounded-xl mb-6 w-full">

<div class="prose dark:prose-invert max-w-none">

{!! $article->content !!}

</div>

</div>

</section>

@endsection
