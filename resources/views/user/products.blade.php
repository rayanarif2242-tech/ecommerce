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

    {{-- Google Fonts --}}
   <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Montserrat:wght@300;400;500;600&display=swap"
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
.product-name {
    color: #111;
    text-decoration: none;
    font-family: 'Cormorant Garamond', serif;
    font-size: 22px;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: 500;
    display: block;
    margin-bottom: 9px;
}
.product-price {
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    letter-spacing: 0.5px;
    color: #111;
}
.products-hero h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 64px;
    font-weight: 500;
    letter-spacing: 2px;
    margin: 0 0 18px;
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
            transition: 0.3s;
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
    /* background: #f5f4f1; */
    text-align: center;
    padding-top: 25px;
    margin-top: 25px;
}

        .products-hero small {
    display: block;
    font-size: 33px;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 0px;
    color: #0d0d0d;
}

       

        

        /* =========================
           PRODUCTS HEADER
        ========================= */

        .products-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .products-count {
            font-size: 14px;
            color: #777;
            letter-spacing: 1px;
        }

        .sort-box {
            border: 1px solid #ddd;
            padding: 10px 15px;
            font-family: 'Jost', sans-serif;
            font-size: 13px;
            background: #fff;
        }

        /* =========================
           PRODUCT CARD
        ========================= */

        .product-card {
            position: relative;
            height: 100%;
            background: #fff;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f4f4f4;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }

      .product-card:hover .product-image-wrapper img {
    transform: scale(1.04);
}

        /* =========================
           WISHLIST
        ========================= */

        .wishlist-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 44px;
            height: 44px;
            border: none;
            background: rgba(255,255,255,0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            color: #111;
            z-index: 2;
            transition: 0.3s;
        }

        .wishlist-btn:hover {
            background: #111;
            color: #fff;
        }

        /* =========================
           QUICK ADD
        ========================= */

      

    

     
      

        /* =========================
           PRODUCT DETAILS
        ========================= */

        .product-details {
            padding: 18px 2px 35px;
        }

        .product-name {
            color: #111;
            text-decoration: none;
            font-size: 17px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 400;
            display: block;
            margin-bottom: 9px;
        }

        .product-name:hover {
            color: #777;
        }

        .product-price {
            font-size: 15px;
            color: #111;
        }

        .old-price {
            color: #999;
            text-decoration: line-through;
            margin-left: 8px;
        }

        /* =========================
           ADD TO CART
        ========================= */

        .add-cart-btn {
            width: 100%;
            border: 1px solid #111;
            background: #111;
            color: white;
            padding: 13px 15px;
            margin-top: 13px;
            font-size: 12px;
            letter-spacing: 2px;
            transition: 0.3s;
        }

        .add-cart-btn:hover {
            background: white;
            color: #111;
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
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            letter-spacing: 3px;
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

            .products-hero h1 {
                font-size: 45px;
            }

            .product-image-wrapper img {
                height: 390px;
            }

        }

        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }

            .brand {
                font-size: 25px;
            }

            .products-hero {
                padding: 60px 15px;
                margin-bottom: 45px;
            }

            .products-hero h1 {
                font-size: 38px;
            }

            .products-top {
                display: block;
            }

            .sort-box {
    border: 1px solid #ddd;
    padding: 10px 15px;
    font-family: 'Montserrat', sans-serif;
    font-size: 13px;
    background: #fff;
}

            .product-image-wrapper img {
                height: 400px;
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

            {{-- Logo --}}
            <a href="{{ url('/') }}" class="brand">
                KAIRA
            </a>


            {{-- Navigation --}}
            <ul class="nav-links">

                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>

                <li>
                    <a href="{{ url('/products') }}">Shop</a>
                </li>

                <li>
                    <a href="{{ url('/') }}#collections">
                        Collections
                    </a>
                </li>

                <li>
                    <a href="{{ url('/') }}#contact">
                        Contact
                    </a>
                </li>

            </ul>


            {{-- Icons --}}
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

    <small>Discover New Arrival</small>

  

</section>



{{-- =========================
     PRODUCTS
========================= --}}

<section class="container pb-5 mt-5">

    <div class="products-top">

        <div class="products-count">

            Showing
            <strong>{{ $products->count() }}</strong>
            Products

        </div>


        <select class="sort-box">

            <option>Sort by Latest</option>

            <option>Price: Low to High</option>

            <option>Price: High to Low</option>

            <option>Featured</option>

        </select>

    </div>



    <div class="row g-4">


        @forelse($products as $product)


            <div class="col-12 col-sm-6 col-lg-3">


                <div class="product-card">


                    {{-- IMAGE --}}

                    <div class="product-image-wrapper">


                        <a href="{{ url('/product/' . $product->product_id) }}">

                            <img
                                src="{{ asset('uploads/products/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                            >

                        </a>


                        {{-- Wishlist --}}

                        <button
                            type="button"
                            class="wishlist-btn"
                        >

                            <i class="bi bi-heart"></i>

                        </button>


                        {{-- Hover Add --}}

                       


                    </div>



                    {{-- DETAILS --}}

                    <div class="product-details">


                        <a
                            href="{{ url('/product/' . $product->product_id) }}"
                            class="product-name"
                        >

                            {{ $product->name }}

                        </a>



                        <div class="product-price">

                            @if($product->discount_price)

                                <span>

                                    ${{ number_format($product->discount_price, 2) }}

                                </span>

                                <span class="old-price">

                                    ${{ number_format($product->price, 2) }}

                                </span>

                            @else

                                <span>

                                    ${{ number_format($product->price, 2) }}

                                </span>

                            @endif

                        </div>



                        {{-- Normal Add To Cart --}}

                        @if($product->stock > 0)

                            <form
                                action="{{ route('cart.add') }}"
                                method="POST"
                            >

                                @csrf

                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="{{ $product->product_id }}"
                                >

                                <button
                                    type="submit"
                                    class="add-cart-btn"
                                >

                                    ADD TO CART

                                </button>

                            </form>

                        @else

                            <button
                                class="add-cart-btn"
                                disabled
                            >

                                OUT OF STOCK

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