<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)
            ->firstOrFail();

        $cart = session()->get('cart', []);

        if (isset($cart[$product->product_id])) {

            $cart[$product->product_id]['quantity']++;

        } else {

            $cart[$product->product_id] = [
                'product_id' => $product->product_id,
                'name' => $product->name,
                'price' => $product->discount_price ?: $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];

        }

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }
}