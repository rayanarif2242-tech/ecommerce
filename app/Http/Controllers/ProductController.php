<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display Product List
     */
    public function index(Request $request)
    {
        $products = Product::when($request->search, function ($query) use ($request) {

            $query->where(function ($q) use ($request) {

                $q->where('product_id', 'like', '%' . $request->search . '%')
                  ->orWhere('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');

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

        ]);


        $image = null;


        if ($request->hasFile('image')) {

            $image = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/products'),
                $image
            );
        }


        Product::create([

            'product_id' => (string) Str::uuid(),

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

        ]);


        $image = $product->image;


        if ($request->hasFile('image')) {

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


            $image = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/products'),
                $image
            );
        }


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

        ]);


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Updated Successfully');
    }


    /**
     * Delete Product
     */
    public function destroy(Product $product)
    {
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


        $product->delete();


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Deleted Successfully');
    }
}