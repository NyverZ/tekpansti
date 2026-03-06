@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-semibold uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400']) }}>
    {{ $value ?? $slot }}
</label>
