
<h1>KAIRA ECOMMERCE</h1>

<h2>
    @if($type === 'placed')
        Your Order Has Been Placed! 🎉

    @elseif($type === 'confirmed')
        Your Order is Confirmed! 🎉

    @elseif($type === 'fulfilled')
        Your Order is Fulfilled! 📦

    @elseif($type === 'shipped')
        Your Order Has Been Shipped! 🚚

    @elseif($type === 'delivered')
        Your Order Has Been Delivered! 🎉

    @elseif($type === 'cancelled')
        Your Order Has Been Cancelled ❌

    @else
        Your Order Has Been Updated!
    @endif
</h2>

<p>Hello {{ $order->name }},</p>

<p>
    <strong>Order Number:</strong>
    {{ $order->order_number }}
</p>

<p>
    <strong>Total:</strong>
    Rs. {{ number_format($order->total, 2) }}
</p>

<p>Thank you for shopping with Kaira!</p>

