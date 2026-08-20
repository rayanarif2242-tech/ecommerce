<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
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

        return view('admin.collections.index', compact('collections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.collections.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'description' => 'nullable',

            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'banner' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'sort_order' => 'nullable|integer',

        ]);

        $collection = new Collection();

        $collection->name = $request->name;
        $collection->description = $request->description;
        $collection->featured = $request->featured ?? 0;
        $collection->show_home = $request->show_home ?? 0;
        $collection->status = $request->status ?? 1;
        $collection->sort_order = $request->sort_order ?? 0;
        $collection->seo_title = $request->seo_title;
        $collection->seo_keywords = $request->seo_keywords;
        $collection->seo_description = $request->seo_description;

        // Thumbnail
        if ($request->hasFile('thumbnail')) {

            $image = $request->file('thumbnail');

            $name = time().'_thumb.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/collections'), $name);

            $collection->thumbnail = $name;
        }

        // Banner
        if ($request->hasFile('banner')) {

            $image = $request->file('banner');

            $name = time().'_banner.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/collections'), $name);

            $collection->banner = $name;
        }

        // Icon
        if ($request->hasFile('icon')) {

            $image = $request->file('icon');

            $name = time().'_icon.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/collections'), $name);

            $collection->icon = $name;
        }

        $collection->save();

        return redirect()
            ->route('admin.collections.index')
            ->with('success', 'Collection created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        return view('admin.collections.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        return view('admin.collections.edit', compact('collection'));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([

            'name' => 'required|max:255',

            'description' => 'nullable',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'icon' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',

            'sort_order' => 'nullable|integer',

        ]);

        $collection->name = $request->name;
        $collection->description = $request->description;
        $collection->featured = $request->featured ?? 0;
        $collection->show_home = $request->show_home ?? 0;
        $collection->status = $request->status ?? 1;
        $collection->sort_order = $request->sort_order ?? 0;
        $collection->seo_title = $request->seo_title;
        $collection->seo_keywords = $request->seo_keywords;
        $collection->seo_description = $request->seo_description;

        // Thumbnail
        if ($request->hasFile('thumbnail')) {

            if ($collection->thumbnail && File::exists(public_path('uploads/collections/'.$collection->thumbnail))) {
                File::delete(public_path('uploads/collections/'.$collection->thumbnail));
            }

            $image = $request->file('thumbnail');

            $name = time().'_thumb.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/collections'), $name);

            $collection->thumbnail = $name;
        }

        // Banner
        if ($request->hasFile('banner')) {

            if ($collection->banner && File::exists(public_path('uploads/collections/'.$collection->banner))) {
                File::delete(public_path('uploads/collections/'.$collection->banner));
            }

            $image = $request->file('banner');

            $name = time().'_banner.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/collections'), $name);

            $collection->banner = $name;
        }

        // Icon
        if ($request->hasFile('icon')) {

            if ($collection->icon && File::exists(public_path('uploads/collections/'.$collection->icon))) {
                File::delete(public_path('uploads/collections/'.$collection->icon));
            }

            $image = $request->file('icon');

            $name = time().'_icon.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/collections'), $name);

            $collection->icon = $name;
        }

        $collection->save();

        return redirect()
            ->route('admin.collections.index')
            ->with('success', 'Collection updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Collection $collection)
    {
        foreach (['thumbnail', 'banner', 'icon'] as $file) {

            if ($collection->$file &&
                File::exists(public_path('uploads/collections/'.$collection->$file))) {

                File::delete(public_path('uploads/collections/'.$collection->$file));
            }
        }

        $collection->delete();

        return redirect()
            ->route('admin.collections.index')
            ->with('success', 'Collection deleted successfully.');
    }
    public function frontendIndex()
{
    $collections = \App\Models\Collection::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->get();

    return view('user.collections', compact('collections'));
}
}