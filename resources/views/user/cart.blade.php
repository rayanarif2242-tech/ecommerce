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
            background: #f7f7f7;
            color: #111;
            font-family: 'Montserrat', sans-serif;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

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


        /* =====================================================
           CART PAGE
        ===================================================== */

        .cart-page {
            padding: 45px 0 90px;
        }


        .cart-page-title {
           
            font-size: 48px;
            font-weight: 500;
            letter-spacing: 2px;
            margin: 0;
        }


        .cart-page-subtitle {
            color: #666;
            font-size: 13px;
            margin-top: 8px;
        }


        /* =====================================================
           SUCCESS MESSAGE
        ===================================================== */

        .cart-alert {
            background: #fff;
            border: 1px solid #ddd;
            padding: 14px 18px;
            margin-bottom: 25px;
            font-size: 13px;
        }


        .cart-alert i {
            color: #198754;
            margin-right: 8px;
        }


        /* =====================================================
           CART CARD
        ===================================================== */

        .cart-main-card {
            background: #fff;
            border: 1px solid #ddd;
        }


        .cart-card-header {
            padding: 20px 25px;
            border-bottom: 1px solid #e5e5e5;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .cart-card-header h2 {
            font-size: 20px;
            font-weight: 500;
            margin: 0;
        }


        .cart-card-header span {
            color: #666;
            font-size: 12px;
        }


        /* =====================================================
           CART ITEM
        ===================================================== */

        .cart-item {
            padding: 25px;
            border-bottom: 1px solid #e5e5e5;
        }


        .cart-item:last-child {
            border-bottom: none;
        }


        .cart-item-image {
            width: 150px;
            height: 180px;
            background: #f5f5f5;
            overflow: hidden;
            flex-shrink: 0;
        }


        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: .5s ease;
        }


        .cart-item-image:hover img {
            transform: scale(1.04);
        }


        .cart-item-info {
            padding-left: 20px;
        }


        .cart-item-type {
            color: #777;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }


        .cart-item-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 600;
            line-height: 1.1;
            text-transform: uppercase;
            margin-bottom: 10px;
        }


        .cart-item-price {
            font-size: 14px;
            color: #222;
            margin-bottom: 8px;
        }


        .cart-item-stock {
            color: #198754;
            font-size: 12px;
            margin-bottom: 18px;
        }


        /* =====================================================
           QUANTITY
        ===================================================== */

        .quantity-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }


        .quantity-box {
            display: inline-flex;
            align-items: center;
            height: 38px;
            border: 1px solid #bbb;
            background: #fff;
        }


        .quantity-btn {
            width: 38px;
            height: 36px;
            border: none;
            background: #fff;
            color: #111;
            font-size: 18px;
            cursor: pointer;
            transition: .2s;
        }


        .quantity-btn:hover {
            background: #f2f2f2;
        }


        .quantity-number {
            min-width: 42px;
            text-align: center;
            font-size: 13px;
            font-weight: 500;
        }


        /* =====================================================
           ITEM LINKS
        ===================================================== */

        .cart-action-link {
            color: #0066c0;
            text-decoration: none;
            font-size: 12px;
            border-left: 1px solid #ccc;
            padding-left: 12px;
        }


        .cart-action-link:hover {
            color: #c45500;
            text-decoration: underline;
        }


        .remove-link {
            color: #555;
        }


        /* =====================================================
           ITEM TOTAL
        ===================================================== */

        .item-total {
            text-align: right;
            min-width: 140px;
        }


        .item-total-label {
            font-size: 11px;
            color: #777;
            margin-bottom: 5px;
        }


        .item-total-price {
            font-size: 18px;
            font-weight: 600;
        }


        /* =====================================================
           CART FOOTER
        ===================================================== */

        .cart-card-footer {
            padding: 18px 25px;
            border-top: 1px solid #e5e5e5;
            background: #fafafa;
        }


        .clear-cart {
            color: #0066c0;
            text-decoration: none;
            font-size: 12px;
        }


        .clear-cart:hover {
            color: #c45500;
            text-decoration: underline;
        }


        .continue-shopping {
            color: #0066c0;
            text-decoration: none;
            font-size: 12px;
        }


        .continue-shopping:hover {
            color: #c45500;
            text-decoration: underline;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

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
            margin-bottom: 22px;
        }


        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 9px 0;
            font-size: 13px;
            color: #555;
        }


        .summary-row strong {
            color: #111;
        }


        .free-delivery {
            background: #f0f8f4;
            border: 1px solid #d8eee2;
            padding: 13px;
            margin: 15px 0;
            color: #198754;
            font-size: 12px;
            line-height: 1.6;
        }


        .free-delivery i {
            margin-right: 6px;
        }


        .summary-total {
            border-top: 1px solid #ddd;
            margin-top: 12px;
            padding-top: 18px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .summary-total span {
            font-size: 17px;
            font-weight: 500;
        }


        .summary-total strong {
            font-size: 22px;
        }


        .checkout-btn {
            display: block;
            width: 100%;
            margin-top: 22px;

            background: #111;
            color: #fff;

            border: none;
            padding: 16px;

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


        .secure-checkout {
            text-align: center;
            color: #777;
            font-size: 11px;
            margin-top: 15px;
        }


        .secure-checkout i {
            margin-right: 5px;
        }


        /* =====================================================
           SAVINGS BOX
        ===================================================== */

        .saving-box {
            margin-top: 15px;
            background: #fff;
            border: 1px solid #ddd;
            padding: 18px;
        }


        .saving-title {
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
        }


        .saving-text {
            font-size: 11px;
            color: #777;
            line-height: 1.7;
        }


        /* =====================================================
           EMPTY CART
        ===================================================== */

        .empty-cart-card {
            background: #fff;
            border: 1px solid #ddd;
            text-align: center;
            padding: 90px 30px;
        }


        .empty-cart-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
        }


        .empty-cart-icon i {
            font-size: 34px;
            color: #777;
        }


        .empty-cart-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 500;
            margin-bottom: 10px;
        }


        .empty-cart-text {
            color: #777;
            font-size: 13px;
            margin-bottom: 25px;
        }


        .shop-now-btn {
            display: inline-block;
            background: #111;
            color: #fff;
            padding: 15px 35px;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: .3s;
        }


        .shop-now-btn:hover {
            background: #333;
            color: #fff;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            background: #111;
            color: #fff;
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


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .nav-links {
                display: none;
            }


            .summary-card {
                position: static;
                margin-top: 25px;
            }


            .item-total {
                text-align: left;
                margin-top: 15px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .cart-page {
                padding: 30px 0 60px;
            }


            .cart-page-title {
                font-size: 40px;
            }


            .cart-item {
                padding: 18px;
            }


            .cart-item-image {
                width: 105px;
                height: 135px;
            }


            .cart-item-info {
                padding-left: 15px;
            }


            .cart-item-name {
                font-size: 21px;
            }


            .cart-item-price {
                font-size: 13px;
            }


            .cart-item-stock {
                margin-bottom: 12px;
            }


            .cart-action-link {
                font-size: 11px;
            }


            .item-total {
                margin-left: 120px;
            }


            .cart-card-header {
                padding: 16px;
            }


            .cart-card-footer {
                padding: 15px 18px;
            }


            .summary-card {
                padding: 20px;
            }


            .empty-cart-card {
                padding: 65px 20px;
            }


            .empty-cart-title {
                font-size: 36px;
            }

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



{{-- =====================================================
     CART PAGE
===================================================== --}}

<section class="cart-page">

    <div class="container">


        {{-- PAGE HEADER --}}

        <div class="mb-4">

            <h1 class="cart-page-title">
                Shopping Cart
            </h1>

            <div class="cart-page-subtitle">
                Review your items before checkout.
            </div>

        </div>



        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="cart-alert">

                <i class="bi bi-check-circle-fill"></i>

                {{ session('success') }}

            </div>

        @endif



        @if(count($cart) > 0)


            @php

                $subtotal = 0;

                foreach ($cart as $item) {

                    $subtotal +=
                        ($item['price'] ?? 0) *
                        ($item['quantity'] ?? 1);

                }

                $totalItems = 0;

                foreach ($cart as $item) {

                    $totalItems +=
                        ($item['quantity'] ?? 1);

                }

            @endphp



            <div class="row g-4">


                {{-- =================================================
                     LEFT SIDE
                ================================================= --}}

                <div class="col-lg-8">


                    <div class="cart-main-card">


                        {{-- CARD HEADER --}}

                        <div class="cart-card-header">

                            <h2>
                                Cart Items
                            </h2>

                            <span>
                                {{ $totalItems }}
                                {{ $totalItems == 1 ? 'item' : 'items' }}
                            </span>

                        </div>



                        {{-- =================================================
                             ITEMS
                        ================================================= --}}

                        @foreach($cart as $id => $item)


                            <div class="cart-item">


                                <div class="row align-items-start g-3">


                                    {{-- IMAGE --}}

                                    <div class="col-auto">

                                        <div class="cart-item-image">

                                            @if(!empty($item['image']))

                                                <img
                                                    src="{{ asset($item['image']) }}"
                                                    alt="{{ $item['name'] }}"
                                                >

                                            @else

                                                <div
                                                    class="d-flex align-items-center justify-content-center h-100"
                                                >

                                                    <i
                                                        class="bi bi-image"
                                                        style="font-size:40px;color:#aaa;"
                                                    ></i>

                                                </div>

                                            @endif

                                        </div>

                                    </div>



                                    {{-- INFORMATION --}}

                                    <div class="col">


                                        <div class="cart-item-info">


                                            {{-- TYPE --}}

                                            <div class="cart-item-type">

                                                @if(($item['type'] ?? '') === 'product')

                                                    Product

                                                @elseif(($item['type'] ?? '') === 'signature')

                                                    Signature

                                                @elseif(($item['type'] ?? '') === 'subcategory')

                                                    Collection

                                                @else

                                                    Kaira Item

                                                @endif

                                            </div>



                                            {{-- NAME --}}

                                            <div class="cart-item-name">

                                                {{ $item['name'] }}

                                            </div>



                                            {{-- PRICE --}}

                                            <div class="cart-item-price">

                                                <strong>

                                                    Rs.
                                                    {{ number_format($item['price'] ?? 0, 2) }}

                                                </strong>

                                            </div>



                                            {{-- STOCK --}}

                                            <div class="cart-item-stock">

                                                <i class="bi bi-check-circle-fill"></i>

                                                In Stock

                                            </div>



                                            {{-- QUANTITY + ACTIONS --}}

                                            <div class="quantity-wrapper">


                                                <div class="quantity-box">


                                                    {{-- DECREASE --}}

                                                    <a
                                                        href="{{ route('cart.decrease', ['id' => $id]) }}"
                                                        class="quantity-btn d-flex align-items-center justify-content-center text-decoration-none"
                                                    >

                                                        <i class="bi bi-dash"></i>

                                                    </a>



                                                    {{-- NUMBER --}}

                                                    <div class="quantity-number">

                                                        {{ $item['quantity'] }}

                                                    </div>



                                                    {{-- INCREASE --}}

                                                    <a
                                                        href="{{ route('cart.increase', ['id' => $id]) }}"
                                                        class="quantity-btn d-flex align-items-center justify-content-center text-decoration-none"
                                                    >

                                                        <i class="bi bi-plus"></i>

                                                    </a>


                                                </div>



                                                {{-- REMOVE --}}

                                                <a
                                                    href="{{ route('cart.remove', ['id' => $id]) }}"
                                                    class="cart-action-link remove-link"
                                                >

                                                    Remove

                                                </a>


                                            </div>


                                        </div>


                                    </div>



                                    {{-- ITEM TOTAL --}}

                                    <div class="col-12 col-md-auto">

                                        <div class="item-total">


                                            <div class="item-total-label">

                                                Item Total

                                            </div>


                                            <div class="item-total-price">

                                                Rs.
                                                {{ number_format(
                                                    ($item['price'] ?? 0) *
                                                    ($item['quantity'] ?? 1),
                                                    2
                                                ) }}

                                            </div>


                                        </div>

                                    </div>


                                </div>


                            </div>


                        @endforeach



                        {{-- CARD FOOTER --}}

                        <div class="cart-card-footer">

                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">


                                <a
                                    href="{{ route('signatures') }}"
                                    class="continue-shopping"
                                >

                                    <i class="bi bi-arrow-left me-1"></i>

                                    Continue Shopping

                                </a>



                                <a
                                    href="{{ route('cart.clear') }}"
                                    class="clear-cart"
                                >

                                    <i class="bi bi-trash3 me-1"></i>

                                    Clear Cart

                                </a>


                            </div>

                        </div>


                    </div>


                </div>



                {{-- =================================================
                     RIGHT SIDE SUMMARY
                ================================================= --}}

                <div class="col-lg-4">


                    <div class="summary-card">


                        <div class="summary-title">

                            Order Summary

                        </div>



                        {{-- FREE DELIVERY --}}

                        <div class="free-delivery">

                            <i class="bi bi-truck"></i>

                            <strong>Free Delivery</strong>

                            <br>

                            Your order qualifies for free shipping.

                        </div>



                        {{-- SUBTOTAL --}}

                        <div class="summary-row">

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

                                Rs.
                                {{ number_format($subtotal, 2) }}

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



                        {{-- TOTAL --}}

                        <div class="summary-total">

                            <span>
                                Order Total
                            </span>

                            <strong>

                                Rs.
                                {{ number_format($subtotal, 2) }}

                            </strong>

                        </div>



                        {{-- CHECKOUT --}}

                        <a
                            href="#"
                            class="checkout-btn"
                        >

                            Proceed To Checkout

                        </a>



                        <div class="secure-checkout">

                            <i class="bi bi-shield-check"></i>

                            Secure checkout

                        </div>


                    </div>



                    {{-- SAVINGS --}}

                    <div class="saving-box">


                        <div class="saving-title">

                            <i class="bi bi-tag me-1"></i>

                            Kaira Shopping

                        </div>


                        <div class="saving-text">

                            Enjoy a simple and secure shopping
                            experience with Kaira.

                        </div>


                    </div>


                </div>


            </div>


        @else


            {{-- =================================================
                 EMPTY CART
            ================================================= --}}

            <div class="empty-cart-card">


                <div class="empty-cart-icon">

                    <i class="bi bi-bag"></i>

                </div>


                <h2 class="empty-cart-title">

                    Your Cart Is Empty

                </h2>


                <p class="empty-cart-text">

                    There are no items in your shopping cart yet.
                    Start exploring our collection and find something
                    you love.

                </p>


                <a
                    href="{{ route('signatures') }}"
                    class="shop-now-btn"
                >

                    Continue Shopping

                </a>


            </div>


        @endif


    </div>

</section>



{{-- =====================================================
     FOOTER
===================================================== --}}

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
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>