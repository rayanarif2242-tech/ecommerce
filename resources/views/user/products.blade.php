<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Products | Kaira</title>

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
            background: #fff;
            color: #111;
            font-family: 'Montserrat', sans-serif;
        }

        a {
            text-decoration: none;
        }

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
        }

        .nav-links {
            display: flex;
            gap: 38px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: #222;
            font-size: 14px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-icons a {
            color: #111;
            font-size: 20px;
        }

        .products-hero {
            text-align: center;
            padding: 55px 15px 45px;
        }

        .products-hero small {
            display: block;
            font-size: 13px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #777;
            margin-bottom: 12px;
        }

        .products-hero h1 {
            font-size: 60px;
            font-weight: 390;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
        }

        .products-hero p {
            color: #888;
            font-size: 13px;
            margin-top: 12px;
        }

        .products-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            padding-bottom: 18px;
            border-bottom: 1px solid #e5e5e5;
        }

        .products-count {
            font-size: 13px;
            color: #777;
            letter-spacing: 1px;
        }

        .products-count strong {
            color: #111;
            font-weight: 500;
        }

        .sort-box {
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-size: 12px;
            background: #fff;
            color: #111;
        }

        .product-card {
            position: relative;
            height: 100%;
            background: #fff;
            transition: transform .3s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f4f4f4;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 460px;
            object-fit: cover;
            display: block;
            transition: transform .6s ease;
        }

        .product-card:hover .product-image-wrapper img {
            transform: scale(1.04);
        }

        .wishlist-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 44px;
            height: 44px;
            border: none;
            background: rgba(255,255,255,.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #111;
            z-index: 2;
            cursor: pointer;
        }

        .sale-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            z-index: 2;
            background: #111;
            color: #fff;
            padding: 7px 12px;
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .product-details {
            padding: 20px 2px 35px;
        }

        .product-name {
            color: #111;
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
            display: block;
            margin-bottom: 9px;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #111;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            font-size: 12px;
        }

        .stock-status {
            margin-top: 10px;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .in-stock {
            color: #555;
        }

        .out-stock {
            color: #999;
        }

        .add-cart-btn,
        .out-stock-btn {
            width: 100%;
            height: 48px;
            margin-top: 14px;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .add-cart-btn {
            border: 1px solid #111;
            background: #111;
            color: #fff;
        }

        .add-cart-btn:hover {
            background: #fff;
            color: #111;
        }

        .out-stock-btn {
            border: 1px solid #ddd;
            background: #eee;
            color: #777;
        }

        .footer {
            margin-top: 80px;
            background: #111;
            color: #fff;
            padding: 55px 0;
        }

        .footer-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            letter-spacing: 4px;
        }

        .footer p {
            color: #aaa;
        }

        @media (max-width: 991px) {
            .nav-links {
                display: none;
            }

            .products-hero h1 {
                font-size: 48px;
            }
        }

        @media (max-width: 767px) {
            .products-hero h1 {
                font-size: 40px;
            }

            .products-top {
                display: block;
            }

            .sort-box {
                margin-top: 15px;
                width: 100%;
            }
        }
    </style>

</head>

<body>

<nav class="main-navbar">

    <div class="container">

        <div class="d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="brand">
                KAIRA
            </a>

            <ul class="nav-links">

                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('user.products') }}">Shop</a>
                </li>

                <li>
                    <a href="{{ url('/') }}#collections">Collections</a>
                </li>

                <li>
                    <a href="{{ url('/') }}#contact">Contact</a>
                </li>

            </ul>

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


<section class="products-hero">

    <small>
        Discover New Arrivals
    </small>

    <h1>
        All Products
    </h1>

    <p>
        Explore our carefully selected collection
    </p>

</section>


<section class="container pb-5">

    <div class="products-top">

        <div class="products-count">

            Showing

            <strong>
                {{ $products->count() }}
            </strong>

            Products

        </div>

        <select class="sort-box">

            <option>Sort by Latest</option>
            <option>Price: Low to High</option>
            <option>Price: High to Low</option>
            <option>Featured</option>

        </select>

    </div>


    <div class="row g-5">

        @forelse($products as $product)

            <div class="col-12 col-md-6 col-lg-4">

                <div class="product-card">

                    {{-- IMAGE --}}
                    <div class="product-image-wrapper">

                        <a href="{{ route('product.show', $product->slug) }}">

                            @if($product->image)

                                <img
                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                >

                            @else

                                <div
                                    class="d-flex align-items-center justify-content-center"
                                    style="height:460px;"
                                >
                                    <i
                                        class="bi bi-image"
                                        style="font-size:70px;color:#aaa;"
                                    ></i>
                                </div>

                            @endif

                        </a>


                        {{-- SALE --}}
                        @if($product->discount_price)

                            <div class="sale-badge">
                                Sale
                            </div>

                        @endif


                        {{-- WISHLIST --}}
                        <button
                            type="button"
                            class="wishlist-btn"
                            title="Add to Wishlist"
                        >
                            <i class="bi bi-heart"></i>
                        </button>

                    </div>


                    {{-- DETAILS --}}
                    <div class="product-details">

                        {{-- NAME --}}
                        <a
                            href="{{ route('product.show', $product->slug) }}"
                            class="product-name"
                        >
                            {{ $product->name }}
                        </a>


                        {{-- PRICE --}}
                        <div class="product-price">

                            @if($product->discount_price)

                                <span>
                                    Rs. {{ number_format($product->discount_price) }}
                                </span>

                                <span class="old-price">
                                    Rs. {{ number_format($product->price) }}
                                </span>

                            @else

                                <span>
                                    Rs. {{ number_format($product->price) }}
                                </span>

                            @endif

                        </div>


                        {{-- STOCK --}}
                        @if($product->stock > 0)

                            <div class="stock-status in-stock">
                                <i class="bi bi-check2"></i>
                                In Stock
                            </div>

                        @else

                            <div class="stock-status out-stock">
                                <i class="bi bi-x"></i>
                                Out of Stock
                            </div>

                        @endif


                        {{-- CART --}}
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

                                <input
                                    type="hidden"
                                    name="quantity"
                                    value="1"
                                >

                                <button
                                    type="submit"
                                    class="add-cart-btn"
                                >
                                    <i class="bi bi-bag"></i>
                                    Add To Cart
                                </button>

                            </form>

                        @else

                            <button
                                type="button"
                                class="out-stock-btn"
                                disabled
                            >
                                Out of Stock
                            </button>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="text-center py-5">

                    <i
                        class="bi bi-bag-x"
                        style="font-size:60px;color:#aaa;"
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>