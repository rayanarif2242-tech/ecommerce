<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CollectionController extends Controller
{
    /**
     * Display a listing of collections.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $collections = Collection::when($search, function ($query) use ($search) {

            $query->where('collection_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('slug', 'LIKE', "%{$search}%");

        })
        ->latest()
        ->paginate(10);

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

            'name' => 'required|max:255',

            'price' => 'required|numeric|min:0',

            'description' => 'nullable',

            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'sort_order' => 'nullable|integer',

        ]);

        $collection = new Collection();

        $collection->product_id = $request->product_id;
        $collection->name = $request->name;

        // Collection price
        $collection->price = $request->price;

        $collection->description = $request->description;

        $collection->featured = $request->featured ?? 0;
        $collection->show_home = $request->show_home ?? 0;
        $collection->status = $request->status ?? 1;
        $collection->sort_order = $request->sort_order ?? 0;

        $collection->seo_title = $request->seo_title;
        $collection->seo_keywords = $request->seo_keywords;
        $collection->seo_description = $request->seo_description;

        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');

            $name = time() . '_thumb.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/collections'),
                $name
            );

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

            $image->move(
                public_path('uploads/collections'),
                $name
            );

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

            $image->move(
                public_path('uploads/collections'),
                $name
            );

            $collection->icon = $name;
        }

        // Save collection
        $collection->save();

        return redirect()
            ->route('admin.collections.index')
            ->with(
                'success',
                'Collection created successfully.'
            );
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
    public function update(
        Request $request,
        Collection $collection
    ) {
        $request->validate([

            'product_id' => 'required|exists:products,product_id',

            'name' => 'required|max:255',

            'price' => 'required|numeric|min:0',

            'description' => 'nullable',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'sort_order' => 'nullable|integer',

        ]);

        $collection->product_id = $request->product_id;
        $collection->name = $request->name;

        // Collection price
        $collection->price = $request->price;

        $collection->description = $request->description;

        $collection->featured = $request->featured ?? 0;
        $collection->show_home = $request->show_home ?? 0;
        $collection->status = $request->status ?? 1;
        $collection->sort_order = $request->sort_order ?? 0;

        $collection->seo_title = $request->seo_title;
        $collection->seo_keywords = $request->seo_keywords;
        $collection->seo_description = $request->seo_description;

        /*
        |--------------------------------------------------------------------------
        | Thumbnail
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('thumbnail')) {

            if (
                $collection->thumbnail &&
                File::exists(
                    public_path(
                        'uploads/collections/' .
                        $collection->thumbnail
                    )
                )
            ) {
                File::delete(
                    public_path(
                        'uploads/collections/' .
                        $collection->thumbnail
                    )
                );
            }

            $image = $request->file('thumbnail');

            $name = time() . '_thumb.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/collections'),
                $name
            );

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
                    public_path(
                        'uploads/collections/' .
                        $collection->banner
                    )
                )
            ) {
                File::delete(
                    public_path(
                        'uploads/collections/' .
                        $collection->banner
                    )
                );
            }

            $image = $request->file('banner');

            $name = time() . '_banner.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/collections'),
                $name
            );

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
                    public_path(
                        'uploads/collections/' .
                        $collection->icon
                    )
                )
            ) {
                File::delete(
                    public_path(
                        'uploads/collections/' .
                        $collection->icon
                    )
                );
            }

            $image = $request->file('icon');

            $name = time() . '_icon.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/collections'),
                $name
            );

            $collection->icon = $name;
        }

        // Save updated collection
        $collection->save();

        return redirect()
            ->route('admin.collections.index')
            ->with(
                'success',
                'Collection updated successfully.'
            );
    }

    /**
     * Delete collection.
     */
    public function destroy(Collection $collection)
    {
        foreach (['thumbnail', 'banner', 'icon'] as $file) {

            if (
                $collection->$file &&
                File::exists(
                    public_path(
                        'uploads/collections/' .
                        $collection->$file
                    )
                )
            ) {
                File::delete(
                    public_path(
                        'uploads/collections/' .
                        $collection->$file
                    )
                );
            }
        }

        $collection->delete();

        return redirect()
            ->route('admin.collections.index')
            ->with(
                'success',
                'Collection deleted successfully.'
            );
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
        if ($collection->status != 1) {
            abort(404);
        }

        return view(
            'user.collections-detail',
            compact('collection')
        );
    }
}