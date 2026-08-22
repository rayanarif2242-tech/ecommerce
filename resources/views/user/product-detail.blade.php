<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} | Kaira</title>

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
           PRODUCT DETAIL
        ========================= */

        .product-detail-section {
            padding: 70px 0 100px;
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 650px;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }

        .product-image-wrapper:hover img {
            transform: scale(1.03);
        }


        /* =========================
           PRODUCT INFORMATION
        ========================= */

        .product-info {
            padding: 20px 30px 20px 55px;
        }

        .product-label {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }

        .product-title {
            font-size: 52px;
            line-height: 1.1;
            font-weight: 200;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 18px;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            margin-right: 12px;
        }

        .discount-price {
            font-size: 24px;
            font-weight: 600;
        }

        .product-description {
            color: #777;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 30px;
        }


        /* =========================
           STOCK
        ========================= */

        .stock-status {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        .stock-in {
            color: #333;
        }

        .stock-out {
            color: #999;
        }


        /* =========================
           QUANTITY
        ========================= */

        .quantity-wrapper {
            margin-bottom: 20px;
        }

        .quantity-label {
            display: block;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 100px;
            height: 48px;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        .quantity-input:focus {
            outline: none;
            border-color: #111;
        }


        /* =========================
           ADD TO CART
        ========================= */

        .add-cart-btn {
            width: 100%;
            border: none;
            background: #111;
            color: #fff;
            padding: 17px;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: .3s;
        }

        .add-cart-btn:hover {
            background: #333;
        }

        .out-cart-btn {
            width: 100%;
            border: none;
            background: #aaa;
            color: #fff;
            padding: 17px;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-products {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            color: #111;
            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            margin-bottom: 35px;

            transition: .3s;
        }

        .back-products i {
            transition: .3s;
        }

        .back-products:hover {
            color: #777;
        }

        .back-products:hover i {
            transform: translateX(-4px);
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

            .product-info {
                padding: 40px 10px;
            }

            .product-image-wrapper img {
                height: 550px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }

            .brand {
                font-size: 28px;
            }

            .product-detail-section {
                padding: 40px 0 70px;
            }

            .product-image-wrapper img {
                height: 450px;
            }

            .product-title {
                font-size: 40px;
            }

            .nav-icons {
                gap: 15px;
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
                    <a href="{{ route('user.products') }}">
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
                     <a href="{{ route('contact') }}">
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

                <a href="#">
                    <i class="bi bi-bag"></i>
                </a>

            </div>

        </div>

    </div>

</nav>



{{-- =========================
     PRODUCT DETAIL
========================= --}}

<section class="product-detail-section">

    <div class="container">


        {{-- BACK TO PRODUCTS --}}

        <a
            href="{{ route('user.products') }}"
            class="back-products"
        >

            <i class="bi bi-arrow-left"></i>

            Back To Products

        </a>



        <div class="row g-5 align-items-center">


            {{-- =========================
                 PRODUCT IMAGE
            ========================= --}}

            <div class="col-lg-7">

                <div class="product-image-wrapper">

                    @if($product->image)

                        <img
                            src="{{ asset('uploads/products/' . $product->image) }}"
                            alt="{{ $product->name }}"
                        >

                    @else

                        <div
                            class="d-flex align-items-center justify-content-center"
                            style="height:650px;"
                        >

                            <i
                                class="bi bi-image"
                                style="font-size:80px;color:#aaa;"
                            ></i>

                        </div>

                    @endif

                </div>

            </div>



            {{-- =========================
                 PRODUCT INFORMATION
            ========================= --}}

            <div class="col-lg-5">

                <div class="product-info">


                    {{-- PRODUCT LABEL --}}

                    <div class="product-label">
                        Kaira Collection
                    </div>


                    {{-- PRODUCT NAME --}}

                    <h1 class="product-title">
                        {{ $product->name }}
                    </h1>


                    {{-- PRICE --}}

                   <div class="product-price">

    @if($product->discount_price)

        {{-- Actual Price --}}
        <span class="old-price">
            Rs. {{ number_format($product->price, 2) }}
        </span>

        {{-- Discount Price --}}
        <span class="discount-price">
            Rs. {{ number_format($product->discount_price, 2) }}
        </span>

    @else

        <span class="discount-price">
            Rs. {{ number_format($product->price, 2) }}
        </span>

    @endif

</div>


                    {{-- DESCRIPTION --}}

                    @if($product->description)

                        <div class="product-description">

                            {!! $product->description !!}

                        </div>

                    @endif


                    {{-- STOCK STATUS --}}

                  

                    {{-- =========================
                         ADD TO CART
                    ========================= --}}

                    @if($product->stock > 0)

                        <form
                            action="{{ route('cart.add.product') }}"
                            method="POST"
                        >

                            @csrf


                            <input
                                type="hidden"
                                name="product_id"
                                value="{{ $product->product_id }}"
                            >


                            {{-- QUANTITY --}}

                            <div class="quantity-wrapper">

                                <label
                                    for="quantity"
                                    class="quantity-label"
                                >
                                    Quantity
                                </label>

                                <input
                                    type="number"
                                    id="quantity"
                                    name="quantity"
                                    value="1"
                                    min="1"
                                    max="{{ $product->stock }}"
                                    class="quantity-input"
                                >

                            </div>


                            {{-- ADD BUTTON --}}

                            <button
                                type="submit"
                                class="add-cart-btn"
                            >

                                <i class="bi bi-bag me-2"></i>

                                Add To Cart

                            </button>

                        </form>

                    @else

                        <button
                            type="button"
                            class="out-cart-btn"
                            disabled
                        >

                            <i class="bi bi-bag me-2"></i>

                            Out of Stock

                        </button>

                    @endif


                </div>

            </div>


        </div>

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