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
                'url' => route('admin.dashboard'),
            ],

            [
                'name' => 'My Profile',
                'url' => route('admin.profile'),
            ],

            [
                'name' => 'Users',
                'url' => route('admin.users.index'),
            ],

            [
                'name' => 'Variety',
                'url' => route('admin.varieties.index'),
            ],

            [
                'name' => 'Categories',
                'url' => route('admin.category.index'),
            ],

            [
                'name' => 'Sub Categories',
                'url' => route('admin.subcategory.index'),
            ],

            [
                'name' => 'Products',
                'url' => route('admin.products.index'),
            ],

            [
                'name' => 'Billboards',
                'url' => route('admin.billboards.index'),
            ],

            [
                'name' => 'Collections',
                'url' => route('admin.collections.index'),
            ],

            [
                'name' => 'Blog',
                'url' => route('admin.blog.index'),
            ],

            [
                'name' => 'Signatures',
                'url' => route('admin.signature.index'),
            ],

            [
                'name' => 'Contact Messages',
                'url' => route('admin.contact-messages.index'),
            ],

            [
                'name' => 'FAQ Management',
                'url' => route('admin.faq.index'),
            ],

            [
                'name' => 'Orders',
                'url' => route('admin.orders.index'),
            ],

            [
                'name' => 'Newsletter Subscribers',
                'url' => route('admin.newsletter.index'),
            ],

        ];

        $keyword = trim($request->input('search', ''));

        if ($keyword === '') {
            return response()->json([]);
        }

        $keyword = strtolower($keyword);

        $results = collect($menus)
            ->filter(function ($item) use ($keyword) {

                return str_contains(
                    strtolower($item['name']),
                    $keyword
                );

            })
            ->values()
            ->toArray();

        return response()->json($results);
    }
}