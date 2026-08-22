<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Signature;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Add Product To Cart
    |--------------------------------------------------------------------------
    */

    public function addProduct(Request $request)
    {
        $product = Product::where(
            'product_id',
            $request->product_id
        )->firstOrFail();

        $cart = session()->get('cart', []);

        $id = 'product_' . $product->product_id;

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

           $cart[$id] = [
    'type'     => 'product',
    'id'       => $product->product_id,
    'name'     => $product->name,
    'price'    => $product->discount_price ?: $product->price,
    'image'    => 'uploads/products/' . $product->image,
    'quantity' => 1,
];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with('success', 'Product added to cart!');
    }


    /*
    |--------------------------------------------------------------------------
    | Add Signature To Cart
    |--------------------------------------------------------------------------
    */

    public function addSignature(Request $request)
    {
        $signature = Signature::where(
            'signature_id',
            $request->signature_id
        )->firstOrFail();

        $cart = session()->get('cart', []);

        $id = 'signature_' . $signature->signature_id;

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'type'     => 'signature',
                'id'       => $signature->signature_id,
                'name'     => $signature->product_name,
                'price'    => $signature->discount_price ?: $signature->price,
                'image'    => $signature->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with('success', 'Signature added to cart!');
    }


    /*
    |--------------------------------------------------------------------------
    | Add SubCategory To Cart
    |--------------------------------------------------------------------------
    */

   public function addSubCategory(Request $request)
{
    $subCategory = SubCategory::where(
        'subcategory_id',
        $request->subcategory_id
    )->firstOrFail();

    $cart = session()->get('cart', []);

    $id = 'subcategory_' . $subCategory->subcategory_id;

    if (isset($cart[$id])) {

        $cart[$id]['quantity']++;

    } else {

        $cart[$id] = [
            'type'     => 'subcategory',
            'id'       => $subCategory->subcategory_id,
            'name'     => $subCategory->name,
            'price'    => $subCategory->price,
            'image'    => 'uploads/subcategories/' . $subCategory->image,
            'quantity' => 1,
        ];
    }

    session()->put('cart', $cart);

    return redirect()
        ->route('cart.show')
        ->with('success', 'Subcategory added to cart!');
}
    /*
    |--------------------------------------------------------------------------
    | Show Cart
    |--------------------------------------------------------------------------
    */

    public function show()
    {
        $cart = session()->get('cart', []);

        return view('user.cart', compact('cart'));
    }


    /*
    |--------------------------------------------------------------------------
    | Increase Quantity
    |--------------------------------------------------------------------------
    */

    public function increase($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show');
    }


    /*
    |--------------------------------------------------------------------------
    | Decrease Quantity
    |--------------------------------------------------------------------------
    */

    public function decrease($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            if ($cart[$id]['quantity'] > 1) {

                $cart[$id]['quantity']--;

            } else {

                unset($cart[$id]);

            }
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show');
    }


    /*
    |--------------------------------------------------------------------------
    | Remove Item From Cart
    |--------------------------------------------------------------------------
    */

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {

            unset($cart[$id]);

        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with('success', 'Item removed from cart.');
    }


    /*
    |--------------------------------------------------------------------------
    | Clear Cart
    |--------------------------------------------------------------------------
    */

    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart.show')
            ->with('success', 'Cart cleared successfully.');
    }
}