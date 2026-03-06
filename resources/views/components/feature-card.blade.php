@props([
    'icon' => 'shield',
    'title',
    'description',
    'href' => '#',
    'cta' => 'Explore',
    'accent' => 'teal',
])

@php
    $accentStyles = [
        'teal' => [
            'glow' => 'from-teal-500/20 to-cyan-500/10',
            'icon' => 'bg-gradient-to-br from-teal-500/20 to-cyan-500/10 text-teal-600 ring-teal-500/20 dark:text-teal-300 dark:ring-teal-400/20',
        ],
        'amber' => [
            'glow' => 'from-amber-500/20 to-orange-500/10',
            'icon' => 'bg-gradient-to-br from-amber-500/20 to-orange-500/10 text-amber-600 ring-amber-500/20 dark:text-amber-300 dark:ring-amber-400/20',
        ],
        'sky' => [
            'glow' => 'from-sky-500/20 to-indigo-500/10',
            'icon' => 'bg-gradient-to-br from-sky-500/20 to-indigo-500/10 text-sky-600 ring-sky-500/20 dark:text-sky-300 dark:ring-sky-400/20',
        ],
        'rose' => [
            'glow' => 'from-rose-500/20 to-pink-500/10',
            'icon' => 'bg-gradient-to-br from-rose-500/20 to-pink-500/10 text-rose-600 ring-rose-500/20 dark:text-rose-300 dark:ring-rose-400/20',
        ],
        'violet' => [
            'glow' => 'from-violet-500/20 to-fuchsia-500/10',
            'icon' => 'bg-gradient-to-br from-violet-500/20 to-fuchsia-500/10 text-violet-600 ring-violet-500/20 dark:text-violet-300 dark:ring-violet-400/20',
        ],
    ];

    $palette = $accentStyles[$accent] ?? $accentStyles['teal'];
@endphp

<article class="sf-panel sf-hover-lift group relative overflow-hidden p-7 md:p-8">
    <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-r {{ $palette['glow'] }}"></div>
    <div class="relative">
        <div class="flex h-14 w-14 items-center justify-center rounded-2xl {{ $palette['icon'] }} ring-1">
            @switch($icon)
                @case('shield')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3l7 3v5c0 5-3.5 8.5-7 10-3.5-1.5-7-5-7-10V6l7-3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.5 12.5l1.75 1.75L15 10.5" />
                    </svg>
                    @break
                @case('check')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 11l3 3L22 4" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg>
                    @break
                @case('chart')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 19h16" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16V9m5 7V5m5 11v-4" />
                    </svg>
                    @break
                @case('spark')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 3l1.8 4.7L19.5 9l-4.7 1.3L13 15l-1.8-4.7L6.5 9l4.7-1.3L13 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 17l.9 2.1L8 20l-2.1.9L5 23l-.9-2.1L2 20l2.1-.9L5 17z" />
                    </svg>
                    @break
                @default
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 5h12a1 1 0 011 1v12a1 1 0 01-1 1H6a1 1 0 01-1-1V6a1 1 0 011-1z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h8" />
                    </svg>
            @endswitch
        </div>

        <h3 class="mt-6 text-2xl font-bold text-slate-900 dark:text-white">{{ $title }}</h3>
        <p class="mt-4 text-sm leading-7 text-slate-600 dark:text-slate-300">{{ $description }}</p>

        <a href="{{ $href }}" class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-slate-900 transition group-hover:gap-3 dark:text-white">
            {{ $cta }}
            <span aria-hidden="true">-></span>
        </a>
    </div>
</article>
