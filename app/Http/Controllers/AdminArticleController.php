<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
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
        Article::create([
            'title' => $request->validated('title'),
            'slug' => $this->makeSlug($request->validated('title')),
            'content' => $request->validated('content'),
            'image' => $request->validated('image'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update([
            'title' => $request->validated('title'),
            'slug' => $this->makeSlug($request->validated('title'), $article->id),
            'content' => $request->validated('content'),
            'image' => $request->validated('image'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
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
}
