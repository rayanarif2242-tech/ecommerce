<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Signature;
use App\Models\SubCategory;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Show Checkout Page
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        // Do not allow checkout with empty cart
        if (count($cart) === 0) {
            return redirect()
                ->route('cart.show')
                ->with('error', 'Your cart is empty.');
        }

        $subtotal = 0;
        $totalItems = 0;

        foreach ($cart as $item) {
            $price = $item['price'] ?? 0;
            $quantity = $item['quantity'] ?? 1;

            $subtotal += $price * $quantity;
            $totalItems += $quantity;
        }

        // Free delivery
        $delivery = 0;

        $total = $subtotal + $delivery;

        return view(
            'user.checkout',
            compact(
                'cart',
                'subtotal',
                'delivery',
                'total',
                'totalItems'
            )
        );
    }


    /**
     * Confirm Order
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Customer Information
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Cart
        |--------------------------------------------------------------------------
        */

        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect()
                ->route('cart.show')
                ->with('error', 'Your cart is empty.');
        }


        /*
        |--------------------------------------------------------------------------
        | Calculate Subtotal
        |--------------------------------------------------------------------------
        */

        $subtotal = 0;

        foreach ($cart as $item) {
            $price = $item['price'] ?? 0;
            $quantity = $item['quantity'] ?? 1;

            $subtotal += $price * $quantity;
        }


        /*
        |--------------------------------------------------------------------------
        | Delivery
        |--------------------------------------------------------------------------
        */

        $delivery = 0;

        $total = $subtotal + $delivery;


        /*
        |--------------------------------------------------------------------------
        | Database Transaction
        |--------------------------------------------------------------------------
        */

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | CHECK ALL STOCK
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $type = $item['type'] ?? 'product';
                $itemId = $item['id'];
                $quantity = (int) ($item['quantity'] ?? 1);


                /*
                |--------------------------------------------------------------------------
                | PRODUCT
                |--------------------------------------------------------------------------
                */

                if ($type === 'product') {

                    $product = Product::where(
                        'product_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();


                    if (!$product) {
                        throw new \Exception(
                            'The product "' .
                            $item['name'] .
                            '" is no longer available.'
                        );
                    }


                    // Product inactive
                    if ($product->status != 1) {
                        throw new \Exception(
                            'The product "' .
                            $product->name .
                            '" is currently not available.'
                        );
                    }


                    // Out of stock
                    if ((int) $product->stock <= 0) {
                        throw new \Exception(
                            $product->name .
                            ' is currently out of stock.'
                        );
                    }


                    // Not enough stock
                    if ($quantity > (int) $product->stock) {
                        throw new \Exception(
                            'Only ' .
                            $product->stock .
                            ' item(s) of "' .
                            $product->name .
                            '" are available in stock.'
                        );
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | SIGNATURE
                |--------------------------------------------------------------------------
                */

                elseif ($type === 'signature') {

                    $signature = Signature::where(
                        'signature_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();


                    if (!$signature) {
                        throw new \Exception(
                            'The signature "' .
                            $item['name'] .
                            '" is no longer available.'
                        );
                    }


                    // Signature inactive
                    if ($signature->status !== 'Active') {
                        throw new \Exception(
                            'The signature "' .
                            $signature->product_name .
                            '" is currently not available.'
                        );
                    }


                    // Out of stock
                    if ((int) $signature->stock <= 0) {
                        throw new \Exception(
                            $signature->product_name .
                            ' is currently out of stock.'
                        );
                    }


                    // Not enough stock
                    if ($quantity > (int) $signature->stock) {
                        throw new \Exception(
                            'Only ' .
                            $signature->stock .
                            ' item(s) of "' .
                            $signature->product_name .
                            '" are available in stock.'
                        );
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | SUBCATEGORY
                |--------------------------------------------------------------------------
                */

                elseif ($type === 'subcategory') {

                    $subCategory = SubCategory::where(
                        'subcategory_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();


                    if (!$subCategory) {
                        throw new \Exception(
                            'The subcategory "' .
                            $item['name'] .
                            '" is no longer available.'
                        );
                    }


                    // Out of stock
                    if ((int) $subCategory->stock <= 0) {
                        throw new \Exception(
                            $subCategory->name .
                            ' is currently out of stock.'
                        );
                    }


                    // Not enough stock
                    if ($quantity > (int) $subCategory->stock) {
                        throw new \Exception(
                            'Only ' .
                            $subCategory->stock .
                            ' item(s) of "' .
                            $subCategory->name .
                            '" are available in stock.'
                        );
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | COLLECTION
                |--------------------------------------------------------------------------
                */

                elseif ($type === 'collection') {

                    $collection = Collection::where(
                        'collection_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();


                    if (!$collection) {
                        throw new \Exception(
                            'The collection "' .
                            $item['name'] .
                            '" is no longer available.'
                        );
                    }


                    // Out of stock
                    if ((int) $collection->stock <= 0) {
                        throw new \Exception(
                            $collection->name .
                            ' is currently out of stock.'
                        );
                    }


                    // Not enough stock
                    if ($quantity > (int) $collection->stock) {
                        throw new \Exception(
                            'Only ' .
                            $collection->stock .
                            ' item(s) of "' .
                            $collection->name .
                            '" are available in stock.'
                        );
                    }
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CREATE ORDER
            |--------------------------------------------------------------------------
            */

            $order = Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'postal_code' => $request->postal_code,

                'subtotal' => $subtotal,
                'delivery' => $delivery,
                'total' => $total,

                'payment_method' => 'Cash on Delivery',

                'status' => 'Pending',
            ]);


            /*
            |--------------------------------------------------------------------------
            | CREATE ORDER ITEMS
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $price = $item['price'] ?? 0;
                $quantity = $item['quantity'] ?? 1;

                OrderItem::create([
                    'order_id' => $order->id,

                    'item_type' => $item['type'] ?? 'product',

                    'item_id' => $item['id'],

                    'name' => $item['name'],

                    'price' => $price,

                    'quantity' => $quantity,

                    'total' => $price * $quantity,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | REDUCE STOCK
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $type = $item['type'] ?? 'product';
                $itemId = $item['id'];
                $quantity = (int) ($item['quantity'] ?? 1);


                /*
                |--------------------------------------------------------------------------
                | PRODUCT STOCK
                |--------------------------------------------------------------------------
                */

                if ($type === 'product') {

                    $product = Product::where(
                        'product_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();

                    if (!$product) {
                        throw new \Exception(
                            'Product not found while updating stock.'
                        );
                    }

                    $product->decrement(
                        'stock',
                        $quantity
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | SIGNATURE STOCK
                |--------------------------------------------------------------------------
                */

                elseif ($type === 'signature') {

                    $signature = Signature::where(
                        'signature_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();

                    if (!$signature) {
                        throw new \Exception(
                            'Signature not found while updating stock.'
                        );
                    }

                    $signature->decrement(
                        'stock',
                        $quantity
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | SUBCATEGORY STOCK
                |--------------------------------------------------------------------------
                */

                elseif ($type === 'subcategory') {

                    $subCategory = SubCategory::where(
                        'subcategory_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();

                    if (!$subCategory) {
                        throw new \Exception(
                            'Subcategory not found while updating stock.'
                        );
                    }

                    $subCategory->decrement(
                        'stock',
                        $quantity
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | COLLECTION STOCK
                |--------------------------------------------------------------------------
                */

                elseif ($type === 'collection') {

                    $collection = Collection::where(
                        'collection_id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();

                    if (!$collection) {
                        throw new \Exception(
                            'Collection not found while updating stock.'
                        );
                    }

                    $collection->decrement(
                        'stock',
                        $quantity
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CLEAR CART
            |--------------------------------------------------------------------------
            */

            session()->forget('cart');


            /*
            |--------------------------------------------------------------------------
            | COMMIT TRANSACTION
            |--------------------------------------------------------------------------
            */

            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | ORDER SUCCESS
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'order.success',
                    $order->order_id
                );


        } catch (\Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | ROLLBACK
            |--------------------------------------------------------------------------
            */

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Order Success
     */
    public function success($order_id)
    {
        $order = Order::with('items')
            ->where('order_id', $order_id)
            ->firstOrFail();

        return view(
            'user.order-success',
            compact('order')
        );
    }
}