<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /** Detect route prefix based on logged-in user role */
    private function routePrefix(): string
    {
        return Auth::check() && Auth::user()->role === 'admin' ? 'admin' : 'member';
    }

    // Public Listing (Guest and Members)
    public function publicIndex()
    {
        $products = Product::all();
        return view('pages.merch', compact('products'));
    }

    // CRUD Index
    public function index()
    {
        $prefix = $this->routePrefix();
        $products = Product::latest()->paginate(10);
        return view('admin.product.index', compact('products', 'prefix'));
    }

    public function create()
    {
        $prefix = $this->routePrefix();
        return view('admin.product.create', compact('prefix'));
    }

    public function store(Request $request)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'category'   => 'required|string|max:100',
            'name'       => 'required|string|max:255',
            'description'=> 'required',
            'price'      => 'required|numeric',
            'order_link' => 'nullable|url|max:255',
            'images.*'   => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['is_special'] = $request->boolean('is_special');

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if (count($imagePaths) < 4) {
                    $imagePaths[] = $file->store('products', 'public');
                }
            }
        }
        $data['image'] = $imagePaths;

        Product::create($data);

        return redirect()->route("{$prefix}.product.index")->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $prefix = $this->routePrefix();
        return view('admin.product.edit', compact('product', 'prefix'));
    }

    public function update(Request $request, Product $product)
    {
        $prefix = $this->routePrefix();

        $request->validate([
            'category'   => 'required|string|max:100',
            'name'       => 'required|string|max:255',
            'description'=> 'required',
            'price'      => 'required|numeric',
            'order_link' => 'nullable|url|max:255',
            'images.*'   => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['is_special'] = $request->boolean('is_special');

        $imagePaths = $product->image ?? [];
        if ($request->hasFile('images')) {
            if (is_array($imagePaths)) {
                foreach ($imagePaths as $oldPath) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                if (count($imagePaths) < 4) {
                    $imagePaths[] = $file->store('products', 'public');
                }
            }
        }
        $data['image'] = $imagePaths;

        $product->update($data);

        return redirect()->route("{$prefix}.product.index")->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $prefix = $this->routePrefix();

        if ($product->image && is_array($product->image)) {
            foreach ($product->image as $path) {
                Storage::disk('public')->delete($path);
            }
        }
        $product->delete();

        return redirect()->route("{$prefix}.product.index")->with('success', 'Produk berhasil dihapus.');
    }
}
