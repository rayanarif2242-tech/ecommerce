<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Blogs | Kaira</title>

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

        .blog-hero {
            text-align: center;
            padding-top: 55px;
            margin-bottom: 50px;
        }

        .blog-hero small {
            display: block;
            font-size: 33px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #111;
        }

        .blog-hero p {
            max-width: 650px;
            margin: 15px auto 0;
            color: #777;
            font-size: 14px;
            line-height: 1.8;
        }

        /* =========================
           BLOG TOP
        ========================= */

        .blogs-top {
            margin-bottom: 30px;
        }

        .blogs-count {
            font-size: 14px;
            color: #777;
            letter-spacing: 1px;
        }

        /* =========================
           BLOG CARD
        ========================= */

        .blog-card {
            height: 100%;
            background: #fff;
            transition: transform .3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        /* =========================
           IMAGE
        ========================= */

        .blog-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f4f4f4;
        }

        .blog-image-wrapper img {
            width: 100%;
            height: 430px;
            object-fit: cover;
            display: block;
            transition: transform .6s ease;
        }

        .blog-card:hover .blog-image-wrapper img {
            transform: scale(1.05);
        }

        /* =========================
           DATE
        ========================= */

        .blog-date {
            position: absolute;
            left: 18px;
            bottom: 18px;
            background: #fff;
            padding: 10px 15px;
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* =========================
           DETAILS
        ========================= */

        .blog-details {
            padding: 20px 2px 40px;
        }

        .blog-title {
            color: #111;
            text-decoration: none;
            font-family: 'Cormorant Garamond', serif;
            font-size: 30px;
            line-height: 1.15;
            letter-spacing: 1px;
            text-transform: uppercase;
            font-weight: 500;
            display: block;
            margin-bottom: 12px;
        }

        .blog-title:hover {
            color: #777;
        }

        .blog-description {
            font-size: 14px;
            line-height: 1.8;
            color: #777;
            margin-bottom: 18px;
        }

        /* =========================
           READ MORE
        ========================= */

        .read-blog-btn {
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

        .read-blog-btn:hover {
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

            .blog-image-wrapper img {
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

            .blog-hero {
                padding-top: 35px;
                margin-bottom: 35px;
            }

            .blog-hero small {
                font-size: 27px;
            }

            .blog-image-wrapper img {
                height: 430px;
            }

            .blog-title {
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

<section class="blog-hero">

    <small>
        Journal & Stories
    </small>

    <p>
        Discover the latest stories, fashion inspiration,
        style guides and ideas from Kaira.
    </p>

</section>



{{-- =========================
     BLOGS
========================= --}}

<section class="container pb-5">


    <div class="blogs-top">

        <div class="blogs-count">

            Showing
            <strong>{{ $blogs->count() }}</strong>
            {{ $blogs->count() == 1 ? 'Blog' : 'Blogs' }}

        </div>

    </div>



    <div class="row g-4">


        @forelse($blogs as $blog)


            <div class="col-12 col-md-6 col-lg-4">


                <article class="blog-card">


                    {{-- IMAGE --}}

                    <div class="blog-image-wrapper">

                        <a
                            href="{{ route('blog.show', $blog->slug) }}"
                        >

                            <img
                                src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                alt="{{ $blog->title }}"
                                loading="lazy"
                            >

                        </a>


                        @if($blog->created_at)

                            <div class="blog-date">

                                {{ $blog->created_at->format('M d, Y') }}

                            </div>

                        @endif

                    </div>



                    {{-- DETAILS --}}

                    <div class="blog-details">


                        <a
                            href="{{ route('blog.show', $blog->slug) }}"
                            class="blog-title"
                        >

                            {{ $blog->title }}

                        </a>


                        @if($blog->description)

                            <p class="blog-description">

                                {{ Str::limit(strip_tags($blog->description), 130) }}

                            </p>

                        @endif


                        <a
                            href="{{ route('blog.show', $blog->slug) }}"
                            class="read-blog-btn"
                        >

                            Read Article

                            <i class="bi bi-arrow-right ms-2"></i>

                        </a>


                    </div>


                </article>


            </div>


        @empty


            <div class="col-12">

                <div class="text-center py-5">

                    <i
                        class="bi bi-journal-text"
                        style="font-size:60px;"
                    ></i>


                    <h3 class="mt-4">
                        No Blogs Found
                    </h3>


                    <p class="text-muted">
                        There are currently no blog posts available.
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