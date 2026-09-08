<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class StripeController extends Controller
{
    /**
     * Create Stripe Checkout Session
     */
    public function checkout(Request $request)
    {
        // Validate customer information
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
        ]);

        // Get cart
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.show')
                ->with('error', 'Your cart is empty.');
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Order Total
        |--------------------------------------------------------------------------
        */

        $subtotal = 0;

        foreach ($cart as $item) {
            $price = (float) ($item['price'] ?? 0);
            $quantity = (int) ($item['quantity'] ?? 1);

            $subtotal += $price * $quantity;
        }

        // Delivery charge
        $delivery = 200;

        $total = $subtotal + $delivery;

        /*
        |--------------------------------------------------------------------------
        | Stripe Configuration
        |--------------------------------------------------------------------------
        */

        $currency = strtolower(
            config('services.stripe.currency', 'pkr')
        );

        Stripe::setApiKey(
            config('services.stripe.secret')
        );

        /*
        |--------------------------------------------------------------------------
        | Create Pending Order
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

                'payment_method' => 'Stripe',
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
            | Create Stripe Line Items
            |--------------------------------------------------------------------------
            */

            $lineItems = [];

            foreach ($cart as $item) {

                $price = (float) ($item['price'] ?? 0);
                $quantity = (int) ($item['quantity'] ?? 1);

                $lineItems[] = [
                    'price_data' => [
                        'currency' => $currency,

                        'product_data' => [
                            'name' => $item['name'],
                        ],

                        // Stripe uses smallest currency unit
                        // Rs. 5,000 = 500000 PKR minor units
                        'unit_amount' => (int) round($price * 100),
                    ],

                    'quantity' => $quantity,
                ];
            }

            /*
            |--------------------------------------------------------------------------
            | Add Delivery
            |--------------------------------------------------------------------------
            */

            $lineItems[] = [
                'price_data' => [
                    'currency' => $currency,

                    'product_data' => [
                        'name' => 'Standard Delivery',
                    ],

                    // Rs. 200
                    'unit_amount' => 20000,
                ],

                'quantity' => 1,
            ];

            /*
            |--------------------------------------------------------------------------
            | Create Stripe Checkout Session
            |--------------------------------------------------------------------------
            */

            $session = StripeSession::create([
                'mode' => 'payment',

                'customer_email' => $order->email,

                'line_items' => $lineItems,

                'metadata' => [
                    'order_id' => $order->order_id,
                ],

                'success_url' => route('stripe.success')
                    . '?session_id={CHECKOUT_SESSION_ID}',

                'cancel_url' => route(
                    'stripe.cancel',
                    $order->order_id
                ),
            ]);

            /*
            |--------------------------------------------------------------------------
            | Commit Database
            |--------------------------------------------------------------------------
            */

            DB::commit();

            /*
            |--------------------------------------------------------------------------
            | Redirect To Stripe
            |--------------------------------------------------------------------------
            */

            return redirect($session->url);

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('Stripe checkout creation failed.', [
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Unable to start Stripe payment. Please try again.'
                );
        }
    }


    /**
     * Stripe Success
     */
    public function success(Request $request)
    {
        $sessionId = $request->session_id;

        if (!$sessionId) {
            return redirect()
                ->route('checkout.index')
                ->with(
                    'error',
                    'Invalid Stripe payment session.'
                );
        }

        try {

            Stripe::setApiKey(
                config('services.stripe.secret')
            );

            /*
            |--------------------------------------------------------------------------
            | Retrieve Stripe Session
            |--------------------------------------------------------------------------
            */

            $session = StripeSession::retrieve($sessionId);

            /*
            |--------------------------------------------------------------------------
            | Verify Payment
            |--------------------------------------------------------------------------
            */

            if ($session->payment_status !== 'paid') {

                return redirect()
                    ->route('checkout.index')
                    ->with(
                        'error',
                        'Payment was not completed.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Get Order ID From Metadata
            |--------------------------------------------------------------------------
            */

            $orderId = $session->metadata->order_id ?? null;

            if (!$orderId) {

                return redirect()
                    ->route('checkout.index')
                    ->with(
                        'error',
                        'Order could not be found.'
                    );
            }

            /*
            |--------------------------------------------------------------------------
            | Find Order
            |--------------------------------------------------------------------------
            */

            $order = Order::where(
                'order_id',
                $orderId
            )->firstOrFail();

            /*
            |--------------------------------------------------------------------------
            | Update Order
            |--------------------------------------------------------------------------
            */

            if ($order->payment_status !== 'Paid') {

                $order->update([
                    'payment_status' => 'Paid',
                    'status' => 'Processing',
                ]);

                /*
                |--------------------------------------------------------------------------
                | Send Order Email
                |--------------------------------------------------------------------------
                */

                try {

                    Mail::to($order->email)
                        ->send(
                            new OrderStatusMail(
                                $order,
                                'placed'
                            )
                        );

                } catch (\Throwable $e) {

                    Log::error(
                        'Stripe order email failed.',
                        [
                            'order_id' => $order->order_id,
                            'customer_email' => $order->email,
                            'error' => $e->getMessage(),
                        ]
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Clear Cart
            |--------------------------------------------------------------------------
            */

            session()->forget('cart');

            /*
            |--------------------------------------------------------------------------
            | Redirect To Order Success
            |--------------------------------------------------------------------------
            */

            return redirect()->route(
                'order.success',
                $order->order_id
            );

        } catch (\Throwable $e) {

            Log::error(
                'Stripe payment verification failed.',
                [
                    'session_id' => $sessionId,
                    'error' => $e->getMessage(),
                ]
            );

            return redirect()
                ->route('checkout.index')
                ->with(
                    'error',
                    'We could not verify your payment. Please contact support if money was deducted.'
                );
        }
    }


    /**
     * Stripe Cancel
     */
    public function cancel($order_id)
    {
        $order = Order::where(
            'order_id',
            $order_id
        )->first();

        /*
        |--------------------------------------------------------------------------
        | Do NOT cancel the order immediately
        |--------------------------------------------------------------------------
        |
        | The customer may simply have returned from Stripe
        | and want to try the payment again.
        |
        */

        if ($order && $order->payment_status === 'Pending') {

            $order->update([
                'payment_status' => 'Pending',
                'status' => 'Pending',
            ]);
        }

        return redirect()
            ->route('checkout.index')
            ->with(
                'error',
                'Stripe payment was cancelled. You can try again.'
            );
    }
}