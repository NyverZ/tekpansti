@extends('layouts.app')

@section('content')

<div class="min-h-[80vh] flex items-center justify-center px-6">

<div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8">

<div class="text-center mb-6">

<h1 class="text-3xl font-bold text-emerald-600">
🌿 EduPlant
</h1>

<p class="text-gray-500 dark:text-gray-400 mt-2">
Buat akun baru
</p>

</div>


<form method="POST" action="{{ route('register') }}" class="space-y-4">
@csrf


<div>

<label class="block text-sm font-medium text-gray-600 dark:text-gray-300">
Nama
</label>

<input
type="text"
name="name"
value="{{ old('name') }}"
required
class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500">

@error('name')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<div>

<label class="block text-sm font-medium text-gray-600 dark:text-gray-300">
Email
</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
required
class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500">

@error('email')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<div>

<label class="block text-sm font-medium text-gray-600 dark:text-gray-300">
Password
</label>

<input
type="password"
name="password"
required
class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500">

@error('password')
<p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror

</div>


<div>

<label class="block text-sm font-medium text-gray-600 dark:text-gray-300">
Konfirmasi Password
</label>

<input
type="password"
name="password_confirmation"
required
class="w-full mt-1 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg px-4 py-2 focus:ring-2 focus:ring-emerald-500">

</div>


<button
class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-2 rounded-lg font-semibold transition">

Register

</button>

</form>


<p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">

Sudah punya akun?

<a href="{{ route('login') }}" class="text-emerald-600 font-semibold">
Login
</a>

</p>

</div>

</div>

@endsection
