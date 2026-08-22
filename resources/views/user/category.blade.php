<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $category->name }} | Kaira</title>

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
           PAGE HEADER
        ========================= */

        .category-header {
            padding: 80px 0 55px;
            text-align: center;
        }

        .category-label {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 18px;
        }

        .category-title {
           
            font-size: 64px;
            font-weight: 390;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0 0 15px;
        }

        .category-description {
            max-width: 650px;
            margin: auto;
            color: #777;
            font-size: 14px;
            line-height: 1.9;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            color: #111;
            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            margin-bottom: 50px;

            transition: .3s;
        }

        .back-home i {
            transition: .3s;
        }

        .back-home:hover {
            color: #777;
        }

        .back-home:hover i {
            transform: translateX(-5px);
        }


        /* =========================
           SUBCATEGORY SECTION
        ========================= */

        .subcategory-section {
            padding: 0 0 100px;
        }


        /* =========================
           SUBCATEGORY CARD
        ========================= */

        .subcategory-card {
            text-decoration: none;
            color: #111;
            display: block;
        }

        .subcategory-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }

        .subcategory-image-wrapper img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }

        .subcategory-card:hover img {
            transform: scale(1.04);
        }


        /* =========================
           OVERLAY
        ========================= */

        .subcategory-overlay {
            position: absolute;
            inset: 0;

            background: rgba(0, 0, 0, 0);

            display: flex;
            align-items: flex-end;
            justify-content: center;

            padding: 30px;

            transition: .4s ease;
        }

        .subcategory-card:hover .subcategory-overlay {
            background: rgba(0, 0, 0, .18);
        }


        /* =========================
           EXPLORE BUTTON
        ========================= */

        .explore-btn {
            background: #fff;
            color: #111;

            padding: 13px 25px;

            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;

            opacity: 0;
            transform: translateY(15px);

            transition: .4s ease;
        }

        .subcategory-card:hover .explore-btn {
            opacity: 1;
            transform: translateY(0);
        }


        /* =========================
           SUBCATEGORY INFO
        ========================= */

        .subcategory-info {
            padding: 20px 5px 35px;
        }

        .subcategory-name {
         
            font-size: 30px;
            font-weight: 390;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin: 0 0 7px;
        }

        .subcategory-text {
            font-size: 11px;
            color: #888;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state i {
            font-size: 55px;
            color: #aaa;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 35px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #888;
            font-size: 14px;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111;
            color: #fff;
            padding: 60px 0;
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
            line-height: 1.8;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .nav-links {
                display: none;
            }

            .category-title {
                font-size: 52px;
            }

            .subcategory-image-wrapper img {
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

            .category-header {
                padding: 55px 0 40px;
            }

            .category-title {
                font-size: 42px;
            }

            .category-description {
                padding: 0 20px;
            }

            .subcategory-image-wrapper img {
                height: 430px;
            }

            .subcategory-name {
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
     CATEGORY HEADER
========================= --}}

<section class="category-header">

    <div class="container">


        {{-- BACK BUTTON --}}

        


        <div class="category-label">
            Kaira Collection
        </div>


        <h1 class="category-title">

            {{ $category->name }}

        </h1>


        @if($category->description)

            <div class="category-description">

                {!! $category->description !!}

            </div>

        @else

            <div class="category-description">

                Explore our {{ $category->name }} collection,
                carefully curated for timeless style and modern living.

            </div>

        @endif


    </div>

</section>



{{-- =========================
     SUBCATEGORIES
========================= --}}

<section class="subcategory-section">

    <div class="container">


        @if($subCategories->count() > 0)

            <div class="row g-4">


                @foreach($subCategories as $subCategory)

                    <div class="col-md-6 col-lg-4">


                        <a
                            href="{{ route('subcategory.show', $subCategory->slug) }}"
                            class="subcategory-card"
                        >


                            {{-- IMAGE --}}

                            <div class="subcategory-image-wrapper">


                                @if($subCategory->image)

                                    <img
                                        src="{{ asset('uploads/subcategories/' . $subCategory->image) }}"
                                        alt="{{ $subCategory->name }}"
                                    >

                                @else

                                    <div
                                        class="d-flex align-items-center justify-content-center"
                                        style="height:500px;"
                                    >

                                        <i
                                            class="bi bi-image"
                                            style="font-size:70px;color:#aaa;"
                                        ></i>

                                    </div>

                                @endif


                                {{-- HOVER OVERLAY --}}

                                <div class="subcategory-overlay">

                                    <span class="explore-btn">

                                        Explore Collection

                                    </span>

                                </div>


                            </div>


                            {{-- INFO --}}

                            <div class="subcategory-info">

                                <h2 class="subcategory-name">

                                    {{ $subCategory->name }}

                                </h2>


                                <div class="subcategory-text">

                                    Discover {{ $subCategory->name }}

                                </div>

                            </div>


                        </a>

                    </div>

                @endforeach


            </div>


        @else


            {{-- NO SUBCATEGORIES --}}

            <div class="empty-state">

                <i class="bi bi-grid"></i>

                <h3>
                    No Collections Available
                </h3>

                <p>
                    There are currently no subcategories available
                    in this collection.
                </p>

            </div>


        @endif


    </div>

</section>



{{-- =========================
     FOOTER
========================= --}}

<footer class="footer">

    <div class="container">

        <div class="row align-items-center">


            <div class="col-md-6">

                <div class="footer-brand">
                    KAIRA
                </div>

                <p class="mt-3 mb-0">

                    Discover timeless fashion designed
                    for modern living.

                </p>

            </div>


            <div class="col-md-6 text-md-end">

                <p class="mb-0">

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