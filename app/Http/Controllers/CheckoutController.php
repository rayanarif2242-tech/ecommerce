<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\OrderStatusMail;

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

            $price = (float) ($item['price'] ?? 0);
            $quantity = (int) ($item['quantity'] ?? 1);

            $subtotal += $price * $quantity;
            $totalItems += $quantity;
        }

        // Free delivery
        $delivery = 200;

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

            $price = (float) ($item['price'] ?? 0);
            $quantity = (int) ($item['quantity'] ?? 1);

            $subtotal += $price * $quantity;
        }


        /*
        |--------------------------------------------------------------------------
        | Delivery
        |--------------------------------------------------------------------------
        */

        $delivery = 200;

        $total = $subtotal + $delivery;


        /*
        |--------------------------------------------------------------------------
        | Create Order
        |--------------------------------------------------------------------------
        */

        DB::beginTransaction();

        try {

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

                'payment_status' => 'Pending',

                'fulfillment_status' => 'Unfulfilled',

                'delivery_status' => 'Pending',

                'delivery_method' => 'Standard Delivery',

                'status' => 'Pending',

            ]);


            /*
            |--------------------------------------------------------------------------
            | Create Order Items
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $item) {

                $price = (float) ($item['price'] ?? 0);

                $quantity = (int) ($item['quantity'] ?? 1);

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
            | Clear Cart
            |--------------------------------------------------------------------------
            */

            session()->forget('cart');


            /*
            |--------------------------------------------------------------------------
            | Commit Transaction
            |--------------------------------------------------------------------------
            */

            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | SEND ORDER PLACED EMAIL
            |--------------------------------------------------------------------------
            */

            try {

                Mail::to($order->email)
                    ->send(new OrderStatusMail($order, 'placed'));

            } catch (\Throwable $e) {

                Log::error('Order placed email failed.', [

                    'order_id' => $order->order_id,

                    'customer_email' => $order->email,

                    'status' => 'placed',

                    'error' => $e->getMessage(),

                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Order Success
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'order.success',
                    $order->order_id
                );


        } catch (\Throwable $e) {

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

