<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')
            ->latest()
            ->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view(
            'admin.subcategory.create',
            compact('categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required|exists:categories,id',

            'name' => 'required|unique:sub_categories,name',

            'price' => 'required|numeric|min:0',

            'discount_price' => 'nullable|numeric|min:0|lte:price',

            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '_' .
                $request->image->getClientOriginalName();

            $request->image->move(
                public_path('uploads/subcategories'),
                $imageName
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Banner
        |--------------------------------------------------------------------------
        */

        $bannerName = null;

        if ($request->hasFile('banner')) {

            $bannerName = time() . '_banner_' .
                $request->banner->getClientOriginalName();

            $request->banner->move(
                public_path('uploads/subcategories'),
                $bannerName
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Create Sub Category
        |--------------------------------------------------------------------------
        */

        SubCategory::create([

            'subcategory_id' => Str::uuid(),

            'category_id' => $request->category_id,

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'description' => $request->description,

            'price' => $request->price,

            'discount_price' => $request->discount_price,

            'image' => $imageName,

            'banner' => $bannerName,

            'icon' => $request->icon,

            'featured' => $request->featured ?? 0,

            'show_on_home' => $request->show_on_home ?? 0,

            'status' => $request->status ?? 1,

            'sort_order' => $request->sort_order ?? 0,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,
        ]);

        return redirect()
            ->route('admin.subcategory.index')
            ->with(
                'success',
                'Sub Category Added Successfully.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();

        return view(
            'admin.subcategory.edit',
            compact('subcategory', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        SubCategory $subcategory
    ) {
        $request->validate([

            'category_id' => 'required|exists:categories,id',

            'name' => 'required',

            'price' => 'required|numeric|min:0',

            'discount_price' => 'nullable|numeric|min:0|lte:price',

            'description' => 'nullable|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Data
        |--------------------------------------------------------------------------
        */

        $data = [

            'category_id' => $request->category_id,

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'description' => $request->description,

            'price' => $request->price,

            'discount_price' => $request->discount_price,

            'icon' => $request->icon,

            'featured' => $request->featured ?? 0,

            'show_on_home' => $request->show_on_home ?? 0,

            'status' => $request->status ?? 1,

            'sort_order' => $request->sort_order ?? 0,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,
        ];

        /*
        |--------------------------------------------------------------------------
        | Update Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $subcategory->image &&
                file_exists(
                    public_path(
                        'uploads/subcategories/' .
                        $subcategory->image
                    )
                )
            ) {
                unlink(
                    public_path(
                        'uploads/subcategories/' .
                        $subcategory->image
                    )
                );
            }

            $imageName = time() . '_' .
                $request->image->getClientOriginalName();

            $request->image->move(
                public_path('uploads/subcategories'),
                $imageName
            );

            $data['image'] = $imageName;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Banner
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('banner')) {

            // Delete old banner
            if (
                $subcategory->banner &&
                file_exists(
                    public_path(
                        'uploads/subcategories/' .
                        $subcategory->banner
                    )
                )
            ) {
                unlink(
                    public_path(
                        'uploads/subcategories/' .
                        $subcategory->banner
                    )
                );
            }

            $bannerName = time() . '_banner_' .
                $request->banner->getClientOriginalName();

            $request->banner->move(
                public_path('uploads/subcategories'),
                $bannerName
            );

            $data['banner'] = $bannerName;
        }

        /*
        |--------------------------------------------------------------------------
        | Save Update
        |--------------------------------------------------------------------------
        */

        $subcategory->update($data);

        return redirect()
            ->route('admin.subcategory.index')
            ->with(
                'success',
                'Sub Category Updated Successfully'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $subcategory->image &&
            file_exists(
                public_path(
                    'uploads/subcategories/' .
                    $subcategory->image
                )
            )
        ) {
            unlink(
                public_path(
                    'uploads/subcategories/' .
                    $subcategory->image
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Banner
        |--------------------------------------------------------------------------
        */

        if (
            $subcategory->banner &&
            file_exists(
                public_path(
                    'uploads/subcategories/' .
                    $subcategory->banner
                )
            )
        ) {
            unlink(
                public_path(
                    'uploads/subcategories/' .
                    $subcategory->banner
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Sub Category
        |--------------------------------------------------------------------------
        */

        $subcategory->delete();

        return redirect()
            ->route('admin.subcategory.index')
            ->with(
                'success',
                'Sub Category Deleted Successfully'
            );
    }

    /**
     * Frontend Sub Category Detail
     */
    public function frontendShow($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view(
            'user.subcategory-detail',
            compact('subCategory')
        );
    }
}