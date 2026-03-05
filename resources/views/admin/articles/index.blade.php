@extends('layouts.dashboard')

@section('content')

<div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg mt-10">

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

<h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
📰 Kelola Artikel
</h2>

<div class="flex gap-3">

<form method="GET" action="{{ route('articles.index') }}">

<input
type="text"
name="search"
placeholder="Cari artikel..."
class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
bg-white dark:bg-gray-700 text-gray-700 dark:text-white"
/>

</form>

<a href="{{ route('articles.create') }}"
class="bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700">
+ Artikel Baru
</a>

</div>

</div>

<div class="overflow-x-auto">

<table class="w-full text-sm">

<thead class="border-b border-gray-200 dark:border-gray-700">

<tr class="text-gray-600 dark:text-gray-300 text-left">

<th class="p-4">Gambar</th>
<th class="p-4">Judul</th>
<th class="p-4">Kategori</th>
<th class="p-4">Tanggal</th>
<th class="p-4 text-right">Aksi</th>

</tr>

</thead>

<tbody>

@foreach($articles as $article)

<tr class="border-b border-gray-100 dark:border-gray-700">

<td class="p-4">

<img
src="{{ $article->image ?? 'https://images.unsplash.com/photo-1498837167922-ddd27525d352' }}"
class="w-14 h-14 object-cover rounded-lg">

</td>

<td class="p-4 font-medium text-gray-800 dark:text-white">
{{ $article->title }}
</td>

<td class="p-4">
<span class="px-3 py-1 text-xs rounded-full bg-emerald-100 text-emerald-700">
{{ $article->category ?? 'Umum' }}
</span>
</td>

<td class="p-4 text-gray-500">
{{ $article->created_at->format('d M Y') }}
</td>

<td class="p-4 text-right">

<div class="flex justify-end gap-2">

<a href="{{ route('articles.edit',$article->id) }}"
class="px-3 py-1 bg-blue-500 text-white rounded-lg text-xs">
Edit
</a>

<form action="{{ route('articles.destroy',$article->id) }}" method="POST">
@csrf
@method('DELETE')

<button class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs">
Delete
</button>

</form>

</div>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection
