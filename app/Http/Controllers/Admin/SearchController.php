<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
       $menus = [

    [
        'name' => 'Dashboard',
        'url' => route('admin.dashboard')
    ],

    [
        'name' => 'My Profile',
        'url' => route('admin.profile')
    ],

    [
        'name' => 'Users',
        'url' => route('users.index')
    ],

    [
        'name' => 'Variety',
        'url' => route('variety.index')
    ],

    [
        'name' => 'Categories',
        'url' => route('category.index')
    ],

    [
        'name' => 'Sub Categories',
        'url' => route('subcategory.index')
    ],

    [
        'name' => 'Products',
        'url' => route('products.index')
    ],

    [
        'name' => 'Billboards',
        'url' => route('billboards.index')
    ],

    [
        'name' => 'Collections',
        'url' => route('collections.index')
    ],

    [
        'name' => 'Features',
        'url' => route('features.index')
    ],

    [
        'name' => 'Testimonials',
        'url' => route('testimonial.index')
    ],

    [
        'name' => 'Blog',
        'url' => route('blog.index')
    ],
     [
        'name' => 'Contact Messages',
        'url' => route('contact-messages.index')
    ],
    [
    'name' => 'FAQ Management',
    'url' => route('faq.index')
],
    

];
        

        $keyword = strtolower($request->search);

        $result = collect($menus)->filter(function($item) use ($keyword){

            return str_contains(strtolower($item['name']),$keyword);

        })->values();

        return response()->json($result);
    }
}