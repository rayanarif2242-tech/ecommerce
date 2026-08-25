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

        $product = Product::where('product_id', $request->product_id)
            ->where('status', 1)
            ->firstOrFail();

        $quantity = (int) $request->quantity;

        if ((int) $product->stock <= 0) {
            return back()->with(
                'error',
                'This product is currently out of stock.'
            );
        }

        if ($quantity > (int) $product->stock) {
            return back()->with(
                'error',
                'Only ' . $product->stock . ' item(s) are available in stock.'
            );
        }

        $cart = session()->get('cart', []);

        $id = 'product_' . $product->product_id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'type'     => 'product',
                'id'       => $product->product_id,
                'name'     => $product->name,
                'price'    => $product->discount_price ?: $product->price,
                'image'    => $product->image
                    ? 'uploads/products/' . $product->image
                    : null,
                'quantity' => $quantity,
            ];
        }

        $product->decrement('stock', $quantity);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                $quantity . ' product item(s) added to cart!'
            );
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
            'quantity'     => 'required|integer|min:1',
        ]);

        $signature = Signature::where(
            'signature_id',
            $request->signature_id
        )->firstOrFail();

        $quantity = (int) $request->quantity;

        if ((int) $signature->stock <= 0) {
            return back()->with(
                'error',
                'This signature is currently out of stock.'
            );
        }

        if ($quantity > (int) $signature->stock) {
            return back()->with(
                'error',
                'Only ' . $signature->stock . ' item(s) are available in stock.'
            );
        }

        $cart = session()->get('cart', []);

        $id = 'signature_' . $signature->signature_id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'type'     => 'signature',
                'id'       => $signature->signature_id,
                'name'     => $signature->product_name,
                'price'    => $signature->discount_price ?: $signature->price,
                'image'    => $signature->image,
                'quantity' => $quantity,
            ];
        }

        $signature->decrement('stock', $quantity);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                $quantity . ' signature item(s) added to cart!'
            );
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
            'quantity'       => 'required|integer|min:1',
        ]);

        $subCategory = SubCategory::where(
            'subcategory_id',
            $request->subcategory_id
        )->firstOrFail();

        $quantity = (int) $request->quantity;

        if ((int) $subCategory->stock <= 0) {
            return back()->with(
                'error',
                'This subcategory is currently out of stock.'
            );
        }

        if ($quantity > (int) $subCategory->stock) {
            return back()->with(
                'error',
                'Only ' . $subCategory->stock . ' item(s) are available in stock.'
            );
        }

        $cart = session()->get('cart', []);

        $id = 'subcategory_' . $subCategory->subcategory_id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'type'     => 'subcategory',
                'id'       => $subCategory->subcategory_id,
                'name'     => $subCategory->name,
                'price'    => $subCategory->discount_price
                    ?: $subCategory->price,
                'image'    => $subCategory->image
                    ? 'uploads/subcategories/' . $subCategory->image
                    : null,
                'quantity' => $quantity,
            ];
        }

        $subCategory->decrement('stock', $quantity);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                $quantity . ' subcategory item(s) added to cart!'
            );
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
            'quantity'      => 'required|integer|min:1',
        ]);

        $collection = Collection::where(
            'collection_id',
            $request->collection_id
        )->firstOrFail();

        $quantity = (int) $request->quantity;

        /*
        |--------------------------------------------------------------------------
        | Check Collection Stock
        |--------------------------------------------------------------------------
        */

        if ((int) $collection->stock <= 0) {
            return back()->with(
                'error',
                'This collection is currently out of stock.'
            );
        }

        if ($quantity > (int) $collection->stock) {
            return back()->with(
                'error',
                'Only ' . $collection->stock . ' item(s) are available in stock.'
            );
        }

        $cart = session()->get('cart', []);

        $id = 'collection_' . $collection->collection_id;

        /*
        |--------------------------------------------------------------------------
        | Existing Collection
        |--------------------------------------------------------------------------
        */

        if (isset($cart[$id])) {

            $cart[$id]['quantity'] += $quantity;

        } else {

            $cart[$id] = [
                'type'     => 'collection',
                'id'       => $collection->collection_id,
                'name'     => $collection->name,
                'price'    => (float) $collection->price,
                'image'    => $collection->thumbnail
                    ? 'uploads/collections/' . $collection->thumbnail
                    : null,
                'quantity' => $quantity,
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Reduce Collection Stock
        |--------------------------------------------------------------------------
        */

        $collection->decrement('stock', $quantity);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                $quantity . ' collection item(s) added to cart!'
            );
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

        if (!isset($cart[$id])) {
            return redirect()->route('cart.show');
        }

        $item = $cart[$id];

        /*
        |--------------------------------------------------------------------------
        | Product
        |--------------------------------------------------------------------------
        */

        if ($item['type'] === 'product') {

            $product = Product::where(
                'product_id',
                $item['id']
            )->first();

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

            if ((int) $product->stock <= 0) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This product is currently out of stock.'
                    );
            }

            $product->decrement('stock', 1);
        }


        /*
        |--------------------------------------------------------------------------
        | Signature
        |--------------------------------------------------------------------------
        */

        elseif ($item['type'] === 'signature') {

            $signature = Signature::where(
                'signature_id',
                $item['id']
            )->first();

            if (!$signature) {

                unset($cart[$id]);

                session()->put('cart', $cart);

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This signature is no longer available.'
                    );
            }

            if ((int) $signature->stock <= 0) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This signature is currently out of stock.'
                    );
            }

            $signature->decrement('stock', 1);
        }


        /*
        |--------------------------------------------------------------------------
        | SubCategory
        |--------------------------------------------------------------------------
        */

        elseif ($item['type'] === 'subcategory') {

            $subCategory = SubCategory::where(
                'subcategory_id',
                $item['id']
            )->first();

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

            if ((int) $subCategory->stock <= 0) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This subcategory is currently out of stock.'
                    );
            }

            $subCategory->decrement('stock', 1);
        }


        /*
        |--------------------------------------------------------------------------
        | Collection
        |--------------------------------------------------------------------------
        */

        elseif ($item['type'] === 'collection') {

            $collection = Collection::where(
                'collection_id',
                $item['id']
            )->first();

            if (!$collection) {

                unset($cart[$id]);

                session()->put('cart', $cart);

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'This collection is no longer available.'
                    );
            }

            if ((int) $collection->stock <= 0) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'No more stock is available for this collection.'
                    );
            }

            $collection->decrement('stock', 1);
        }


        /*
        |--------------------------------------------------------------------------
        | Increase Cart Quantity
        |--------------------------------------------------------------------------
        */

        $cart[$id]['quantity']++;

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

        if (!isset($cart[$id])) {
            return redirect()->route('cart.show');
        }

        $item = $cart[$id];

        /*
        |--------------------------------------------------------------------------
        | Only Return Stock If Quantity Is Actually Being Decreased
        |--------------------------------------------------------------------------
        */

        if ($cart[$id]['quantity'] > 1) {

            if ($item['type'] === 'product') {

                $product = Product::where(
                    'product_id',
                    $item['id']
                )->first();

                if ($product) {
                    $product->increment('stock', 1);
                }
            }

            elseif ($item['type'] === 'signature') {

                $signature = Signature::where(
                    'signature_id',
                    $item['id']
                )->first();

                if ($signature) {
                    $signature->increment('stock', 1);
                }
            }

            elseif ($item['type'] === 'subcategory') {

                $subCategory = SubCategory::where(
                    'subcategory_id',
                    $item['id']
                )->first();

                if ($subCategory) {
                    $subCategory->increment('stock', 1);
                }
            }

            elseif ($item['type'] === 'collection') {

                $collection = Collection::where(
                    'collection_id',
                    $item['id']
                )->first();

                if ($collection) {
                    $collection->increment('stock', 1);
                }
            }

            $cart[$id]['quantity']--;

        } else {

            /*
            |--------------------------------------------------------------------------
            | If Quantity Is 1, Remove Item
            |--------------------------------------------------------------------------
            |
            | Return that one reserved item to stock.
            |
            */

            if ($item['type'] === 'product') {

                $product = Product::where(
                    'product_id',
                    $item['id']
                )->first();

                if ($product) {
                    $product->increment('stock', 1);
                }
            }

            elseif ($item['type'] === 'signature') {

                $signature = Signature::where(
                    'signature_id',
                    $item['id']
                )->first();

                if ($signature) {
                    $signature->increment('stock', 1);
                }
            }

            elseif ($item['type'] === 'subcategory') {

                $subCategory = SubCategory::where(
                    'subcategory_id',
                    $item['id']
                )->first();

                if ($subCategory) {
                    $subCategory->increment('stock', 1);
                }
            }

            elseif ($item['type'] === 'collection') {

                $collection = Collection::where(
                    'collection_id',
                    $item['id']
                )->first();

                if ($collection) {
                    $collection->increment('stock', 1);
                }
            }

            unset($cart[$id]);
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

        if (!isset($cart[$id])) {
            return redirect()->route('cart.show');
        }

        $item = $cart[$id];

        /*
        |--------------------------------------------------------------------------
        | Return Reserved Stock
        |--------------------------------------------------------------------------
        */

        if ($item['type'] === 'product') {

            $product = Product::where(
                'product_id',
                $item['id']
            )->first();

            if ($product) {
                $product->increment(
                    'stock',
                    $item['quantity']
                );
            }
        }

        elseif ($item['type'] === 'signature') {

            $signature = Signature::where(
                'signature_id',
                $item['id']
            )->first();

            if ($signature) {
                $signature->increment(
                    'stock',
                    $item['quantity']
                );
            }
        }

        elseif ($item['type'] === 'subcategory') {

            $subCategory = SubCategory::where(
                'subcategory_id',
                $item['id']
            )->first();

            if ($subCategory) {
                $subCategory->increment(
                    'stock',
                    $item['quantity']
                );
            }
        }

        elseif ($item['type'] === 'collection') {

            $collection = Collection::where(
                'collection_id',
                $item['id']
            )->first();

            if ($collection) {
                $collection->increment(
                    'stock',
                    $item['quantity']
                );
            }
        }

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                'Item removed from cart.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Clear Cart
    |--------------------------------------------------------------------------
    */

    public function clear()
    {
        $cart = session()->get('cart', []);

        /*
        |--------------------------------------------------------------------------
        | Return All Reserved Stock
        |--------------------------------------------------------------------------
        */

        foreach ($cart as $item) {

            if (($item['type'] ?? '') === 'product') {

                $product = Product::where(
                    'product_id',
                    $item['id']
                )->first();

                if ($product) {
                    $product->increment(
                        'stock',
                        $item['quantity']
                    );
                }
            }

            elseif (($item['type'] ?? '') === 'signature') {

                $signature = Signature::where(
                    'signature_id',
                    $item['id']
                )->first();

                if ($signature) {
                    $signature->increment(
                        'stock',
                        $item['quantity']
                    );
                }
            }

            elseif (($item['type'] ?? '') === 'subcategory') {

                $subCategory = SubCategory::where(
                    'subcategory_id',
                    $item['id']
                )->first();

                if ($subCategory) {
                    $subCategory->increment(
                        'stock',
                        $item['quantity']
                    );
                }
            }

            elseif (($item['type'] ?? '') === 'collection') {

                $collection = Collection::where(
                    'collection_id',
                    $item['id']
                )->first();

                if ($collection) {
                    $collection->increment(
                        'stock',
                        $item['quantity']
                    );
                }
            }
        }

        session()->forget('cart');

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                'Cart cleared successfully.'
            );
    }
}