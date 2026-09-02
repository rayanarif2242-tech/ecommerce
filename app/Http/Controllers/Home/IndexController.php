<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Variety;
use App\Models\Blog;
use App\Models\Signature;
use App\Models\ContactMessage;
use App\Models\Billboard;
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

        // Varieties
        $varieties = Variety::where('status', 'active')
            ->orderBy('sort_order', 'asc')
            ->get();

        // Billboards
        // Do NOT use where('status', 1)
        $billboards = Billboard::latest()->get();

        // Blogs
        $blogs = Blog::where('status', 1)
            ->where('show_on_home', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Signatures
        $signatures = Signature::where('status', 'Active')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('user.index', compact(
            'categories',
            'subCategories',
            'products',
            'collections',
            'varieties',
            'billboards',
            'blogs',
            'signatures'
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

    public function showVariety(Variety $variety)
{
    $variety->load('product');

    return view('user.variety-detail', compact('variety'));
}
}

