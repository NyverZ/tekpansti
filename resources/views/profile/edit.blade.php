@extends('layouts.dashboard')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

<!-- PROFILE HEADER -->
<div class="bg-gradient-to-r from-emerald-500 to-teal-600 rounded-3xl p-8 shadow-xl mb-10">

<div class="flex items-center gap-6">

<div class="w-24 h-24 rounded-full bg-white text-emerald-600 flex items-center justify-center text-4xl font-bold shadow-lg">
{{ strtoupper(substr(Auth::user()->name,0,1)) }}
</div>

<div class="text-white">
<h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>
<p class="opacity-90">{{ Auth::user()->email }}</p>

<p class="text-sm opacity-80 mt-2">
Kelola informasi akun dan keamanan Anda
</p>
</div>

</div>

</div>



<div class="grid lg:grid-cols-4 gap-8">


<!-- SIDEBAR -->
<div class="space-y-4">

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-5">

<h3 class="font-semibold text-gray-800 dark:text-white mb-4">
Menu
</h3>

<div class="space-y-2">

<div class="p-3 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 font-medium">
Profil
</div>

<div class="p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer transition">
Pengaturan Akun
</div>

<div class="p-3 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer transition">
Keamanan
</div>

<div class="p-3 rounded-xl hover:bg-red-50 dark:hover:bg-red-900/30 text-red-500 cursor-pointer transition">
Zona Berbahaya
</div>

</div>

</div>


<!-- ACCOUNT CARD -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-5">

<h3 class="font-semibold text-gray-800 dark:text-white mb-4">
Info Akun
</h3>

<div class="space-y-2 text-sm">

<p class="text-gray-500 dark:text-gray-400">
Nama
</p>

<p class="font-medium text-gray-800 dark:text-white">
{{ Auth::user()->name }}
</p>

<p class="text-gray-500 dark:text-gray-400 mt-3">
Email
</p>

<p class="font-medium text-gray-800 dark:text-white">
{{ Auth::user()->email }}
</p>

</div>

</div>

</div>



<!-- MAIN CONTENT -->
<div class="lg:col-span-3 space-y-6">


<!-- UPDATE PROFILE -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">

<h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">
Perbarui Informasi Profil
</h2>

@include('profile.partials.update-profile-information-form')

</div>



<!-- UPDATE PASSWORD -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">

<h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">
Ubah Kata Sandi
</h2>

@include('profile.partials.update-password-form')

</div>



<!-- DELETE ACCOUNT -->
<div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-2xl p-8">

<h2 class="text-xl font-semibold text-red-600 mb-6">
Hapus Akun
</h2>

@include('profile.partials.delete-user-form')

</div>


</div>

</div>

</div>

@endsection
