@extends('layouts.app')

@section('content')

<div class="container mx-auto px-6 py-16">

<div class="max-w-xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">

<h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">
Kirim Saran Tanaman
</h1>

<p class="text-gray-600 dark:text-gray-400 mb-6">
Punya rekomendasi tanaman yang bermanfaat untuk kesehatan atau pangan?
Silakan kirimkan saran Anda kepada kami.
</p>

<form method="POST" action="{{ route('suggest.store') }}" class="space-y-4">

@csrf

<div>
<label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
Nama Anda
</label>

<input
name="name"
placeholder="Masukkan nama Anda"
class="w-full border border-gray-300 dark:border-gray-600
dark:bg-gray-700 dark:text-white
p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
</div>


<div>
<label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
Nama Tanaman
</label>

<input
name="plant_name"
placeholder="Contoh: Daun Kelor"
class="w-full border border-gray-300 dark:border-gray-600
dark:bg-gray-700 dark:text-white
p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none">
</div>


<div>
<label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
Manfaat / Deskripsi
</label>

<textarea
name="description"
rows="4"
placeholder="Tuliskan manfaat atau alasan tanaman ini penting..."
class="w-full border border-gray-300 dark:border-gray-600
dark:bg-gray-700 dark:text-white
p-3 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none"></textarea>
</div>


<button
class="w-full bg-emerald-600 text-white py-3 rounded-xl font-semibold
hover:bg-emerald-700 hover:scale-[1.02] transition">

Kirim Saran

</button>

</form>

</div>

</div>

@endsection
