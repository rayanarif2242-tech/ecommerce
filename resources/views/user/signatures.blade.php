<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Products | Kaira</title>


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
        }


        /* =========================
           HERO
        ========================= */

        .products-hero {
            text-align: center;
            padding-top: 55px;
            margin-bottom: 50px;
        }


        .products-hero small {
            display: block;
            font-size: 33px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #111;
        }


        .products-hero p {
            max-width: 650px;
            margin: 15px auto 0;
            color: #777;
            font-size: 14px;
            line-height: 1.8;
        }


        /* =========================
           PRODUCTS TOP
        ========================= */

        .products-top {
            margin-bottom: 30px;
        }


        .products-count {
            font-size: 14px;
            color: #777;
            letter-spacing: 1px;
        }


        /* =========================
           PRODUCT CARD
        ========================= */

        .product-card {
            height: 100%;
            background: #fff;
            transition: transform .3s ease;
        }


        .product-card:hover {
            transform: translateY(-5px);
        }


        /* =========================
           IMAGE
        ========================= */

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f4f4f4;
        }


        .product-image-wrapper img {
            width: 100%;
            height: 430px;
            object-fit: cover;
            display: block;
            transition: transform .6s ease;
        }


        .product-card:hover .product-image-wrapper img {
            transform: scale(1.05);
        }


        /* =========================
           WISHLIST
        ========================= */

        .wishlist-btn {
            position: absolute;
            top: 18px;
            right: 18px;

            width: 44px;
            height: 44px;

            border: none;
            border-radius: 50%;

            background: rgba(255,255,255,.95);

            display: flex;
            align-items: center;
            justify-content: center;

            color: #111;
            font-size: 18px;

            z-index: 5;

            transition: .3s;
        }


        .wishlist-btn:hover {
            background: #111;
            color: #fff;
        }


        /* =========================
           PRODUCT DETAILS
        ========================= */

        .product-details {
            padding: 20px 2px 40px;
        }


        .product-name {
            color: #111;
            text-decoration: none;

        

            font-size: 24px;
            line-height: 1.15;

            letter-spacing: 1px;
            text-transform: uppercase;

            font-weight: 500;

            display: block;

            margin-bottom: 12px;

            transition: .3s;
        }


        .product-name:hover {
            color: #777;
        }


        .product-description {
            font-size: 14px;
            line-height: 1.8;
            color: #777;
            margin-bottom: 15px;
        }


        /* =========================
           PRICE
        ========================= */

        .product-price {
            font-size: 15px;
            letter-spacing: 1px;
            color: #111;
            margin-bottom: 18px;
        }


        .old-price {
            color: #999;
            text-decoration: line-through;
            margin-right: 8px;
        }


        .sale-price {
            font-weight: 500;
        }


        /* =========================
           VIEW PRODUCT
        ========================= */

        .view-product-btn {
            display: inline-block;

            color: #111;
            text-decoration: none;

            border-bottom: 1px solid #111;

            padding-bottom: 5px;

            font-size: 12px;

            letter-spacing: 2px;

            text-transform: uppercase;

            transition: .3s;
        }


        .view-product-btn:hover {
            color: #777;
            border-color: #777;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 80px;
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


            .product-image-wrapper img {
                height: 420px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .products-hero {
                padding-top: 35px;
                margin-bottom: 35px;
            }


            .products-hero small {
                font-size: 27px;
            }


            .product-image-wrapper img {
                height: 430px;
            }


            .product-name {
                font-size: 27px;
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


                <a href="#">
                    <i class="bi bi-bag"></i>
                </a>

            </div>

        </div>

    </div>

</nav>



{{-- =========================
     HERO
========================= --}}

<section class="products-hero">

    <small>
        Kaira Collection
    </small>


    <p>
        Discover our carefully selected products,
        timeless designs and signature styles created
        for modern living.
    </p>

</section>



{{-- =========================
     PRODUCTS
========================= --}}

<section class="container pb-5">


    <div class="products-top">

        <div class="products-count">

            Showing

            <strong>
                {{ $signatures->count() }}
            </strong>

            {{ $signatures->count() == 1 ? 'Product' : 'Products' }}

        </div>

    </div>



    <div class="row g-4">


        @forelse($signatures as $signature)


            <div class="col-12 col-md-6 col-lg-4">


                <article class="product-card">


                    {{-- PRODUCT IMAGE --}}

                    <div class="product-image-wrapper">


                        <a
                            href="{{ route('signature.show', $signature->signature_id) }}"
                        >

                            <img
                                src="{{ asset($signature->image) }}"
                                alt="{{ $signature->product_name }}"
                                loading="lazy"
                            >

                        </a>


                        {{-- WISHLIST --}}

                        <button
                            type="button"
                            class="wishlist-btn"
                        >

                            <i class="bi bi-heart"></i>

                        </button>


                    </div>



                    {{-- PRODUCT DETAILS --}}

                    <div class="product-details">


                        <a
                            href="{{ route('signature.show', $signature->signature_id) }}"
                            class="product-name"
                        >

                            {{ $signature->product_name }}

                        </a>


                        @if($signature->description)

                            <p class="product-description">

                                {{ Str::limit(strip_tags($signature->description), 130) }}

                            </p>

                        @endif



                        {{-- PRICE --}}

                        <div class="product-price">


                            @if($signature->discount_price)

                                <span class="old-price">

                                    Rs. {{ number_format($signature->price, 2) }}

                                </span>


                                <span class="sale-price">

                                    Rs. {{ number_format($signature->discount_price, 2) }}

                                </span>

                            @else

                                <span class="sale-price">

                                    Rs. {{ number_format($signature->price, 2) }}

                                </span>

                            @endif


                        </div>



                        {{-- VIEW PRODUCT --}}

                        <a
                            href="{{ route('signature.show', $signature->signature_id) }}"
                            class="view-product-btn"
                        >

                            View Product

                            <i class="bi bi-arrow-right ms-2"></i>

                        </a>


                    </div>


                </article>


            </div>


        @empty


            <div class="col-12">


                <div class="text-center py-5">


                    <i
                        class="bi bi-bag"
                        style="font-size:60px;"
                    ></i>


                    <h3 class="mt-4">

                        No Products Found

                    </h3>


                    <p class="text-muted">

                        There are currently no products available.

                    </p>


                </div>

            </div>


        @endforelse


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