<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Blog;
use App\Models\Billboard;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

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

        // Billboards
        $billboards = Billboard::where('status', 1)
            ->where('featured', 1)
            ->where(function ($query) {
                $query->whereNull('start_date')
                    ->orWhereDate('start_date', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', now());
            })
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('user.index', compact(
            'categories',
            'subCategories',
            'products',
            'collections',
            'blogs',
            'billboards'
        ));
    }

    public function allProducts()
    {
        $products = Product::where('status', 1)
            ->latest()
            ->get();

        return view('user.products', compact('products'));
    }





    public function contact()
{
    return view('user.contact');
}

public function storeContact(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'phone'   => 'nullable|string|max:50',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    ContactMessage::create([
        'name'    => $request->name,
        'email'   => $request->email,
        'phone'   => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
        'status'  => 'New',
    ]);

    return redirect()
        ->route('contact')
        ->with('success', 'Your message has been sent successfully!');
}
}