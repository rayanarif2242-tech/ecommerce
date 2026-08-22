<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display Product List
     */
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->search, function ($query) use ($request) {

                $query->where(function ($q) use ($request) {

                    $q->where('product_id', 'like', '%' . $request->search . '%')
                        ->orWhere('name', 'like', '%' . $request->search . '%')
                        ->orWhereHas('category', function ($categoryQuery) use ($request) {
                            $categoryQuery->where(
                                'name',
                                'like',
                                '%' . $request->search . '%'
                            );
                        });

                });

            })
            ->latest()
            ->get();

        return view('admin.product.index', compact('products'));
    }


    /**
     * Show Create Product Form
     */
    public function create()
    {
        $categories = Category::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.product.create', compact('categories'));
    }


    /**
     * Store Product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'home' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'sort' => 'nullable|integer',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Upload Product Image
        |--------------------------------------------------------------------------
        */

        $image = null;

        if ($request->hasFile('image')) {

            $image = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/products'),
                $image
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'image' => $image,
            'description' => $request->description,
            'featured' => $request->featured ?? 0,
            'home' => $request->home ?? 0,
            'status' => $request->status ?? 1,
            'sort' => $request->sort ?? 0,
        ]);


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Created Successfully');
    }


    /**
     * Display Single Product
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }


    /**
     * Show Edit Product Form
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 1)
            ->orderBy('name', 'asc')
            ->get();

        return view(
            'admin.product.edit',
            compact('product', 'categories')
        );
    }


    /**
     * Update Product
     */
    public function update(Request $request, Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
            'featured' => 'nullable|boolean',
            'home' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'sort' => 'nullable|integer',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Keep Existing Image
        |--------------------------------------------------------------------------
        */

        $image = $product->image;


        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $product->image &&
                file_exists(
                    public_path('uploads/products/' . $product->image)
                )
            ) {
                unlink(
                    public_path('uploads/products/' . $product->image)
                );
            }


            // Generate new image name
            $image = time() . '.' . $request->image->extension();


            // Move new image
            $request->image->move(
                public_path('uploads/products'),
                $image
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Product
        |--------------------------------------------------------------------------
        */

        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'image' => $image,
            'description' => $request->description,
            'featured' => $request->featured ?? 0,
            'home' => $request->home ?? 0,
            'status' => $request->status ?? 1,
            'sort' => $request->sort ?? 0,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Updated Successfully');
    }


    /**
     * Delete Product
     */
    public function destroy(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Product Image
        |--------------------------------------------------------------------------
        */

        if (
            $product->image &&
            file_exists(
                public_path('uploads/products/' . $product->image)
            )
        ) {
            unlink(
                public_path('uploads/products/' . $product->image)
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Product
        |--------------------------------------------------------------------------
        */

        $product->delete();


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Deleted Successfully');
    }


    /**
     * Frontend Product Detail
     */
   /**
 * Frontend Product Listing
 */
public function frontendIndex()
{
    $products = Product::with('category')
        ->where('status', 1)
        ->latest()
        ->get();

    return view('user.products', compact('products'));
}


/**
 * Frontend Product Detail
 */
public function frontendShow($slug)
{
    $product = Product::where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

    return view(
        'user.product-detail',
        compact('product')
    );
}
}