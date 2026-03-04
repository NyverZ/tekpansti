@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6">
    <form action="{{ route('plants.search') }}" method="GET">

<input
type="text"
name="q"
placeholder="Cari tanaman..."
class="border rounded-xl px-4 py-2">

<button class="bg-green-600 text-white px-4 py-2 rounded-xl">
Cari
</button>

</form>

    <h1 class="text-3xl font-bold mb-8 text-center">
        🌿 Daftar Tanaman Herbal
    </h1>

    @if($plants->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">


            @foreach($plants as $plant)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">

                    <!-- Gambar -->
                    <div class="h-48 bg-gray-200  dark:bg-gray-700 flex items-center justify-center">
                        @if($plant->image)
                            <img src="{{ asset('storage/'.$plant->image) }}"
                                 class="h-full w-full object-cover">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6 dark:bg-gray-800">
                        <h2 class="text-xl font-semibold mb-2">
                            {{ $plant->name }}
                        </h2>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($plant->description, 100) }}
                        </p>

                        <a href="{{ route('plants.show', $plant->id) }}"
                           class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Lihat Detail
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $plants->links() }}
        </div>

    @else
        <div class="text-center text-gray-500">
            Belum ada data tanaman.
        </div>
    @endif

</div>
@endsection
