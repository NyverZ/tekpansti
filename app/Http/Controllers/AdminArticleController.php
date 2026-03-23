<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Notifications\NewArticlePublishedNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->string('search'));
        $sort = (string) $request->string('sort', 'latest');

        $articles = Article::query()
            ->when(
                $search !== '',
                fn ($query) => $query->where(function ($articleQuery) use ($search) {
                    $articleQuery
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('content', 'like', '%' . $search . '%');
                })
            )
            ->when($sort === 'oldest', fn ($query) => $query->oldest())
            ->when($sort === 'title', fn ($query) => $query->orderBy('title'))
            ->when(! in_array($sort, ['oldest', 'title'], true), fn ($query) => $query->latest())
            ->paginate(10)
            ->withQueryString();

        return view('admin.articles.index', compact('articles', 'search', 'sort'));
    }

    public function create(): View
    {
        return view('admin.articles.create');
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('articles', 'public')
            : null;

        $article = Article::create([
            'title' => $validated['title'],
            'slug' => $this->makeSlug($validated['title']),
            'content' => $validated['content'],
            'image' => $imagePath,
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
        $validated = $request->validated();
        $imagePath = $article->image;

        if ($request->hasFile('image')) {
            if ($this->isStoredImagePath($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $this->makeSlug($validated['title'], $article->id),
            'content' => $validated['content'],
            'image' => $imagePath,
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
        if ($this->isStoredImagePath($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

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

    private function isStoredImagePath(?string $path): bool
    {
        return filled($path) && ! Str::startsWith($path, ['http://', 'https://']);
    }
}
