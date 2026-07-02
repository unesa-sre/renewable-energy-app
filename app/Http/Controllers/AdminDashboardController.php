<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Activity;
use App\Models\Research;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $activities = Activity::latest()->take(5)->get();
        $articles = Article::latest()->take(3)->get();

        $stats = [
            'research' => [
                'total' => \App\Models\Research::count(),
                'last_date' => \App\Models\Research::latest()->first()?->created_at?->format('d M Y') ?? '-',
                'last_count' => \App\Models\Research::whereDate('created_at', \App\Models\Research::latest()->first()?->created_at ?? now())->count() ?? 0,
            ],
            'activity' => [
                'total' => \App\Models\Activity::count(),
                'last_date' => \App\Models\Activity::latest()->first()?->created_at?->format('d M Y') ?? '-',
                'last_count' => \App\Models\Activity::whereDate('created_at', \App\Models\Activity::latest()->first()?->created_at ?? now())->count() ?? 0,
            ],
            'news' => [
                'total' => \App\Models\Article::count(),
                'last_date' => \App\Models\Article::latest()->first()?->created_at?->format('d M Y') ?? '-',
                'last_count' => \App\Models\Article::whereDate('created_at', \App\Models\Article::latest()->first()?->created_at ?? now())->count() ?? 0,
            ],
            'product' => [
                'total' => \App\Models\Product::count(),
                'last_date' => \App\Models\Product::latest()->first()?->created_at?->format('d M Y') ?? '-',
                'last_count' => \App\Models\Product::whereDate('created_at', \App\Models\Product::latest()->first()?->created_at ?? now())->count() ?? 0,
            ],
        ];

        // Combined History
        $history = collect();
        
        $history = $history->concat(\App\Models\Research::withTrashed()->latest()->take(5)->get()->map(fn($item) => [
            'title' => $item->title,
            'type' => 'Research',
            'date' => $item->created_at,
            'color' => 'emerald',
            'status' => $item->trashed() ? 'Deleted' : 'Live'
        ]));

        $history = $history->concat(\App\Models\Activity::withTrashed()->latest()->take(5)->get()->map(fn($item) => [
            'title' => $item->name,
            'type' => 'Activity',
            'date' => $item->created_at,
            'color' => 'blue',
            'status' => $item->trashed() ? 'Deleted' : 'Live'
        ]));

        $history = $history->concat(\App\Models\Article::withTrashed()->latest()->take(5)->get()->map(fn($item) => [
            'title' => $item->title,
            'type' => 'News',
            'date' => $item->created_at,
            'color' => 'sky',
            'status' => $item->trashed() ? 'Deleted' : 'Live'
        ]));

        $history = $history->concat(\App\Models\Product::withTrashed()->latest()->take(5)->get()->map(fn($item) => [
            'title' => $item->name,
            'type' => 'Product',
            'date' => $item->created_at,
            'color' => 'amber',
            'status' => $item->trashed() ? 'Deleted' : 'Live'
        ]));

        $history = $history->sortByDesc('date')->take(10);

        return view('admin.dashboard', compact('user', 'activities', 'articles', 'stats', 'history'));
    }

    // CRUD Indexes (Resource routes would usually handle this, but adding here as requested)
    public function researchIndex()
    {
        $researches = Research::all();
        return view('admin.research.index', compact('researches'));
    }

    public function activityIndex()
    {
        $activities = Activity::all();
        return view('admin.activity.index', compact('activities'));
    }

    public function articleIndex()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    public function userIndex()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

}

