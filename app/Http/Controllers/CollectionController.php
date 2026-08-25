<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CollectionController extends Controller
{
    /**
     * Display all collections.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $collections = Collection::when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {
                $q->where('collection_id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%");
            });

        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view(
            'admin.collections.index',
            compact('collections', 'search')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $products = Product::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();

        return view(
            'admin.collections.create',
            compact('products')
        );
    }

    /**
     * Store collection.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',

            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'featured' => 'nullable',
            'show_home' => 'nullable',
            'status' => 'nullable',
            'sort_order' => 'nullable|integer',

            'seo_title' => 'nullable|string|max:255',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $collection = new Collection();

        $collection->product_id = $request->product_id;
        $collection->name = $request->name;
        $collection->price = $request->price;
        $collection->description = $request->description;

        $collection->featured = $request->has('featured') ? 1 : 0;
        $collection->show_home = $request->has('show_home') ? 1 : 0;
        $collection->status = $request->has('status') ? 1 : 0;
        $collection->sort_order = $request->sort_order ?? 0;

        $collection->seo_title = $request->seo_title;
        $collection->seo_keywords = $request->seo_keywords;
        $collection->seo_description = $request->seo_description;

        /*
        |--------------------------------------------------------------------------
        | Upload Directory
        |--------------------------------------------------------------------------
        */

        $uploadPath = public_path('uploads/collections');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');

            $name = time() . '_thumb.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $name);

            $collection->thumbnail = $name;
        }

        /*
        |--------------------------------------------------------------------------
        | Banner
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('banner')) {

            $image = $request->file('banner');

            $name = time() . '_banner.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $name);

            $collection->banner = $name;
        }

        /*
        |--------------------------------------------------------------------------
        | Icon
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            $image = $request->file('icon');

            $name = time() . '_icon.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $name);

            $collection->icon = $name;
        }

        $collection->save();

        return redirect()
            ->route('admin.collections.index')
            ->with('success', 'Collection created successfully.');
    }

    /**
     * Display collection.
     */
    public function show(Collection $collection)
    {
        return view(
            'admin.collections.show',
            compact('collection')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(Collection $collection)
    {
        $products = Product::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();

        return view(
            'admin.collections.edit',
            compact('collection', 'products')
        );
    }

    /**
     * Update collection.
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'featured' => 'nullable',
            'show_home' => 'nullable',
            'status' => 'nullable',
            'sort_order' => 'nullable|integer',

            'seo_title' => 'nullable|string|max:255',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $collection->product_id = $request->product_id;
        $collection->name = $request->name;
        $collection->price = $request->price;
        $collection->description = $request->description;

        $collection->featured = $request->has('featured') ? 1 : 0;
        $collection->show_home = $request->has('show_home') ? 1 : 0;
        $collection->status = $request->has('status') ? 1 : 0;
        $collection->sort_order = $request->sort_order ?? 0;

        $collection->seo_title = $request->seo_title;
        $collection->seo_keywords = $request->seo_keywords;
        $collection->seo_description = $request->seo_description;

        $uploadPath = public_path('uploads/collections');

        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            if (
                $collection->thumbnail &&
                File::exists(
                    $uploadPath . '/' . $collection->thumbnail
                )
            ) {
                File::delete(
                    $uploadPath . '/' . $collection->thumbnail
                );
            }

            $image = $request->file('thumbnail');

            $name = time() . '_thumb.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $name);

            $collection->thumbnail = $name;
        }

        /*
        |--------------------------------------------------------------------------
        | Banner
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('banner')) {

            if (
                $collection->banner &&
                File::exists(
                    $uploadPath . '/' . $collection->banner
                )
            ) {
                File::delete(
                    $uploadPath . '/' . $collection->banner
                );
            }

            $image = $request->file('banner');

            $name = time() . '_banner.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $name);

            $collection->banner = $name;
        }

        /*
        |--------------------------------------------------------------------------
        | Icon
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('icon')) {

            if (
                $collection->icon &&
                File::exists(
                    $uploadPath . '/' . $collection->icon
                )
            ) {
                File::delete(
                    $uploadPath . '/' . $collection->icon
                );
            }

            $image = $request->file('icon');

            $name = time() . '_icon.' .
                $image->getClientOriginalExtension();

            $image->move($uploadPath, $name);

            $collection->icon = $name;
        }

        $collection->save();

        return redirect()
            ->route('admin.collections.index')
            ->with('success', 'Collection updated successfully.');
    }

    /**
     * Delete collection.
     */
    public function destroy(Collection $collection)
    {
        $uploadPath = public_path('uploads/collections');

        foreach (['thumbnail', 'banner', 'icon'] as $file) {

            if (
                !empty($collection->$file) &&
                File::exists(
                    $uploadPath . '/' . $collection->$file
                )
            ) {
                File::delete(
                    $uploadPath . '/' . $collection->$file
                );
            }
        }

        $collection->delete();

        return redirect()
            ->route('admin.collections.index')
            ->with('success', 'Collection deleted successfully.');
    }

    /**
     * Frontend collections.
     */
    public function frontendIndex()
    {
        $collections = Collection::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view(
            'user.collections',
            compact('collections')
        );
    }

    /**
     * Frontend collection detail.
     */
    public function frontendShow(Collection $collection)
    {
        if ((int) $collection->status !== 1) {
            abort(404);
        }

        return view(
            'user.collections-detail',
            compact('collection')
        );
    }
}