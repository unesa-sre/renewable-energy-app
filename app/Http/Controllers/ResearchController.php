<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResearchController extends Controller
{
    /** Detect route prefix based on logged-in user role */
    private function routePrefix(): string
    {
        return Auth::check() && Auth::user()->role === 'admin' ? 'admin' : 'member';
    }

    // CRUD Index
    public function index()
    {
        $prefix = $this->routePrefix();
        $researches = Research::latest()->paginate(10);
        return view('admin.research.index', compact('researches', 'prefix'));
    }

    public function create()
    {
        $prefix = $this->routePrefix();
        return view('admin.research.create', compact('prefix'));
    }

    public function store(Request $request)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'file'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['file', 'image']);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('research', 'public');
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('research/images', 'public');
        }

        Research::create($data);

        return redirect()->route("{$prefix}.research.index")->with('success', 'Riset berhasil ditambahkan.');
    }

    public function edit(Research $research)
    {
        $prefix = $this->routePrefix();
        return view('admin.research.edit', compact('research', 'prefix'));
    }

    public function update(Request $request, Research $research)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'file'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['file', 'image']);

        if ($request->hasFile('file')) {
            if ($research->file_path)
                Storage::disk('public')->delete($research->file_path);
            $data['file_path'] = $request->file('file')->store('research', 'public');
        }

        if ($request->hasFile('image')) {
            if ($research->image)
                Storage::disk('public')->delete($research->image);
            $data['image'] = $request->file('image')->store('research/images', 'public');
        }

        $research->update($data);

        return redirect()->route("{$prefix}.research.index")->with('success', 'Riset berhasil diperbarui.');
    }

    public function destroy(Research $research)
    {
        $prefix = $this->routePrefix();

        if ($research->file_path)
            Storage::disk('public')->delete($research->file_path);
        if ($research->image)
            Storage::disk('public')->delete($research->image);
        $research->delete();

        return redirect()->route("{$prefix}.research.index")->with('success', 'Riset berhasil dihapus.');
    }

    // Public Methods
    public function publicListing()
    {
        $researches = Research::latest()->paginate(9);
        return view('pages.research-list', compact('researches'));
    }

    public function publicShow(Research $research)
    {
        return view('pages.research-detail-db', compact('research'));
    }

    public function show(Research $research)
    {
        $prefix = $this->routePrefix();
        return view('admin.research.show', compact('research', 'prefix'));
    }
}
