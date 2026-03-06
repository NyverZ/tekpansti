@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge(['class' => 'rounded-[1.25rem] border border-slate-200 bg-white/95 px-4 py-3 text-sm font-medium text-slate-900 shadow-sm transition placeholder:text-slate-400 focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 dark:border-slate-600 dark:bg-slate-950/90 dark:text-slate-50 dark:placeholder:text-slate-500']) }}
>
