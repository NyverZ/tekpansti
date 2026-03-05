<section class="space-y-6">

<header>
<h2 class="text-xl font-semibold text-red-600">
Danger Zone
</h2>

<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
Once your account is deleted, all of its resources and data will be permanently deleted.
</p>
</header>

<div class="p-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-2xl">

<button
x-data=""
x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-medium shadow transition"
>
Delete Account
</button>

</div>


<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

<form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
@csrf
@method('delete')


<h2 class="text-lg font-semibold text-gray-800 dark:text-white">
Are you sure you want to delete your account?
</h2>

<p class="text-sm text-gray-500 dark:text-gray-400">
Once your account is deleted, all resources and data will be permanently removed.
Please enter your password to confirm.
</p>


<input
id="password"
name="password"
type="password"
placeholder="Enter your password"
class="w-full px-4 py-3 rounded-xl border border-gray-300
dark:border-gray-600
bg-white dark:bg-gray-700
text-gray-800 dark:text-white
focus:ring-2 focus:ring-red-500 outline-none"
/>

<x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />


<div class="flex justify-end gap-3">

<button
type="button"
x-on:click="$dispatch('close')"
class="px-5 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200"
>
Cancel
</button>

<button
type="submit"
class="px-5 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white"
>
Delete Account
</button>

</div>

</form>

</x-modal>

</section>
