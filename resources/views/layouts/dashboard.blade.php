<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ config('app.name') }} Dashboard</title>

<!-- DARK MODE LOAD -->
<script>
if (localStorage.theme === 'dark') {
document.documentElement.classList.add('dark')
}
</script>

@vite(['resources/css/app.css','resources/js/app.js'])

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>


<body class="bg-gray-100 dark:bg-gray-900 flex min-h-screen">

<!-- SIDEBAR -->
<aside class="w-64 bg-white dark:bg-gray-800 shadow-xl flex flex-col">

<!-- LOGO -->
<div class="p-6 text-2xl font-bold text-emerald-600">
<a href="{{ route('home') }}">
🌿 EduPlant
</a>
</div>


<nav class="flex-1 px-4 space-y-2">

<!-- DASHBOARD -->
<a href="{{ route('dashboard') }}"
class="flex items-center gap-3 px-4 py-3 rounded-lg
hover:bg-emerald-50 dark:hover:bg-gray-700
{{ request()->routeIs('dashboard') ? 'bg-emerald-100 dark:bg-gray-700' : '' }}">

🏠
<span>Dashboard</span>

</a>


<!-- TANAMAN -->
<a href="{{ route('plants.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-lg
hover:bg-emerald-50 dark:hover:bg-gray-700">

🌱
<span>Tanaman</span>

</a>


@if(auth()->user()->role === 'admin')

<!-- ADMIN -->
<a href="{{ route('admin.plants.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-lg
hover:bg-emerald-50 dark:hover:bg-gray-700">

🛠
<span>Kelola Tanaman</span>

</a>

@endif


<!-- SETTINGS -->
<a href="{{ route('profile.edit') }}"
class="flex items-center gap-3 px-4 py-3 rounded-lg
hover:bg-emerald-50 dark:hover:bg-gray-700">

⚙️
<span>Settings</span>

</a>

</nav>


<!-- LOGOUT -->
<div class="p-4 border-t dark:border-gray-700">

<form method="POST" action="{{ route('logout') }}">
@csrf

<button
class="w-full flex items-center gap-3 px-4 py-3 rounded-lg
hover:bg-red-50 text-red-500">

🚪
<span>Logout</span>

</button>

</form>

</div>

</aside>


<!-- MAIN AREA -->
<div class="flex-1 flex flex-col">


<!-- TOPBAR -->
<header class="bg-white dark:bg-gray-800 shadow px-8 py-4 flex justify-between items-center">

<h1 class="text-lg font-semibold">
Dashboard
</h1>


<div class="flex items-center gap-4">

<!-- DARK MODE -->
<button onclick="toggleDark()"
class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:scale-105 transition">

<span class="dark:hidden">🌙</span>
<span class="hidden dark:inline">☀️</span>

</button>


<!-- USER -->
<div class="flex items-center gap-3">

<div class="w-8 h-8 bg-emerald-600 rounded-full flex items-center justify-center text-white font-bold">

{{ strtoupper(substr(Auth::user()->name,0,1)) }}

</div>

<span class="text-sm">
{{ Auth::user()->name }}
</span>

</div>

</div>

</header>


<!-- CONTENT -->
<main class="flex-1 p-8">

@yield('content')

</main>


</div>


<!-- DARK MODE SCRIPT -->
<script>

function toggleDark(){

document.documentElement.classList.toggle('dark')

if(document.documentElement.classList.contains('dark')){
localStorage.theme='dark'
}else{
localStorage.theme='light'
}

}

</script>

</body>
</html>
