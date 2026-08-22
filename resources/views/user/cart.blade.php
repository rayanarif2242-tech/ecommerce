<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Your Cart | Kaira</title>


    {{-- Bootstrap --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Bootstrap Icons --}}

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    {{-- Fonts --}}

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
            background: #fff;
            color: #111;
            font-family: 'Montserrat', sans-serif;
        }


        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            height: 82px;
            border-bottom: 1px solid #e8e8e8;
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
            font-size: 14px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            transition: .3s;
        }


        .nav-links a:hover {
            color: #888;
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


        /* =========================
           CART SECTION
        ========================= */

        .cart-section {
            padding: 70px 0 100px;
        }


        .cart-heading {
            text-align: center;
            margin-bottom: 60px;
        }


        .cart-label {
            display: block;
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }


        .cart-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 58px;
            font-weight: 500;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 0;
        }


        .cart-count {
            margin-top: 15px;
            color: #888;
            font-size: 13px;
            letter-spacing: 1px;
        }


        /* =========================
           CART ITEM
        ========================= */

        .cart-item {
            border-top: 1px solid #e5e5e5;
            padding: 25px 0;
        }


        .cart-item:last-child {
            border-bottom: 1px solid #e5e5e5;
        }


        .cart-image-wrapper {
            width: 140px;
            height: 170px;
            overflow: hidden;
            background: #f5f5f5;
        }


        .cart-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .cart-product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 27px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }


        .cart-product-price {
            color: #777;
            font-size: 14px;
            margin-bottom: 15px;
        }


        /* =========================
           QUANTITY
        ========================= */

        .quantity-box {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ddd;
        }


        .quantity-btn {
            width: 38px;
            height: 38px;
            border: none;
            background: #fff;
            font-size: 16px;
        }


        .quantity-number {
            width: 45px;
            text-align: center;
            font-size: 13px;
        }


        /* =========================
           CART SUMMARY
        ========================= */

        .cart-summary {
            border: 1px solid #e5e5e5;
            padding: 35px;
        }


        .summary-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }


        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            font-size: 14px;
            color: #777;
        }


        .summary-total {
            border-top: 1px solid #ddd;
            margin-top: 15px;
            padding-top: 20px;

            display: flex;
            justify-content: space-between;

            font-size: 17px;
            color: #111;
        }


        .checkout-btn {
            display: block;
            width: 100%;

            background: #111;
            color: #fff;

            border: none;

            padding: 17px;

            margin-top: 30px;

            text-align: center;
            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            transition: .3s;
        }


        .checkout-btn:hover {
            background: #333;
            color: #fff;
        }


        /* =========================
           CONTINUE SHOPPING
        ========================= */

        .continue-shopping {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            margin-top: 30px;

            color: #111;
            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }


        .continue-shopping:hover {
            color: #777;
        }


        /* =========================
           EMPTY CART
        ========================= */

        .empty-cart {
            text-align: center;
            padding: 80px 20px;
        }


        .empty-cart i {
            font-size: 70px;
            color: #aaa;
        }


        .empty-cart h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            margin-top: 25px;
        }


        .empty-cart p {
            color: #777;
            font-size: 14px;
        }


        .shop-btn {
            display: inline-block;

            margin-top: 20px;

            background: #111;
            color: #fff;

            padding: 15px 35px;

            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }


        .shop-btn:hover {
            background: #333;
            color: #fff;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111;
            color: white;
            padding: 55px 0;
        }


        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 600;
            letter-spacing: 4px;
        }


        .footer p {
            color: #aaa;
            font-size: 14px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .nav-links {
                display: none;
            }


            .cart-summary {
                margin-top: 40px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .cart-section {
                padding: 45px 0 70px;
            }


            .cart-title {
                font-size: 42px;
            }


            .cart-image-wrapper {
                width: 100px;
                height: 130px;
            }


            .cart-product-name {
                font-size: 22px;
            }


            .cart-summary {
                padding: 25px;
            }

        }

    </style>

</head>


<body>


{{-- =========================
     NAVBAR
========================= --}}

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



{{-- =========================
     CART
========================= --}}

<section class="cart-section">

    <div class="container">


        {{-- HEADING --}}

        <div class="cart-heading">

            <span class="cart-label">
                Kaira Shopping
            </span>


            <h1 class="cart-title">
                Your Cart
            </h1>


            <div class="cart-count">

                {{ count($cart) }}

                {{ count($cart) == 1 ? 'Item' : 'Items' }}

            </div>

        </div>



        @if(count($cart) > 0)


            <div class="row g-5">


                {{-- =========================
                     CART ITEMS
                ========================= --}}

                <div class="col-lg-8">


                    @foreach($cart as $item)

                        <div class="cart-item">


                            <div class="row align-items-center g-4">


                                {{-- IMAGE --}}

                                <div class="col-4 col-md-3">

                                    <div class="cart-image-wrapper">

                                        @if($item['image'])

                                            <img
                                                src="{{ asset($item['image']) }}"
                                                alt="{{ $item['name'] }}"
                                                class="cart-image"
                                            >

                                        @else

                                            <div class="d-flex align-items-center justify-content-center h-100">

                                                <i
                                                    class="bi bi-image"
                                                    style="font-size:40px;color:#aaa;"
                                                ></i>

                                            </div>

                                        @endif

                                    </div>

                                </div>



                                {{-- INFORMATION --}}

                                <div class="col-8 col-md-5">

                                    <div class="cart-product-name">

                                        {{ $item['name'] }}

                                    </div>


                                    <div class="cart-product-price">

                                        Rs.
                                        {{ number_format($item['price'], 2) }}

                                    </div>


                                    <div class="quantity-box">

                                        <button
                                            type="button"
                                            class="quantity-btn"
                                        >
                                            −
                                        </button>


                                        <div class="quantity-number">

                                            {{ $item['quantity'] }}

                                        </div>


                                        <button
                                            type="button"
                                            class="quantity-btn"
                                        >
                                            +
                                        </button>

                                    </div>

                                </div>



                                {{-- TOTAL --}}

                                <div class="col-md-4 text-md-end">

                                    <strong>

                                        Rs.
                                        {{ number_format($item['price'] * $item['quantity'], 2) }}

                                    </strong>

                                </div>


                            </div>

                        </div>

                    @endforeach


                    <a
                        href="{{ route('signatures') }}"
                        class="continue-shopping"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Continue Shopping

                    </a>


                </div>



                {{-- =========================
                     SUMMARY
                ========================= --}}

                <div class="col-lg-4">


                    @php

                        $subtotal = 0;

                        foreach ($cart as $item) {

                            $subtotal += $item['price'] * $item['quantity'];

                        }

                    @endphp


                    <div class="cart-summary">


                        <div class="summary-title">

                            Summary

                        </div>


                        <div class="summary-row">

                            <span>
                                Subtotal
                            </span>

                            <span>

                                Rs.
                                {{ number_format($subtotal, 2) }}

                            </span>

                        </div>


                        <div class="summary-row">

                            <span>
                                Shipping
                            </span>

                            <span>
                                Free
                            </span>

                        </div>


                        <div class="summary-total">

                            <strong>
                                Total
                            </strong>

                            <strong>

                                Rs.
                                {{ number_format($subtotal, 2) }}

                            </strong>

                        </div>


                        <a
                            href="#"
                            class="checkout-btn"
                        >

                            Proceed To Checkout

                        </a>


                    </div>


                </div>


            </div>


        @else


            {{-- =========================
                 EMPTY CART
            ========================= --}}

            <div class="empty-cart">


                <i class="bi bi-bag"></i>


                <h2>

                    Your Cart Is Empty

                </h2>


                <p>

                    You haven't added any products to your cart yet.

                </p>


                <a
                    href="{{ route('signatures') }}"
                    class="shop-btn"
                >

                    Continue Shopping

                </a>


            </div>


        @endif


    </div>

</section>



{{-- =========================
     FOOTER
========================= --}}

<footer class="footer">

    <div class="container">

        <div class="row">


            <div class="col-md-6">

                <div class="footer-brand">
                    KAIRA
                </div>


                <p class="mt-3">

                    Discover timeless fashion designed
                    for modern living.

                </p>

            </div>


            <div class="col-md-6 text-md-end">

                <p>

                    © {{ date('Y') }} Kaira.
                    All Rights Reserved.

                </p>

            </div>


        </div>

    </div>

</footer>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>


</body>

</html>