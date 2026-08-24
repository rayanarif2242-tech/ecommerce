<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
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

        return view('user.checkout', compact(
            'cart',
            'subtotal',
            'delivery',
            'total',
            'totalItems'
        ));
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


        // Prevent empty order
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
            | CHECK PRODUCT STOCK
            |--------------------------------------------------------------------------
            |
            | Your existing product stock logic is kept unchanged.
            |
            */

            foreach ($cart as $item) {

                // Only normal products
                if (($item['type'] ?? '') !== 'product') {
                    continue;
                }


                $product = Product::where(
                    'product_id',
                    $item['id']
                )
                ->lockForUpdate()
                ->first();


                // Product no longer exists
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


                $quantity = $item['quantity'] ?? 1;


                // Product out of stock
                if ($product->stock <= 0) {

                    throw new \Exception(
                        $product->name .
                        ' is currently out of stock.'
                    );
                }


                // Requested quantity greater than available stock
                if ($quantity > $product->stock) {

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
            | CHECK SUBCATEGORY STOCK
            |--------------------------------------------------------------------------
            |
            | This is the new part for subcategories.
            |
            */

            foreach ($cart as $item) {

                // Only subcategory items
                if (($item['type'] ?? '') !== 'subcategory') {
                    continue;
                }


                /*
                | Find subcategory using UUID
                */

                $subCategory = SubCategory::where(
                    'subcategory_id',
                    $item['id']
                )
                ->lockForUpdate()
                ->first();


                /*
                | Subcategory no longer exists
                */

                if (!$subCategory) {

                    throw new \Exception(
                        'The subcategory "' .
                        $item['name'] .
                        '" is no longer available.'
                    );
                }


                /*
                | Requested quantity
                */

                $quantity = $item['quantity'] ?? 1;


                /*
                | Subcategory out of stock
                */

                if ($subCategory->stock <= 0) {

                    throw new \Exception(
                        $subCategory->name .
                        ' is currently out of stock.'
                    );
                }


                /*
                | Requested quantity greater than available stock
                */

                if ($quantity > $subCategory->stock) {

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
            | REDUCE PRODUCT STOCK
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                // Only normal products
                if (($item['type'] ?? '') !== 'product') {
                    continue;
                }


                $quantity = $item['quantity'] ?? 1;


                $product = Product::where(
                    'product_id',
                    $item['id']
                )
                ->lockForUpdate()
                ->first();


                if (!$product) {

                    throw new \Exception(
                        'Product not found while updating stock.'
                    );
                }


                /*
                | Reduce product stock
                */

                $product->decrement(
                    'stock',
                    $quantity
                );
            }


            /*
            |--------------------------------------------------------------------------
            | REDUCE SUBCATEGORY STOCK
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                // Only subcategories
                if (($item['type'] ?? '') !== 'subcategory') {
                    continue;
                }


                $quantity = $item['quantity'] ?? 1;


                $subCategory = SubCategory::where(
                    'subcategory_id',
                    $item['id']
                )
                ->lockForUpdate()
                ->first();


                if (!$subCategory) {

                    throw new \Exception(
                        'Subcategory not found while updating stock.'
                    );
                }


                /*
                | Reduce subcategory stock
                */

                $subCategory->decrement(
                    'stock',
                    $quantity
                );
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
                ->route('order.success', $order->order_id);


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