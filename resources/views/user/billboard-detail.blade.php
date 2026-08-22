<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $billboard->title }} | Kaira</title>

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
            color: #888;
        }


        /* =========================
           BILLBOARD DETAIL
        ========================= */

        .billboard-detail-section {
            padding: 70px 0 100px;
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

            margin-bottom: 35px;

            transition: .3s;
        }

        .back-home i {
            transition: .3s;
        }

        .back-home:hover {
            color: #777;
        }

        .back-home:hover i {
            transform: translateX(-4px);
        }


        /* =========================
           BILLBOARD IMAGE
        ========================= */

        .billboard-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }

        .billboard-image-wrapper img {
            width: 100%;
            height: 650px;
            object-fit: cover;
            display: block;

            transition: transform .7s ease;
        }

        .billboard-image-wrapper:hover img {
            transform: scale(1.03);
        }


        /* =========================
           BILLBOARD INFORMATION
        ========================= */

        .billboard-info {
            padding: 20px 30px 20px 55px;
        }

        .billboard-label {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }

        .billboard-title {
            font-family: 'Montserrat', sans-serif;

            font-size: 52px;
            line-height: 1.1;

            font-weight: 300;

            letter-spacing: 1px;
            text-transform: uppercase;

            margin-bottom: 25px;
        }

        .billboard-subtitle {
            color: #777;

            font-size: 14px;
            line-height: 1.9;

            margin-bottom: 30px;
        }


        /* =========================
           SHOP BUTTON
        ========================= */

        .billboard-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

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

            transition: .3s;
        }

        .billboard-btn:hover {
            background: #333;
            color: #fff;
        }


        /* =========================
           BILLBOARD META
        ========================= */

        .billboard-meta {
            margin-top: 30px;
            padding-top: 25px;

            border-top: 1px solid #ddd;
        }

        .billboard-meta-item {
            font-size: 13px;
            letter-spacing: 1.5px;

            text-transform: uppercase;

            color: #222;

            margin-bottom: 15px;

            font-weight: 600;
        }

        .billboard-meta-item span {
            color: #000;

            margin-left: 8px;

            font-weight: 700;
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

            .billboard-info {
                padding: 40px 10px;
            }

            .billboard-image-wrapper img {
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

            .billboard-detail-section {
                padding: 40px 0 70px;
            }

            .billboard-image-wrapper img {
                height: 450px;
            }

            .billboard-title {
                font-size: 40px;
            }

            .billboard-meta-item {
                font-size: 12px;
                letter-spacing: 1.2px;
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
     BILLBOARD DETAIL
========================= --}}

<section class="billboard-detail-section">

    <div class="container">


        {{-- BACK --}}

        <a
            href="{{ url('/') }}"
            class="back-home"
        >

            <i class="bi bi-arrow-left"></i>

            Back To Home

        </a>



        <div class="row g-5 align-items-center">


            {{-- =========================
                 BILLBOARD IMAGE
            ========================= --}}

            <div class="col-lg-7">

                <div class="billboard-image-wrapper">

                    @if($billboard->image)

                        <img
                            src="{{ asset('uploads/billboards/' . $billboard->image) }}"
                            alt="{{ $billboard->title }}"
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
                 BILLBOARD INFORMATION
            ========================= --}}

            <div class="col-lg-5">

                <div class="billboard-info">


                    {{-- LABEL --}}

                    <div class="billboard-label">
                        Kaira Collection
                    </div>


                    {{-- TITLE --}}

                    <h1 class="billboard-title">

                        {{ $billboard->title }}

                    </h1>


                    {{-- SUBTITLE --}}

                    @if($billboard->subtitle)

                        <div class="billboard-subtitle">

                            {{ $billboard->subtitle }}

                        </div>

                    @endif


                    {{-- SHOP BUTTON --}}

                    @if($billboard->button_text)

                        <a
                            href="{{ $billboard->button_link ?? url('/') }}"
                            class="billboard-btn"
                        >

                            <i class="bi bi-bag"></i>

                            {{ $billboard->button_text }}

                        </a>

                    @endif


                    {{-- META INFORMATION --}}

                    @if(
                        $billboard->position ||
                        $billboard->start_date ||
                        $billboard->end_date
                    )

                        <div class="billboard-meta">


                            {{-- POSITION --}}

                            @if($billboard->position)

                                <div class="billboard-meta-item">

                                    Position:

                                    <span>
                                        {{ $billboard->position }}
                                    </span>

                                </div>

                            @endif


                            {{-- AVAILABLE FROM --}}

                            @if($billboard->start_date)

                                <div class="billboard-meta-item">

                                    Available From:

                                    <span>
                                        {{ \Carbon\Carbon::parse($billboard->start_date)->format('d M Y') }}
                                    </span>

                                </div>

                            @endif


                            {{-- AVAILABLE UNTIL --}}

                            @if($billboard->end_date)

                                <div class="billboard-meta-item">

                                    Available Until:

                                    <span>
                                        {{ \Carbon\Carbon::parse($billboard->end_date)->format('d M Y') }}
                                    </span>

                                </div>

                            @endif


                        </div>

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