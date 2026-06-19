<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /** Detect route prefix based on logged-in user role */
    private function routePrefix(): string
    {
        return Auth::check() && Auth::user()->role === 'admin' ? 'admin' : 'member';
    }

    // Public Listing
    public function publicListing()
    {
        $activities = Activity::latest()->paginate(9);
        return view('pages.activity', compact('activities'));
    }

    // Public Show
    public function publicShow(Activity $activity)
    {
        return view('pages.activity-detail', compact('activity'));
    }

    // CRUD Index
    public function index()
    {
        $prefix = $this->routePrefix();
        $activities = Activity::latest()->paginate(10);
        return view('admin.activity.index', compact('activities', 'prefix'));
    }

    public function create()
    {
        $prefix = $this->routePrefix();
        return view('admin.activity.create', compact('prefix'));
    }

    public function store(Request $request)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string',
            'date'     => 'required|date',
            'image'    => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        Activity::create($data);

        return redirect()->route("{$prefix}.activity.index")->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Activity $activity)
    {
        $prefix = $this->routePrefix();
        return view('admin.activity.edit', compact('activity', 'prefix'));
    }

    public function update(Request $request, Activity $activity)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'name'     => 'required|string|max:255',
            'location' => 'required|string',
            'date'     => 'required|date',
            'image'    => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($activity->image)
                Storage::disk('public')->delete($activity->image);
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        $activity->update($data);

        return redirect()->route("{$prefix}.activity.index")->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        $prefix = $this->routePrefix();

        if ($activity->image)
            Storage::disk('public')->delete($activity->image);
        $activity->delete();

        return redirect()->route("{$prefix}.activity.index")->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function show(Activity $activity)
    {
        $prefix = $this->routePrefix();
        return view('admin.activity.show', compact('activity', 'prefix'));
    }
}
