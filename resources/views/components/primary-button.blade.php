<button {{ $attributes->merge(['type' => 'submit', 'class' => 'sf-button-primary inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold normal-case tracking-normal focus:outline-none focus:ring-2 focus:ring-teal-500/30']) }}>
    {{ $slot }}
</button>
