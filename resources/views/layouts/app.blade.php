<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ config('app.name') }}</title>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>

AOS.init({
duration:1000,
once:true
})

</script>

<script>

function toggleDark(){

document.documentElement.classList.toggle('dark')

if(document.documentElement.classList.contains('dark')){
localStorage.theme='dark'
}else{
localStorage.theme='light'
}

}

if(localStorage.theme==='dark'){
document.documentElement.classList.add('dark')
}

</script>


<script>

    function toggleMenu(){
        const menu=document.getElementById('mobileMenu')
        menu.classList.toggle('hidden')
    }

</script>

<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- NAVBAR -->
<nav class="dark:bg-gray-900 bg-white/80 backdrop-blur-md border-b sticky top-0 z-50 shadow-sm">

<div class="container mx-auto px-6 py-3 flex justify-between items-center">


<!-- LOGO -->
<a href="{{ route('home') }}" class="flex items-center gap-2 hover:text-emerald-600 transition duration-300">
<span class="text-2xl">🌿</span>
<span class=" text-2xl bg-gradient-to-r from-emerald-500 to-green-600 bg-clip-text text-transparent font-bold">
EduPlant
</span>
</a>


<!-- DESKTOP MENU -->
<div class="hidden md:flex items-center gap-6 text-sm font-medium">

<a href="{{ route('home') }}" class="hover:text-emerald-600">Beranda</a>


@auth
@if(auth()->user()->role !== 'admin')
<a href="{{ route('suggest.form') }}" class="hover:text-emerald-600 transition duration-300">
Saran
</a>
@endif
@endauth


<a href="{{ route('edukasi') }}" class="hover:text-emerald-600">Edukasi</a>
<a href="{{ route('konsultasi') }}" class="hover:text-emerald-600">Konsultasi</a>
<a href="{{ route('selfcheck') }}" class="hover:text-emerald-600">Self-Check</a>
<a href="{{ route('quiz') }}" class="hover:text-emerald-600">Kuis</a>
<a href="{{ route('about') }}" class="hover:text-emerald-600">Tentang Kami</a>
<a href="{{ route('contact') }}" class="hover:text-emerald-600">Kontak</a>


@guest
<a href="{{ route('login') }}" class="hover:text-emerald-600">Login</a>

<a href="{{ route('register') }}"
class="bg-emerald-600 text-white px-4 py-2 rounded-xl hover:bg-emerald-700 transition">
Register
</a>
@endguest


<!-- DARK MODE -->
<button onclick="toggleDark()"
class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:scale-105 transition">

<span class="dark:hidden">🌙</span>
<span class="hidden dark:inline">☀️</span>

</button>


@auth

<div x-data="{open:false}" class="relative">

<button @click="open=!open" class="flex items-center gap-2">

<div class="w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold">

{{ strtoupper(substr(Auth::user()->name,0,1)) }}

</div>

<span>{{ Auth::user()->name }}</span>

</button>


<div x-show="open" @click.outside="open=false"
class="absolute right-0 mt-3 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-xl py-2">

<a href="{{ route('dashboard') }}"
class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
Dashboard
</a>

<a href="{{ route('profile.edit') }}"
class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
Settings
</a>


@if(auth()->user()->role === 'admin')
<a href="{{ route('admin.plants.index') }}"
class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
Kelola Tanaman
</a>
@endif


<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-red-500">
Logout
</button>
</form>

</div>

</div>

@endauth

</div>


<!-- HAMBURGER -->
<button onclick="toggleMenu()" class="md:hidden text-2xl p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition">
☰
</button>

</div>


<!-- MOBILE MENU -->
<div id="mobileMenu" class="hidden md:hidden bg-white dark:bg-gray-900 border-t">

<div class="flex flex-col px-6 py-4 gap-4 text-sm font-medium">

<a href="{{ route('home') }}">Beranda</a>

@auth
@if(auth()->user()->role !== 'admin')
<a href="{{ route('suggest.form') }}">
Saran
</a>
@endif
@endauth

<a href="{{ route('edukasi') }}">Edukasi</a>
<a href="{{ route('konsultasi') }}">Konsultasi</a>
<a href="{{ route('selfcheck') }}">Self-Check</a>
<a href="{{ route('about') }}">Tentang Kami</a>
<a href="{{ route('contact') }}">Kontak</a>


@guest
<a href="{{ route('login') }}">Login</a>

<a href="{{ route('register') }}"
class="bg-emerald-600 text-white px-4 py-2 rounded-xl w-fit">
Register
</a>
@endguest


<button onclick="toggleDark()"
class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 w-fit">
🌙 / ☀️
</button>


@auth
<a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('profile.edit') }}">Settings</a>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="text-red-500 text-left">
Logout
</button>
</form>
@endauth

</div>

</div>

</nav>


<!-- CONTENT -->
<main class="py-10">

@yield('content')

</main>


<!-- FOOTER -->
<footer class="dark:bg-gray-800 border-t mt-10 py-6 text-center text-sm text-gray-500">

© {{ date('Y') }} EduPlant. All rights reserved.

</footer>


</body>
</html>
