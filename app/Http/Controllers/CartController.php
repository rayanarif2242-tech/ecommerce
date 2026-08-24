<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Signature;
use App\Models\SubCategory;
use App\Models\Collection;
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
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required|integer|min:1',
        ]);

        // Find product
        $product = Product::where('product_id', $request->product_id)
            ->where('status', 1)
            ->firstOrFail();

        // Check stock
        if ($product->stock <= 0) {
            return back()->with(
                'error',
                'This product is currently out of stock.'
            );
        }

        // Quantity selected in product page
        $quantity = (int) $request->quantity;

        // Selected quantity cannot exceed stock
        if ($quantity > $product->stock) {
            return back()->with(
                'error',
                'Only ' . $product->stock . ' item(s) are available in stock.'
            );
        }

        // Get existing cart
        $cart = session()->get('cart', []);

        // Unique cart ID
        $id = 'product_' . $product->product_id;

        /*
        |--------------------------------------------------------------------------
        | Product Already In Cart
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$id])) {

            // Add selected quantity to existing quantity
            $newQuantity = $cart[$id]['quantity'] + $quantity;

            // Check total quantity against stock
            if ($newQuantity > $product->stock) {
                return back()->with(
                    'error',
                    'Only ' . $product->stock . ' item(s) are available in stock.'
                );
            }

            $cart[$id]['quantity'] = $newQuantity;

        } else {

            /*
            |--------------------------------------------------------------------------
            | New Product
            |--------------------------------------------------------------------------
            */

            $cart[$id] = [
                'type'     => 'product',
                'id'       => $product->product_id,
                'name'     => $product->name,
                'price'    => $product->discount_price ?: $product->price,
                'image'    => 'uploads/products/' . $product->image,
                'quantity' => $quantity,
            ];
        }

        // Save cart
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
        $request->validate([
            'signature_id' => 'required',
        ]);

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
        $request->validate([
            'subcategory_id' => 'required',
        ]);

        // Find subcategory
        $subCategory = SubCategory::where(
            'subcategory_id',
            $request->subcategory_id
        )->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Check SubCategory Stock
        |--------------------------------------------------------------------------
        */

        if ((int) $subCategory->stock <= 0) {
            return back()->with(
                'error',
                'This subcategory is currently out of stock.'
            );
        }

        // Get existing cart
        $cart = session()->get('cart', []);

        // Unique cart ID
        $id = 'subcategory_' . $subCategory->subcategory_id;

        /*
        |--------------------------------------------------------------------------
        | SubCategory Already In Cart
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$id])) {

            // Add one more
            $newQuantity = $cart[$id]['quantity'] + 1;

            // Don't allow quantity above stock
            if ($newQuantity > (int) $subCategory->stock) {
                return back()->with(
                    'error',
                    'Only ' . $subCategory->stock .
                    ' item(s) are available in stock.'
                );
            }

            $cart[$id]['quantity'] = $newQuantity;

        } else {

            /*
            |--------------------------------------------------------------------------
            | New SubCategory
            |--------------------------------------------------------------------------
            */

            $cart[$id] = [
                'type'     => 'subcategory',
                'id'       => $subCategory->subcategory_id,
                'name'     => $subCategory->name,
                'price'    => $subCategory->discount_price
                                ?: $subCategory->price,
                'image'    => $subCategory->image
                                ? 'uploads/subcategories/' . $subCategory->image
                                : null,
                'quantity' => 1,
            ];
        }

        // Save cart
        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with('success', 'Subcategory added to cart!');
    }


    /*
    |--------------------------------------------------------------------------
    | Add Collection To Cart
    |--------------------------------------------------------------------------
    */

    public function addCollection(Request $request)
    {
        $request->validate([
            'collection_id' => 'required',
        ]);

        $collection = Collection::where(
            'collection_id',
            $request->collection_id
        )->firstOrFail();

        $cart = session()->get('cart', []);

        $id = 'collection_' . $collection->collection_id;

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'type'     => 'collection',
                'id'       => $collection->collection_id,
                'name'     => $collection->name,
                'price'    => (float) $collection->price,
                'image'    => 'uploads/collections/' . $collection->thumbnail,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with('success', 'Collection added to cart!');
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

        // Cart item does not exist
        if (!isset($cart[$id])) {
            return redirect()->route('cart.show');
        }

        /*
        |--------------------------------------------------------------------------
        | Product Stock Check
        |--------------------------------------------------------------------------
        */

        if (($cart[$id]['type'] ?? '') === 'product') {

            $product = Product::where(
                'product_id',
                $cart[$id]['id']
            )->first();

            // Product no longer exists
            if (!$product) {

                unset($cart[$id]);

                session()->put('cart', $cart);

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This product is no longer available.'
                    );
            }

            // Product out of stock
            if ($product->stock <= 0) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This product is currently out of stock.'
                    );
            }

            // Maximum stock reached
            if ($cart[$id]['quantity'] >= $product->stock) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'Only ' . $product->stock .
                        ' item(s) are available in stock.'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | SubCategory Stock Check
        |--------------------------------------------------------------------------
        */

        if (($cart[$id]['type'] ?? '') === 'subcategory') {

            $subCategory = SubCategory::where(
                'subcategory_id',
                $cart[$id]['id']
            )->first();

            // SubCategory no longer exists
            if (!$subCategory) {

                unset($cart[$id]);

                session()->put('cart', $cart);

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This subcategory is no longer available.'
                    );
            }

            // SubCategory out of stock
            if ((int) $subCategory->stock <= 0) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This subcategory is currently out of stock.'
                    );
            }

            // Maximum stock reached
            if ($cart[$id]['quantity'] >= (int) $subCategory->stock) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'Only ' . $subCategory->stock .
                        ' item(s) are available in stock.'
                    );
            }
        }


        // Increase quantity
        $cart[$id]['quantity']++;

        // Save cart
        session()->put('cart', $cart);

        return redirect()->route('cart.show');
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

        return redirect()->route('cart.show');
    }


    /*
    |--------------------------------------------------------------------------
    | Remove Item
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