<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /** Detect route prefix based on logged-in user role */
    private function routePrefix(): string
    {
        return Auth::check() && Auth::user()->role === 'admin' ? 'admin' : 'member';
    }

    // Public Listing (Guest and Members)
    public function publicListing()
    {
        $articles = Article::latest()->paginate(9);
        return view('pages.article', compact('articles'));
    }

    // Public Show
    public function publicShow(Article $article)
    {
        return view('pages.article-detail', compact('article'));
    }

    // CRUD Index
    public function index()
    {
        $prefix = $this->routePrefix();
        $articles = Article::latest()->paginate(10);
        return view('admin.article.index', compact('articles', 'prefix'));
    }

    public function create()
    {
        $prefix = $this->routePrefix();
        return view('admin.article.create', compact('prefix'));
    }

    public function store(Request $request)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route("{$prefix}.article.index")->with('success', 'Berita berhasil dibuat.');
    }

    public function edit(Article $article)
    {
        $prefix = $this->routePrefix();
        return view('admin.article.edit', compact('article', 'prefix'));
    }

    public function update(Request $request, Article $article)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route("{$prefix}.article.index")->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        $prefix = $this->routePrefix();

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route("{$prefix}.article.index")->with('success', 'Berita berhasil dihapus.');
    }

    // Detail view
    public function show(Article $article)
    {
        $prefix = $this->routePrefix();
        return view('admin.article.show', compact('article', 'prefix'));
    }
}
