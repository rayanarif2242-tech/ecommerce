<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Signature;
use App\Models\SubCategory;
use App\Models\Collection;
use App\Models\Category;
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

        $existingQuantity = isset($cart[$id])
            ? (int) $cart[$id]['quantity']
            : 0;

        if (($existingQuantity + $quantity) > (int) $product->stock) {
            return back()->with(
                'error',
                'You can only add up to ' . $product->stock . ' item(s) of this product.'
            );
        }

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

        // IMPORTANT:
        // Do not change database stock here.
        session()->put('cart', $cart);

        return back()->with(
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

        $existingQuantity = isset($cart[$id])
            ? (int) $cart[$id]['quantity']
            : 0;

        if (($existingQuantity + $quantity) > (int) $signature->stock) {
            return back()->with(
                'error',
                'You can only add up to ' . $signature->stock . ' item(s) of this signature.'
            );
        }

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

        // Do not change database stock.
        session()->put('cart', $cart);

        return back()->with(
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

        $existingQuantity = isset($cart[$id])
            ? (int) $cart[$id]['quantity']
            : 0;

        if (($existingQuantity + $quantity) > (int) $subCategory->stock) {
            return back()->with(
                'error',
                'You can only add up to ' . $subCategory->stock . ' item(s) of this subcategory.'
            );
        }

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

        // Do not change database stock.
        session()->put('cart', $cart);

        return back()->with(
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

        $existingQuantity = isset($cart[$id])
            ? (int) $cart[$id]['quantity']
            : 0;

        if (($existingQuantity + $quantity) > (int) $collection->stock) {
            return back()->with(
                'error',
                'You can only add up to ' . $collection->stock . ' item(s) of this collection.'
            );
        }

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

        // Do not change database stock.
        session()->put('cart', $cart);

        return back()->with(
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
        /*
        |--------------------------------------------------------------------------
        | Get Cart From Session
        |--------------------------------------------------------------------------
        */

        $cart = session()->get('cart', []);

        /*
        |--------------------------------------------------------------------------
        | Get Categories For Navbar
        |--------------------------------------------------------------------------
        |
        | cart.blade.php uses:
        |
        | @foreach($categories as $category)
        |
        | Therefore we must send $categories to the view.
        |
        */

        $categories = Category::with('subCategories')
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view(
            'user.cart',
            compact('cart', 'categories')
        );
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

            if ((int) $item['quantity'] >= (int) $product->stock) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'You cannot add more than ' . $product->stock . ' item(s).'
                    );
            }
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

            if ((int) $item['quantity'] >= (int) $signature->stock) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'You cannot add more than ' . $signature->stock . ' item(s).'
                    );
            }
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

            if ((int) $item['quantity'] >= (int) $subCategory->stock) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'You cannot add more than ' . $subCategory->stock . ' item(s).'
                    );
            }
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

            if ((int) $item['quantity'] >= (int) $collection->stock) {

                return redirect()
                    ->route('cart.show')
                    ->with(
                        'error',
                        'You cannot add more than ' . $collection->stock . ' item(s).'
                    );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Increase Session Quantity Only
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

        if ($cart[$id]['quantity'] > 1) {

            $cart[$id]['quantity']--;

        } else {

            unset($cart[$id]);
        }

        /*
        |--------------------------------------------------------------------------
        | Session Only
        |--------------------------------------------------------------------------
        */

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
        /*
        |--------------------------------------------------------------------------
        | Clear Session Only
        |--------------------------------------------------------------------------
        */

        session()->forget('cart');

        return redirect()
            ->route('cart.show')
            ->with(
                'success',
                'Cart cleared successfully.'
            );
    }
}