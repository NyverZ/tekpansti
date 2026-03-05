<section class="space-y-6">

<header class="mb-6">
<h2 class="text-xl font-semibold text-gray-800 dark:text-white">
Update Password
</h2>

<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
Ensure your account is using a long, random password to stay secure.
</p>
</header>

<form method="post" action="{{ route('password.update') }}" class="space-y-6">
@csrf
@method('put')


<!-- CURRENT PASSWORD -->
<div>

<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Current Password
</label>

<input
id="update_password_current_password"
name="current_password"
type="password"
autocomplete="current-password"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
outline-none transition"
/>

<x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

</div>


<!-- NEW PASSWORD -->
<div>

<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
New Password
</label>

<input
id="update_password_password"
name="password"
type="password"
autocomplete="new-password"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
outline-none transition"
/>

<x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

</div>


<!-- CONFIRM PASSWORD -->
<div>

<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Confirm Password
</label>

<input
id="update_password_password_confirmation"
name="password_confirmation"
type="password"
autocomplete="new-password"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
outline-none transition"
/>

<x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

</div>


<!-- BUTTON -->
<div class="flex items-center gap-4">

<button
type="submit"
class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700
text-white font-medium shadow-md transition"
>
Update Password
</button>

@if (session('status') === 'password-updated')

<p
x-data="{ show: true }"
x-show="show"
x-transition
x-init="setTimeout(() => show = false, 2000)"
class="text-sm text-gray-500 dark:text-gray-400"
>
Saved.
</p>

@endif

</div>

</form>

</section>
