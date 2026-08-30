<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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


        $order->update($validated);


        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
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