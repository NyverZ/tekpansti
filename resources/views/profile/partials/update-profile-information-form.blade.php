<section class="space-y-6">

<header class="mb-6">
<h2 class="text-xl font-semibold text-gray-800 dark:text-white">
{{ __('Profile Information') }}
</h2>

<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
{{ __("Update your account's profile information and email address.") }}
</p>
</header>


<form id="send-verification" method="post" action="{{ route('verification.send') }}">
@csrf
</form>


<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
@csrf
@method('patch')


<!-- NAME -->
<div>

<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Name
</label>

<input
id="name"
name="name"
type="text"
value="{{ old('name', $user->name) }}"
required
autofocus
autocomplete="name"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
outline-none transition"
/>

<x-input-error class="mt-2" :messages="$errors->get('name')" />

</div>



<!-- EMAIL -->
<div>

<label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
Email
</label>

<input
id="email"
name="email"
type="email"
value="{{ old('email', $user->email) }}"
required
autocomplete="username"
class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500
outline-none transition"
/>

<x-input-error class="mt-2" :messages="$errors->get('email')" />


@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

<div class="mt-3 p-4 rounded-xl bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700">

<p class="text-sm text-yellow-800 dark:text-yellow-200">
{{ __('Your email address is unverified.') }}
</p>

<button form="send-verification"
class="mt-2 text-sm text-emerald-600 hover:text-emerald-700 font-medium underline">
{{ __('Click here to re-send the verification email.') }}
</button>

@if (session('status') === 'verification-link-sent')

<p class="mt-2 text-sm text-green-600">
{{ __('A new verification link has been sent to your email address.') }}
</p>

@endif

</div>

@endif

</div>



<!-- BUTTON -->
<div class="flex items-center gap-4">

<button
type="submit"
class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700
text-white font-medium shadow-md transition"
>
Save Changes
</button>


@if (session('status') === 'profile-updated')

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
