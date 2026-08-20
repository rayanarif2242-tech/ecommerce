<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Kaira | Blog</title>


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
            position: relative;
            z-index: 10;
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
           BLOG DETAIL
        ========================= */

        .blog-detail-page {
            padding: 45px 0 90px;
        }


        /* =========================
           TOP BAR
        ========================= */

        .blog-top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 35px;
        }


        .back-blog {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            color: #111;
            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            transition: .3s;
        }


        .back-blog i {
            font-size: 16px;
            transition: .3s;
        }


        .back-blog:hover {
            color: #777;
        }


        .back-blog:hover i {
            transform: translateX(-4px);
        }


        .blog-label {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
        }


        /* =========================
           IMAGE CONTAINER
        ========================= */

        .blog-image-container {
            width: 100%;
            position: relative;
            overflow: hidden;
            background: #f4f4f4;
        }


        .blog-image-container img {
            width: 100%;
            height: 78vh;
            min-height: 500px;
            object-fit: cover;
            display: block;

            transition: transform 1s ease;
        }


        .blog-image-container:hover img {
            transform: scale(1.015);
        }


        /* =========================
           IMAGE OVERLAY
        ========================= */

        .image-overlay {
            position: absolute;
            inset: 0;

            background: linear-gradient(
                to bottom,
                rgba(0,0,0,0.05),
                rgba(0,0,0,0.02)
            );

            pointer-events: none;
        }


        /* =========================
           IMAGE NUMBER
        ========================= */

        .image-number {
            position: absolute;
            bottom: 25px;
            right: 25px;

            background: rgba(255,255,255,.92);

            padding: 10px 15px;

            font-size: 11px;
            letter-spacing: 2px;
            color: #111;
        }


        /* =========================
           BOTTOM SECTION
        ========================= */

        .blog-bottom {
            margin-top: 30px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            border-top: 1px solid #e8e8e8;
            padding-top: 22px;
        }


        .blog-bottom-text {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #888;
        }


        .all-blogs-link {
            color: #111;
            text-decoration: none;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            border-bottom: 1px solid #111;

            padding-bottom: 5px;

            transition: .3s;
        }


        .all-blogs-link:hover {
            color: #777;
            border-color: #777;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 30px;
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


            .blog-image-container img {
                height: 70vh;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .blog-detail-page {
                padding: 30px 0 60px;
            }


            .blog-top-bar {
                margin-bottom: 25px;
            }


            .blog-label {
                display: none;
            }


            .blog-image-container img {
                height: 65vh;
                min-height: 450px;
            }


            .blog-bottom {
                display: block;
            }


            .all-blogs-link {
                display: inline-block;
                margin-top: 15px;
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
     BLOG DETAIL
========================= --}}

<main class="blog-detail-page">

    <div class="container">


        {{-- TOP --}}

        <div class="blog-top-bar">


            <a
                href="{{ route('blogs') }}"
                class="back-blog"
            >

                <i class="bi bi-arrow-left"></i>

                Back To Blogs

            </a>


            <div class="blog-label">

                Kaira Journal

            </div>


        </div>



        {{-- IMAGE --}}

        <div class="blog-image-container">


            @if($blog->image)

               <img
    src="{{ asset('uploads/blogs/' . $blog->image) }}"
    alt="{{ $blog->title }}"
    class="blog-main-image"
>
            @else

                <div
                    class="d-flex align-items-center justify-content-center"
                    style="height:78vh; min-height:500px;"
                >

                    <i
                        class="bi bi-image"
                        style="font-size:80px; color:#aaa;"
                    ></i>

                </div>

            @endif


            <div class="image-overlay"></div>


            <div class="image-number">

                BLOG

            </div>


        </div>



        {{-- BOTTOM --}}

        <div class="blog-bottom">


            <div class="blog-bottom-text">

                Kaira — Journal

            </div>


            <a
                href="{{ route('blogs') }}"
                class="all-blogs-link"
            >

                View All Blogs

                <i class="bi bi-arrow-right ms-2"></i>

            </a>


        </div>


    </div>

</main>



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