@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">

    <div class="flex justify-center items-center gap-96 mb-6">
        <h1 class="text-2xl font-bold">Kelola Tanaman</h1>
        <a href="{{ route('admin.plants.create') }}"
           class="bg-emerald-600 text-white px-4 py-2 rounded-xl">
           + Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white rounded-xl dark:bg-gray-800 shadow">
        <thead class="bg-gray-100 dark:bg-gray-700 rounded-t-xl">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">Kategori</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($plants as $plant)
            <tr class="border-t">
                <td class="p-3">{{ $plant->local_name }}</td>
                <td class="p-3">{{ $plant->category->name ?? '-' }}</td>
                <td class="p-3">
                    {{ $plant->is_published ? 'Publish' : 'Draft' }}
                </td>
                <td class="p-3 flex gap-2 justify-center">
                    <a href="{{ route('admin.plants.edit',$plant) }}"
                       class="text-blue-500">Edit</a>

                    <form method="POST"
                          action="{{ route('admin.plants.destroy',$plant) }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $plants->links() }}
    </div>

</div>
@endsection
