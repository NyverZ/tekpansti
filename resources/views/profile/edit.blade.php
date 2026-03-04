@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-12">

<!-- Header -->
<div class="mb-10">

<h1 class="text-3xl font-bold text-gray-800 dark:text-white">
Profile Settings
</h1>

<p class="text-gray-500 dark:text-gray-400 mt-2">
Kelola informasi akun dan keamanan akun Anda.
</p>

</div>


<div class="grid md:grid-cols-3 gap-8">

<!-- Sidebar -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">

<div class="flex flex-col items-center text-center">

<div class="w-20 h-20 rounded-full bg-emerald-600 text-white flex items-center justify-center text-3xl font-bold mb-4">
{{ strtoupper(substr(Auth::user()->name,0,1)) }}
</div>

<h2 class="font-semibold text-gray-800 dark:text-white">
{{ Auth::user()->name }}
</h2>

<p class="text-sm text-gray-500 dark:text-gray-400">
{{ Auth::user()->email }}
</p>

</div>

<hr class="my-6 border-gray-200 dark:border-gray-700">

<div class="space-y-3 text-sm">

<p class="text-gray-500 dark:text-gray-400">
Account Settings
</p>

<p class="text-gray-500 dark:text-gray-400">
Security
</p>

<p class="text-red-500">
Danger Zone
</p>

</div>

</div>


<!-- Main Content -->
<div class="md:col-span-2 space-y-6">


<!-- Update Profile -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">

<h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
Update Profile Information
</h2>

@include('profile.partials.update-profile-information-form')
</div>


<!-- Update Password -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">

<h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
Change Password
</h2>

@include('profile.partials.update-password-form')

</div>


<!-- Delete Account -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 border border-red-200 dark:border-red-800">

<h2 class="text-lg font-semibold text-red-500 mb-4">
Delete Account
</h2>

@include('profile.partials.delete-user-form')

</div>

</div>

</div>

</div>

@endsection
