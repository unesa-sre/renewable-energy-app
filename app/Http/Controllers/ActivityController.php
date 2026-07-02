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
            'name'            => 'required|string|max:255',
            'location'        => 'required|string',
            'date'            => 'required|date',
            'description'     => 'nullable|string',
            'image'           => 'nullable|image|max:4096',
            'gallery_images'  => 'nullable|array|max:3',
            'gallery_images.*'=> 'nullable|image|max:4096',
            'participants'    => 'nullable|string',
        ]);

        $data = $request->only(['name', 'location', 'date', 'description']);

        // Parse participants
        if ($request->filled('participants')) {
            $data['participants'] = array_values(array_filter(
                array_map('trim', preg_split('/[,\n]+/', $request->participants))
            ));
        } else {
            $data['participants'] = [];
        }

        // Poster image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        // Gallery images (max 3)
        $gallery = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if ($file && $file->isValid()) {
                    $gallery[] = $file->store('activities/gallery', 'public');
                }
            }
        }
        $data['gallery_images'] = $gallery;

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
            'name'            => 'required|string|max:255',
            'location'        => 'required|string',
            'date'            => 'required|date',
            'description'     => 'nullable|string',
            'image'           => 'nullable|image|max:4096',
            'gallery_images'  => 'nullable|array|max:3',
            'gallery_images.*'=> 'nullable|image|max:4096',
            'participants'    => 'nullable|string',
        ]);

        $data = $request->only(['name', 'location', 'date', 'description']);

        // Parse participants
        if ($request->filled('participants')) {
            $data['participants'] = array_values(array_filter(
                array_map('trim', preg_split('/[,\n]+/', $request->participants))
            ));
        } else {
            $data['participants'] = [];
        }

        // Poster image
        if ($request->hasFile('image')) {
            if ($activity->image)
                Storage::disk('public')->delete($activity->image);
            $data['image'] = $request->file('image')->store('activities', 'public');
        }

        // Gallery images — keep existing, replace slots where new file uploaded
        $existingGallery = $activity->gallery_images ?? [];

        // Handle individual gallery slot removals
        $removeSlots = $request->input('remove_gallery', []);
        foreach ($removeSlots as $slot) {
            $slot = (int) $slot;
            if (isset($existingGallery[$slot])) {
                Storage::disk('public')->delete($existingGallery[$slot]);
                $existingGallery[$slot] = null;
            }
        }

        // Handle new uploads per slot
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $slot => $file) {
                if ($file && $file->isValid()) {
                    // Delete old in this slot if any
                    if (!empty($existingGallery[$slot])) {
                        Storage::disk('public')->delete($existingGallery[$slot]);
                    }
                    $existingGallery[$slot] = $file->store('activities/gallery', 'public');
                }
            }
        }

        // Re-index and filter nulls
        $data['gallery_images'] = array_values(array_filter($existingGallery));

        $activity->update($data);

        return redirect()->route("{$prefix}.activity.index")->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        $prefix = $this->routePrefix();

        if ($activity->image)
            Storage::disk('public')->delete($activity->image);

        if ($activity->gallery_images) {
            foreach ($activity->gallery_images as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $activity->delete();

        return redirect()->route("{$prefix}.activity.index")->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function show(Activity $activity)
    {
        $prefix = $this->routePrefix();
        return view('admin.activity.show', compact('activity', 'prefix'));
    }
}
