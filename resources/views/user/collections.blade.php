<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Collections | Kaira</title>


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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >


    <style>
.add-cart-btn {
    width: 100%;
    border: none;
    background: #111;
    color: #fff;
    padding: 15px;
    font-family: 'Montserrat', sans-serif;
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
    transition: .3s;
}

.add-cart-btn:hover {
    background: #333;
}
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

        .collections-hero {
            text-align: center;
            padding-top: 45px;
            margin-bottom: 45px;
        }


       .collections-hero small {
    display: block;
    
    font-size: 33px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #111;
}


    


        /* =========================
           COLLECTION TOP
        ========================= */

        .collections-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }


        .collections-count {
            font-size: 14px;
            color: #777;
            letter-spacing: 1px;
        }


        /* =========================
           COLLECTION CARD
        ========================= */

        .collection-card {
            position: relative;
            height: 100%;
            background: #fff;
            transition: transform .3s ease;
        }


        .collection-card:hover {
            transform: translateY(-5px);
        }


        /* =========================
           IMAGE
        ========================= */

        .collection-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f4f4f4;
        }


        .collection-image-wrapper img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            display: block;
            transition: transform .6s ease;
        }


        .collection-card:hover .collection-image-wrapper img {
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
            background: rgba(255,255,255,.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            color: #111;
            z-index: 2;
            transition: .3s;
        }


        .wishlist-btn:hover {
            background: #111;
            color: #fff;
        }


        /* =========================
           DETAILS
        ========================= */

        .collection-details {
            padding: 18px 2px 35px;
        }


        .collection-name {
            color: #111;
            text-decoration: none;
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
        }


        .collection-name:hover {
            color: #777;
        }


        .collection-description {
            font-size: 14px;
            line-height: 1.7;
            color: #777;
            margin-bottom: 18px;
        }


        /* =========================
           VIEW COLLECTION
        ========================= */

        .view-collection-btn {
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


        .view-collection-btn:hover {
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

            .collection-image-wrapper img {
                height: 430px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .collections-hero {
                padding-top: 35px;
                margin-bottom: 35px;
            }


            .collections-hero small {
                font-size: 29px;
            }


            .collection-image-wrapper img {
                height: 430px;
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
                    <a href="{{ url('/products') }}">
                        Shop
                    </a>
                </li>


                <li>
                    <a href="{{ url('/collections') }}">
                        Collections
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
     HERO
========================= --}}

<section class="collections-hero">

    <small>
        Discover Collections
    </small>


</section>



{{-- =========================
     COLLECTIONS
========================= --}}

<section class="container pb-5">


    <div class="collections-top">

        <div class="collections-count">

            Showing
            <strong>{{ $collections->count() }}</strong>
            Collections

        </div>

    </div>



    <div class="row g-4">


        @forelse($collections as $collection)


            <div class="col-12 col-md-6 col-lg-4">


                <div class="collection-card">


                    {{-- IMAGE --}}

                    <div class="collection-image-wrapper">


                        <a
                            href="{{ url('/collection/' . $collection->slug) }}"
                        >

                            <img
                                src="{{ asset('uploads/collections/' . $collection->thumbnail) }}"
                                alt="{{ $collection->name }}"
                                loading="lazy"
                            >

                        </a>


                        {{-- HEART --}}

                        <button
                            type="button"
                            class="wishlist-btn"
                        >

                            <i class="bi bi-heart"></i>

                        </button>


                    </div>



                    {{-- DETAILS --}}

                    <div class="collection-details">


                        <a
                            href="{{ url('/collection/' . $collection->slug) }}"
                            class="collection-name"
                        >

                            {{ $collection->name }}

                        </a>


                        @if($collection->description)

                            <p class="collection-description">

                                {{ Str::limit($collection->description, 120) }}

                            </p>

                        @endif


                       <form action="{{ route('cart.add.product') }}" method="POST">
    @csrf

    <input
        type="hidden"
        name="product_id"
        value="{{ $collection->product_id }}"
    >

    <button
        type="submit"
        class="add-cart-btn"
    >
        <i class="bi bi-bag me-2"></i>
        ADD TO CART
    </button>
</form>


                    </div>


                </div>


            </div>


        @empty


            <div class="col-12">

                <div class="text-center py-5">

                    <i
                        class="bi bi-grid"
                        style="font-size:60px;"
                    ></i>


                    <h3 class="mt-4">

                        No Collections Found

                    </h3>


                    <p class="text-muted">

                        There are currently no collections available.

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