<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $blog->title }} | Kaira</title>


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
           BLOG DETAIL
        ========================= */

        .blog-detail-section {
            padding: 70px 0 100px;
        }


        /* =========================
           BACK BUTTON
        ========================= */

        .back-blogs {
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


        .back-blogs i {
            transition: .3s;
        }


        .back-blogs:hover {
            color: #777;
        }


        .back-blogs:hover i {
            transform: translateX(-4px);
        }


        /* =========================
           BLOG IMAGE
        ========================= */

        .blog-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }


        .blog-image-wrapper img {
            width: 100%;
            height: 650px;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }


        .blog-image-wrapper:hover img {
            transform: scale(1.03);
        }


        /* =========================
           BLOG INFORMATION
        ========================= */

        .blog-info {
            padding: 20px 30px 20px 55px;
        }


        .blog-label {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }


        .blog-title {
           
            font-size: 52px;
            line-height: 1.1;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }


        /* =========================
           META
        ========================= */

        .blog-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }


        .blog-meta span {
            font-size: 11px;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: #888;
        }


        .blog-meta .separator {
            color: #ccc;
        }


        /* =========================
           SHORT DESCRIPTION
        ========================= */

        .blog-short-description {
            color: #777;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 30px;
        }


        /* =========================
           FULL CONTENT
        ========================= */

        .blog-content-wrapper {
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e8e8e8;
        }


        .content-label {
    font-size: 22px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #1d1919;
    margin-bottom: 15px;
}


        .blog-content {
            color: #555;
            font-size: 14px;
            line-height: 1.9;
        }


        .blog-content p {
            margin-bottom: 18px;
        }


        .blog-content h1,
        .blog-content h2,
        .blog-content h3,
        .blog-content h4,
        .blog-content h5,
        .blog-content h6 {
            font-family: 'Cormorant Garamond', serif;
            color: #111;
            margin-top: 25px;
            margin-bottom: 15px;
        }


        .blog-content img {
            max-width: 100%;
            height: auto;
        }


        /* =========================
           AUTHOR
        ========================= */

        .blog-author {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e8e8e8;
        }


        .author-label {
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 6px;
        }


        .author-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            color: #111;
        }


        /* =========================
           VIEW ALL BLOGS
        ========================= */

        .view-all-blogs {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            color: #111;
            text-decoration: none;

            margin-top: 30px;

            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;

            border-bottom: 1px solid #111;
            padding-bottom: 5px;

            transition: .3s;
        }


        .view-all-blogs:hover {
            color: #777;
            border-color: #777;
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


            .blog-info {
                padding: 40px 10px 10px;
            }


            .blog-image-wrapper img {
                height: 550px;
            }


            .blog-title {
                font-size: 45px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }


            .brand {
                font-size: 28px;
            }


            .blog-detail-section {
                padding: 40px 0 70px;
            }


            .blog-image-wrapper img {
                height: 450px;
            }


            .blog-info {
                padding: 35px 5px 10px;
            }


            .blog-title {
                font-size: 40px;
            }


            .blog-short-description,
            .blog-content {
                font-size: 14px;
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


                <a href="{{ route('cart.show') }}">
                    <i class="bi bi-bag"></i>
                </a>

            </div>

        </div>

    </div>

</nav>



{{-- =========================
     BLOG DETAIL
========================= --}}

<section class="blog-detail-section">

    <div class="container">


        {{-- BACK TO BLOGS --}}

        <a
            href="{{ route('blogs') }}"
            class="back-blogs"
        >

            <i class="bi bi-arrow-left"></i>

            Back To Blogs

        </a>



        <div class="row g-5 align-items-start">


            {{-- =========================
                 BLOG IMAGE
            ========================= --}}

            <div class="col-lg-7">

                <div class="blog-image-wrapper">


                    @if($blog->image)

                        <img
                            src="{{ asset('uploads/blogs/' . $blog->image) }}"
                            alt="{{ $blog->title }}"
                            class="blog-detail-image"
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
                 BLOG INFORMATION
            ========================= --}}

            <div class="col-lg-5">

                <div class="blog-info">


                    {{-- BLOG LABEL --}}

                    <div class="blog-label">
                        Kaira Journal
                    </div>



                    {{-- TITLE --}}

                    <h1 class="blog-title">

                        {{ $blog->title }}

                    </h1>



                    {{-- CATEGORY + DATE --}}

                    <div class="blog-meta">


                        @if($blog->category)

                            <span>
                                {{ $blog->category }}
                            </span>

                        @endif


                        @if($blog->category && $blog->created_at)

                            <span class="separator">
                                /
                            </span>

                        @endif


                        @if($blog->created_at)

                            <span>
                                {{ $blog->created_at->format('M d, Y') }}
                            </span>

                        @endif


                    </div>



                    {{-- SHORT DESCRIPTION --}}

                    @if($blog->short_description)

                        <div class="blog-short-description">

                            {{ $blog->short_description }}

                        </div>

                    @endif



                    {{-- FULL CONTENT --}}

                    @if($blog->content)

                        <div class="blog-content-wrapper">


                            <div class="content-label">
                                Article
                            </div>


                            <div class="blog-content">

                                {!! nl2br(e($blog->content)) !!}

                            </div>


                        </div>

                    @endif



                    {{-- AUTHOR --}}

                    @if($blog->author)

                        <div class="blog-author">

                            <div class="author-label">
                                Written By
                            </div>

                            <div class="author-name">
                                {{ $blog->author }}
                            </div>

                        </div>

                    @endif



                    {{-- VIEW ALL BLOGS --}}

                    <a
                        href="{{ route('blogs') }}"
                        class="view-all-blogs"
                    >

                        View All Blogs

                        <i class="bi bi-arrow-right"></i>

                    </a>


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