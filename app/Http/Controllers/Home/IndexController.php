<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Blog;

class IndexController extends Controller
{
    public function index()
    {
        // Categories
        $categories = Category::where('status', 1)
            ->where('show_on_home', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Sub Categories
        $subCategories = SubCategory::where('status', 1)
            ->where('show_on_home', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Products
        $products = Product::where('status', 1)
            ->where('home', 1)
            ->latest()
            ->get();

        // Collections
        $collections = Collection::where('status', 1)
            ->where('show_home', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Blogs
        $blogs = Blog::where('status', 1)
            ->where('show_on_home', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('user.index', compact(
            'categories',
            'subCategories',
            'products',
            'collections',
            'blogs'
        ));
    }
}