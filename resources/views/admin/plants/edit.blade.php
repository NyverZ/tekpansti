@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto py-10 max-w-xl">

<h1 class="text-xl font-bold mb-6">Edit Tanaman</h1>

<form method="POST"
      action="{{ route('admin.plants.update',$plant) }}"
      class="bg-white p-6 rounded-xl shadow">
@csrf
@method('PUT')

<input name="local_name"
       value="{{ $plant->local_name }}"
       class="border p-3 w-full mb-3 rounded">

<input name="scientific_name"
       value="{{ $plant->scientific_name }}"
       class="border p-3 w-full mb-3 rounded">

<textarea name="description"
          class="border p-3 w-full mb-3 rounded">{{ $plant->description }}</textarea>

<textarea name="health_benefits"
          class="border p-3 w-full mb-3 rounded">{{ $plant->health_benefits }}</textarea>

<textarea name="processing_potential"
          class="border p-3 w-full mb-3 rounded">{{ $plant->processing_potential }}</textarea>

<select name="category_id"
        class="border p-3 w-full mb-3 rounded">
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}"
            {{ $plant->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

<label class="flex items-center gap-2 mb-3">
    <input type="checkbox" name="is_published"
        {{ $plant->is_published ? 'checked' : '' }}>
    Publish
</label>

<button class="bg-emerald-600 text-white px-6 py-2 rounded">
    Update
</button>

</form>
</div>
@endsection
