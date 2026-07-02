<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $latestResearch = \App\Models\Research::latest()->take(3)->get();
        $latestActivities = \App\Models\Activity::latest()->take(3)->get();
        $latestArticles = \App\Models\Article::latest()->take(3)->get();

        return view('pages.home', compact('latestResearch', 'latestActivities', 'latestArticles'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function merch()
    {
        return view('pages.merch');
    }

    public function research()
    {
        return view('pages.research');
    }

    public function activity()
    {
        return view('pages.activity');
    }

    public function article()
    {
        return view('pages.article');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
