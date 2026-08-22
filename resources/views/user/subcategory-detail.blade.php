<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $subCategory->name }} | Kaira</title>


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
           SUBCATEGORY DETAIL
           SAME AS PRODUCT DETAIL
        ========================= */

        .subcategory-detail-section {
            padding: 70px 0 100px;
        }


        .subcategory-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }


        .subcategory-image-wrapper img {
            width: 100%;
            height: 650px;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }


        .subcategory-image-wrapper:hover img {
            transform: scale(1.03);
        }


        /* =========================
           SUBCATEGORY INFO
        ========================= */

        .subcategory-info {
            padding: 20px 30px 20px 55px;
        }


        .subcategory-label {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }


        .subcategory-title {
            font-size: 52px;
            line-height: 1.1;
            font-weight: 200;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }


        .subcategory-description {
            color: #777;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 30px;
        }


        /* =========================
           CATEGORY
        ========================= */

        .category-box {
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;

            padding: 18px 0;

            margin-bottom: 30px;
        }


        .category-label {
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #000000;
    margin-bottom: 6px;
}


        .category-name {
            
            font-size: 25px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }


        /* =========================
           EXPLORE BUTTON
        ========================= */

        .explore-btn {
            width: 100%;
            border: none;
            background: #111;
            color: #fff;

            padding: 17px;

            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            text-decoration: none;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            transition: .3s;
        }


        .explore-btn:hover {
            background: #333;
            color: #fff;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-subcategory {
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


        .back-subcategory i {
            transition: .3s;
        }


        .back-subcategory:hover {
            color: #777;
        }


        .back-subcategory:hover i {
            transform: translateX(-4px);
        }


        /* =========================
           BANNER
        ========================= */

        .subcategory-banner-section {
            margin-top: 90px;
        }


        .subcategory-banner-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }


        .subcategory-banner-wrapper img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;

            transition: transform .7s ease;
        }


        .subcategory-banner-wrapper:hover img {
            transform: scale(1.03);
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


            .subcategory-info {
                padding: 40px 10px;
            }


            .subcategory-image-wrapper img {
                height: 550px;
            }


            .subcategory-title {
                font-size: 48px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .subcategory-detail-section {
                padding: 40px 0 70px;
            }


            .subcategory-image-wrapper img {
                height: 450px;
            }


            .subcategory-title {
                font-size: 40px;
            }


            .subcategory-banner-section {
                margin-top: 60px;
            }


            .subcategory-banner-wrapper img {
                height: 350px;
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
     SUBCATEGORY DETAIL
========================= --}}

<section class="subcategory-detail-section">

    <div class="container">


        {{-- BACK --}}

        <a
            href="{{ url()->previous() }}"
            class="back-subcategory"
        >

            <i class="bi bi-arrow-left"></i>

            Back

        </a>



        <div class="row g-5 align-items-center">


            {{-- =========================
                 SUBCATEGORY IMAGE
            ========================= --}}

            <div class="col-lg-7">

                <div class="subcategory-image-wrapper">


                    @if($subCategory->image)

                        <img
                            src="{{ asset('uploads/subcategories/' . $subCategory->image) }}"
                            alt="{{ $subCategory->name }}"
                        >

                    @elseif($subCategory->banner)

                        <img
                            src="{{ asset('uploads/subcategories/' . $subCategory->banner) }}"
                            alt="{{ $subCategory->name }}"
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
                 SUBCATEGORY INFORMATION
            ========================= --}}

            <div class="col-lg-5">

                <div class="subcategory-info">


                    {{-- LABEL --}}

                    <div class="subcategory-label">

                        Kaira Collection

                    </div>



                    {{-- TITLE --}}

                    <h1 class="subcategory-title">

                        {{ $subCategory->name }}

                    </h1>



                    {{-- DESCRIPTION --}}

                    @if($subCategory->description)

                        <div class="subcategory-description">

                            {!! $subCategory->description !!}

                        </div>

                    @else

                        <div class="subcategory-description">

                            Discover the timeless style and
                            carefully selected designs of our
                            {{ $subCategory->name }} collection.

                        </div>

                    @endif



                 {{-- PRICE --}}
{{-- PRICE --}}

<div class="category-box">

    <div class="category-label">
        Price
    </div>

    <div class="category-name">

        @if($subCategory->discount_price)

            {{-- Original / Actual Price --}}
            <span style="
                color:#999;
                text-decoration:line-through;
                font-size:18px;
                margin-right:10px;
            ">
                ${{ number_format($subCategory->price, 2) }}
            </span>

            {{-- Discount Price --}}
            <span style="
                color:#111;
                font-size:25px;
                font-weight:600;
            ">
                ${{ number_format($subCategory->discount_price, 2) }}
            </span>

        @else

            {{-- Regular Price --}}
            <span style="
                color:#111;
                font-size:25px;
                font-weight:600;
            ">
                ${{ number_format($subCategory->price, 2) }}
            </span>

        @endif

    </div>

</div>


                    {{-- EXPLORE --}}

<form
    action="{{ route('cart.add.subcategory') }}"
    method="POST"
>
    @csrf

    <input
        type="hidden"
        name="subcategory_id"
        value="{{ $subCategory->subcategory_id }}"
    >

    <button
        type="submit"
        class="explore-btn"
    >
        <i class="bi bi-bag me-2"></i>
        Add To Cart
    </button>

</form>
                </div>

            </div>


        </div>



        {{-- =========================
             BANNER
        ========================= --}}

      

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