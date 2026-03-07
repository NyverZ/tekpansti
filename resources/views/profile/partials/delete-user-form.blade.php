<section class="space-y-6">

<header>
<h2 class="text-xl font-semibold text-red-600">
Zona Berbahaya
</h2>

<p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen.
</p>
</header>

<div class="p-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-2xl">

<button
x-data=""
x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl font-medium shadow transition"
>
Hapus Akun
</button>

</div>


<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

<form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
@csrf
@method('delete')


<h2 class="text-lg font-semibold text-gray-800 dark:text-white">
Apakah Anda yakin ingin menghapus akun Anda?
</h2>

<p class="text-sm text-gray-500 dark:text-gray-400">
Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen.
Silakan masukkan kata sandi Anda untuk konfirmasi.
</p>


<input
id="password"
name="password"
type="password"
placeholder="Masukkan kata sandi Anda"
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
Batal
</button>

<button
type="submit"
class="px-5 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white"
>
Hapus Akun
</button>

</div>

</form>

</x-modal>

</section>
