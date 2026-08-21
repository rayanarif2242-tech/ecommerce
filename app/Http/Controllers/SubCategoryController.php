<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $subcategories = SubCategory::with('category')->latest()->get();

    return view('admin.subcategory.index', compact('subcategories'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $categories = Category::all();

    

    return view('admin.subcategory.create', compact('categories'));
}
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|unique:sub_categories,name',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Upload Image
    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = time() . '_' . $request->image->getClientOriginalName();

        $request->image->move(public_path('uploads/subcategories'), $imageName);
    }

    // Upload Banner
    $bannerName = null;

    if ($request->hasFile('banner')) {

        $bannerName = time() . '_banner_' . $request->banner->getClientOriginalName();

        $request->banner->move(public_path('uploads/subcategories'), $bannerName);
    }

    SubCategory::create([

        'subcategory_id' => Str::uuid(),

        'category_id' => $request->category_id,

        'name' => $request->name,

        'slug' => Str::slug($request->name),

        'description' => $request->description,

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

    return redirect()->route('admin.subcategory.index')
        ->with('success', 'Sub Category Added Successfully.');
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

    return view('admin.subcategory.edit', compact('subcategory', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, SubCategory $subcategory)
{
    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);


    $data = [

        'category_id' => $request->category_id,

        'name' => $request->name,

        'slug' => Str::slug($request->name),

        'description' => $request->description,

        'icon' => $request->icon,

        'featured' => $request->featured ?? 0,

        'show_on_home' => $request->show_on_home ?? 0,

        'status' => $request->status ?? 1,

        'sort_order' => $request->sort_order ?? 0,

        'meta_title' => $request->meta_title,

        'meta_description' => $request->meta_description,

    ];



    if($request->hasFile('image')){

        $imageName = time().'_'.$request->image->getClientOriginalName();

        $request->image->move(
            public_path('uploads/subcategories'),
            $imageName
        );

        $data['image'] = $imageName;

    }



    if($request->hasFile('banner')){

        $bannerName = time().'_banner_'.$request->banner->getClientOriginalName();

        $request->banner->move(
            public_path('uploads/subcategories'),
            $bannerName
        );

        $data['banner'] = $bannerName;

    }



    $subcategory->update($data);



    return redirect()
        ->route('admin.subcategory.index')
        ->with('success','Sub Category Updated Successfully');

}
   
        
    /**
     * Remove the specified resource from storage.
     */
public function destroy(SubCategory $subcategory)
{

    if ($subcategory->image &&
        file_exists(public_path('uploads/subcategories/'.$subcategory->image))) {

        unlink(public_path('uploads/subcategories/'.$subcategory->image));

    }


    if ($subcategory->banner &&
        file_exists(public_path('uploads/subcategories/'.$subcategory->banner))) {

        unlink(public_path('uploads/subcategories/'.$subcategory->banner));

    }


    $subcategory->delete();


    return redirect()
        ->route('admin.subcategory.index')
        ->with('success','Sub Category Deleted Successfully');

}
public function frontendShow($slug)
{
    $subCategory = SubCategory::where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

    $products = Product::where('status', 1)
        ->where('subcategory_id', $subCategory->id)
        ->latest()
        ->get();

    return view('user.subcategory', compact(
        'subCategory',
        'products'
    ));
}
}
