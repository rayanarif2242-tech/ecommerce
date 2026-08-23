<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendSearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = trim($request->search ?? '');

        if ($keyword === '') {
            return response()->json([]);
        }

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        $products = Product::where('status', 1)
            ->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('description', 'LIKE', "%{$keyword}%");

            })
            ->take(8)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::where('status', 1)
            ->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('slug', 'LIKE', "%{$keyword}%");

            })
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Sub Categories
        |--------------------------------------------------------------------------
        */

        $subCategories = SubCategory::where('status', 1)
            ->where(function ($query) use ($keyword) {

                $query->where('name', 'LIKE', "%{$keyword}%")
                    ->orWhere('slug', 'LIKE', "%{$keyword}%");

            })
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Build Results
        |--------------------------------------------------------------------------
        */

        $results = collect();

        foreach ($products as $product) {

            $results->push([
                'type' => 'product',
                'name' => $product->name,
                'url' => route(
                    'product.show',
                    $product->slug
                ),
                'price' => $product->discount_price ?: $product->price,
                'image' => $product->image
                    ? asset('uploads/products/' . $product->image)
                    : null,
            ]);
        }

        foreach ($categories as $category) {

            $results->push([
                'type' => 'category',
                'name' => $category->name,
                'url' => route(
                    'category.show',
                    $category->slug
                ),
                'price' => null,
                'image' => $category->image
                    ? asset('uploads/categories/' . $category->image)
                    : null,
            ]);
        }

        foreach ($subCategories as $subCategory) {

            $results->push([
                'type' => 'subcategory',
                'name' => $subCategory->name,
                'url' => route(
                    'subcategory.show',
                    $subCategory->slug
                ),
                'price' => $subCategory->price,
                'image' => $subCategory->image
                    ? asset('uploads/subcategories/' . $subCategory->image)
                    : null,
            ]);
        }

        return response()->json(
            $results->values()
        );
    }
}