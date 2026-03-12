<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Notifications\NewArticlePublishedNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request): View
    {
        $articles = Article::query()
            ->when(
                $request->filled('search'),
                fn ($query) => $query->where(function ($articleQuery) use ($request) {
                    $search = $request->string('search');

                    $articleQuery
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                })
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $article = Article::create([
            'title' => $request->validated('title'),
            'slug' => $this->makeSlug($request->validated('title')),
            'content' => $request->validated('content'),
            'image' => $request->validated('image'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        if ($article->is_published) {
            $this->notifyUsersAboutPublishedArticle($article);
        }

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $wasPublished = (bool) $article->is_published;

        $article->update([
            'title' => $request->validated('title'),
            'slug' => $this->makeSlug($request->validated('title'), $article->id),
            'content' => $request->validated('content'),
            'image' => $request->validated('image'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        if (! $wasPublished && $article->is_published) {
            $this->notifyUsersAboutPublishedArticle($article);
        }

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    private function makeSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (
            Article::query()
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function notifyUsersAboutPublishedArticle(Article $article): void
    {
        $actorId = auth()->id();

        User::query()
            ->where(function ($query) use ($actorId) {
                if ($actorId !== null) {
                    $query->where('id', '!=', $actorId);
                }

                $query->where(function ($roleQuery) {
                    $roleQuery->whereNull('role')->orWhere('role', '!=', 'admin');
                });
            })
            ->select(['id'])
            ->chunkById(200, function ($users) use ($article) {
                foreach ($users as $user) {
                    $user->notify(new NewArticlePublishedNotification($article));
                }
            });
    }
}
