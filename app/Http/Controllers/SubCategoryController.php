<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $subCategories = SubCategory::with('category')
            ->latest()
            ->get();

        return view('admin.subcategory.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Keep your existing admin store logic here
    }

    public function edit($subcategory_id)
    {
        // Keep your existing admin edit logic here
    }

    public function update(Request $request, $subcategory_id)
    {
        // Keep your existing admin update logic here
    }

    public function destroy($subcategory_id)
    {
        // Keep your existing admin delete logic here
    }


    /*
    |--------------------------------------------------------------------------
    | FRONTEND
    |--------------------------------------------------------------------------
    */

    public function frontendShow($slug)
    {
        // Find the subcategory
        $subCategory = SubCategory::where('slug', $slug)
            ->firstOrFail();

        // Get products belonging to this subcategory
        $products = Product::where(
                'subcategory_id',
                $subCategory->subcategory_id
            )
            ->where('status', 1)
            ->latest()
            ->get();

        // Get categories for the Shop dropdown in navbar
        $categories = Category::with('subCategories')
            ->orderBy('sort_order', 'asc')
            ->get();

        // Send everything to the Blade file
        return view(
            'user.subcategory-detail',
            compact(
                'subCategory',
                'products',
                'categories'
            )
        );
    }
}