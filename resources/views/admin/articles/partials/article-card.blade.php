<article class="group overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white/80 shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-[0_20px_55px_rgba(16,185,129,0.18)] dark:border-slate-700/80 dark:bg-slate-900/75">
    @if ($article->image_url)
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="h-52 w-full object-cover" loading="lazy">
    @else
        <div class="flex h-52 items-end bg-[linear-gradient(135deg,#0f766e,#0891b2,#f59e0b)] p-6">
            <span class="rounded-full border border-white/20 bg-white/15 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] text-white">
                SafeFood Article
            </span>
        </div>
    @endif

    <div class="space-y-5 p-6">
        <div class="flex items-start justify-between gap-4">
            <div>
                <p class="text-sm uppercase tracking-[0.18em] text-slate-500 dark:text-slate-400">{{ $article->created_at->format('d M Y') }}</p>
                <h3 class="mt-3 text-2xl font-bold leading-tight text-slate-900 dark:text-white">{{ $article->title }}</h3>
            </div>
            <span class="shrink-0 rounded-full px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.18em] {{ $article->is_published ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-300' : 'bg-amber-100 text-amber-700 dark:bg-amber-500/10 dark:text-amber-300' }}">
                {{ $article->is_published ? 'Published' : 'Draft' }}
            </span>
        </div>

        <p class="text-sm leading-7 text-slate-600 dark:text-slate-300">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 130) }}</p>

        <div class="flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('admin.articles.edit', $article) }}" class="inline-flex flex-1 items-center justify-center rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-slate-800 dark:bg-slate-100 dark:text-slate-900 dark:hover:bg-white">
                Edit
            </a>
            <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus artikel ini?')" class="inline-flex w-full items-center justify-center rounded-xl bg-rose-600 px-4 py-3 text-sm font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-rose-700">
                    Delete
                </button>
            </form>
        </div>
    </div>
</article>
