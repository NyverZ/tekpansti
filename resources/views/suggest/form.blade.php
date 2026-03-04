
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Kirim Saran Tanaman</h1>

    <form method="POST" action="{{ route('suggest.store') }}"
          class="bg-white p-6 rounded-2xl shadow">
        @csrf

        <input name="name" placeholder="Nama Anda"
               class="border p-3 w-full mb-3 rounded-xl">

        <input name="plant_name" placeholder="Nama Tanaman"
               class="border p-3 w-full mb-3 rounded-xl">

        <textarea name="description"
                  placeholder="Manfaat atau alasan penting"
                  class="border p-3 w-full mb-3 rounded-xl"></textarea>

        <button class="bg-emerald-600 text-white px-6 py-3 rounded-xl">
            Kirim
        </button>
    </form>
</div>
@endsection

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-2xl font-bold mb-6">Kirim Saran Tanaman</h1>

    <form method="POST" action="{{ route('suggest.store') }}"
          class="bg-white p-6 rounded-2xl shadow">
        @csrf

        <input name="name" placeholder="Nama Anda"
               class="border p-3 w-full mb-3 rounded-xl">

        <input name="plant_name" placeholder="Nama Tanaman"
               class="border p-3 w-full mb-3 rounded-xl">

        <textarea name="description"
                  placeholder="Manfaat atau alasan penting"
                  class="border p-3 w-full mb-3 rounded-xl"></textarea>

        <button class="bg-emerald-600 text-white px-6 py-3 rounded-xl">
            Kirim
        </button>
    </form>
</div>
@endsection
