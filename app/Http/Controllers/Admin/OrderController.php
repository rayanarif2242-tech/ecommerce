<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\OrderStatusMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display all orders.
     */
    public function index()
    {
        $orders = Order::with('items')
            ->latest()
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show create order form.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a new order.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',

            'subtotal' => 'required|numeric|min:0',
            'delivery' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',

            'payment_method' => 'required|string|max:100',
            'payment_status' => 'required|string|max:50',

            'fulfillment_status' => 'required|string|max:50',
            'delivery_status' => 'required|string|max:50',
            'delivery_method' => 'required|string|max:100',

            'status' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        Order::create($validated);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display a specific order.
     */
    public function show(Order $order)
    {
        $order->load('items');

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show edit form.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update order.
     */
    public function update(Request $request, Order $order)
    {
        /*
        |--------------------------------------------------------------------------
        | SAVE OLD STATUSES
        |--------------------------------------------------------------------------
        */

        $oldFulfillmentStatus = $order->fulfillment_status;
        $oldDeliveryStatus = $order->delivery_status;
        $oldOrderStatus = $order->status;

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',

            'subtotal' => 'required|numeric|min:0',
            'delivery' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',

            'payment_method' => 'required|string|max:100',
            'payment_status' => 'required|string|max:50',

            'fulfillment_status' => 'required|string|max:50',
            'delivery_status' => 'required|string|max:50',
            'delivery_method' => 'required|string|max:100',

            'status' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE ORDER
        |--------------------------------------------------------------------------
        */

        $order->update($validated);

        /*
        |--------------------------------------------------------------------------
        | FULFILLED EMAIL
        |--------------------------------------------------------------------------
        */

        if (
            $oldFulfillmentStatus !== 'Fulfilled' &&
            $order->fulfillment_status === 'Fulfilled'
        ) {
            $this->sendStatusEmail($order, 'fulfilled');
        }

        /*
        |--------------------------------------------------------------------------
        | SHIPPED EMAIL
        |--------------------------------------------------------------------------
        */

        if (
            $oldDeliveryStatus !== 'Shipped' &&
            $order->delivery_status === 'Shipped'
        ) {
            $this->sendStatusEmail($order, 'shipped');
        }

        /*
        |--------------------------------------------------------------------------
        | DELIVERED EMAIL
        |--------------------------------------------------------------------------
        */

        if (
            $oldDeliveryStatus !== 'Delivered' &&
            $order->delivery_status === 'Delivered'
        ) {
            $this->sendStatusEmail($order, 'delivered');
        }

        /*
        |--------------------------------------------------------------------------
        | CANCELLED EMAIL
        |--------------------------------------------------------------------------
        */

        if (
            $oldOrderStatus !== 'Cancelled' &&
            $order->status === 'Cancelled'
        ) {
            $this->sendStatusEmail($order, 'cancelled');
        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Send order status email safely.
     *
     * If Mailtrap rejects the email because of its
     * rate limit, the order update will still succeed.
     */
    private function sendStatusEmail(Order $order, string $status)
    {
        try {

            Mail::to($order->email)
                ->send(new OrderStatusMail($order, $status));

        } catch (\Throwable $e) {

            Log::error('Order status email failed.', [
                'order_id' => $order->order_id,
                'customer_email' => $order->email,
                'status' => $status,
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Delete order.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}

