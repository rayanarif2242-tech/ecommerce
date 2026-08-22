<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Checkout | Kaira</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f7f7f7;
            color: #111;
            font-family: 'Montserrat', sans-serif;
        }

       .main-navbar {
    height: 82px;
    border-bottom: 1px solid #e5e5e5;
    background: #fff;
    display: flex;
    align-items: center;
}

.brand {
    font-family: 'Cormorant Garamond', serif;
    font-size: 34px;
    font-weight: 600;
    letter-spacing: 4px;
    color: #111;
    text-decoration: none;
}

.nav-links {
    display: flex;
    gap: 38px;
    list-style: none;
    margin: 0;
    padding: 0;
}

.nav-links a {
    text-decoration: none;
    color: #222;
    font-size: 13px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    transition: .3s;
}

.nav-links a:hover {
    color: #777;
}

.nav-icons {
    display: flex;
    align-items: center;
    gap: 22px;
}

.nav-icons a {
    color: #111;
    font-size: 20px;
    text-decoration: none;
    transition: .3s;
}

.nav-icons a:hover {
    color: #777;
}

@media (max-width: 991px) {

    .nav-links {
        display: none;
    }

}

@media (max-width: 767px) {

    .main-navbar {
        height: 70px;
    }

    .brand {
        font-size: 28px;
    }

}

        .brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 600;
            letter-spacing: 4px;
            color: #111;
            text-decoration: none;
        }

        .checkout-page {
            padding: 50px 0 90px;
        }

        .page-title {
            font-size: 46px;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .checkout-card {
            background: #fff;
            border: 1px solid #ddd;
            padding: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 0;
            border: 1px solid #ccc;
            padding: 13px;
            font-size: 13px;
        }

        .form-control:focus {
            border-color: #111;
            box-shadow: none;
        }

        .summary-card {
            background: #fff;
            border: 1px solid #ddd;
            padding: 25px;
            position: sticky;
            top: 25px;
        }

        .summary-title {
            font-size: 21px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 13px;
            color: #555;
        }

        .summary-total {
            border-top: 1px solid #ddd;
            margin-top: 12px;
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
        }

        .summary-total strong {
            font-size: 21px;
        }

        .payment-box {
            border: 1px solid #ddd;
            padding: 18px;
            margin-top: 25px;
        }

        .confirm-btn {
            width: 100%;
            background: #111;
            color: #fff;
            border: none;
            padding: 16px;
            margin-top: 25px;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .confirm-btn:hover {
            background: #333;
        }

        .alert {
            border-radius: 0;
            font-size: 13px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item-name {
            font-size: 13px;
            font-weight: 500;
        }

        .cart-item-qty {
            color: #777;
            font-size: 11px;
            margin-top: 4px;
        }

        .cart-item-price {
            font-size: 13px;
            white-space: nowrap;
        }

    </style>

</head>

<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

<nav class="main-navbar">

    <div class="container">

        <div class="d-flex align-items-center justify-content-between">

            {{-- LOGO --}}
            <a
                href="{{ url('/') }}"
                class="brand"
            >
                KAIRA
            </a>


            {{-- NAVIGATION --}}
            <ul class="nav-links">

                <li>
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('signatures') }}">
                        Shop
                    </a>
                </li>

                <li>
                    <a href="{{ url('/collections') }}">
                        Collections
                    </a>
                </li>

                <li>
                    <a href="{{ route('blogs') }}">
                        Blog
                    </a>
                </li>

                <li>
                    <a href="{{ url('/') }}#contact">
                        Contact
                    </a>
                </li>

            </ul>


            {{-- ICONS --}}
            <div class="nav-icons">

                <a href="#">
                    <i class="bi bi-search"></i>
                </a>

                <a href="#">
                    <i class="bi bi-person"></i>
                </a>

                <a href="{{ route('cart.show') }}">
                    <i class="bi bi-bag"></i>
                </a>

            </div>

        </div>

    </div>

</nav>


<section class="checkout-page">

    <div class="container">

        <div class="mb-5">

            <h1 class="page-title">
                Checkout
            </h1>

            <p class="text-muted">
                Enter your shipping details to complete your order.
            </p>

        </div>


        @if(session('error'))

            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger mb-4">

                <strong>Please fix the following:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('checkout.store') }}"
            method="POST"
        >

            @csrf

            <div class="row g-4">


                {{-- SHIPPING INFORMATION --}}

                <div class="col-lg-7">

                    <div class="checkout-card">

                        <div class="section-title">
                            Shipping Information
                        </div>


                        <div class="row g-3">


                            <div class="col-12">

                                <label class="form-label">
                                    Full Name *
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Email *
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="example@email.com"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone *
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone') }}"
                                    placeholder="03XX XXXXXXX"
                                    required
                                >

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Address *
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="4"
                                    placeholder="House number, street, area..."
                                    required
                                >{{ old('address') }}</textarea>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    City *
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    value="{{ old('city') }}"
                                    placeholder="Enter city"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Postal Code
                                </label>

                                <input
                                    type="text"
                                    name="postal_code"
                                    class="form-control"
                                    value="{{ old('postal_code') }}"
                                    placeholder="Postal code"
                                >

                            </div>

                        </div>


                        <div class="payment-box">

                            <strong>
                                Payment Method
                            </strong>

                            <div class="mt-3">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        checked
                                    >

                                    <label class="form-check-label">

                                        Cash on Delivery

                                    </label>

                                </div>

                            </div>

                            <small class="text-muted d-block mt-2">

                                Pay when your order is delivered.

                            </small>

                        </div>


                        <button
                            type="submit"
                            class="confirm-btn"
                        >

                            <i class="bi bi-check-circle me-2"></i>

                            Confirm Order

                        </button>

                    </div>

                </div>


                {{-- ORDER SUMMARY --}}

                <div class="col-lg-5">

                    <div class="summary-card">

                        <div class="summary-title">
                            Your Order
                        </div>


                        @foreach($cart as $item)

                            <div class="cart-item">

                                <div>

                                    <div class="cart-item-name">
                                        {{ $item['name'] }}
                                    </div>

                                    <div class="cart-item-qty">

                                        Quantity:
                                        {{ $item['quantity'] }}

                                    </div>

                                </div>

                                <div class="cart-item-price">

                                    Rs.
                                    {{ number_format(
                                        ($item['price'] ?? 0) *
                                        ($item['quantity'] ?? 1),
                                        2
                                    ) }}

                                </div>

                            </div>

                        @endforeach


                        <div class="summary-row mt-3">

                            <span>
                                Items
                            </span>

                            <strong>
                                {{ $totalItems }}
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                Rs. {{ number_format($subtotal, 2) }}
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Delivery
                            </span>

                            <strong>
                                Free
                            </strong>

                        </div>


                        <div class="summary-total">

                            <span>
                                Total
                            </span>

                            <strong>
                                Rs. {{ number_format($total, 2) }}
                            </strong>

                        </div>

                    </div>

                </div>


            </div>

        </form>

    </div>

</section>


</body>

</html>