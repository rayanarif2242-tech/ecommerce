<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Newsletter & Suggestions | Kaira</title>

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
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Montserrat:wght@400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Montserrat', sans-serif;
            background: #fff;
            color: #222;
        }

        .page-title {
           
            font-size: 55px;
            font-weight: 600;
        }

        .newsletter-box {
            background: #f8f8f6;
            padding: 60px;
            border-radius: 4px;
        }

        .newsletter-box h2 {
            
            font-size: 42px;
        }

        .newsletter-input {
            height: 55px;
            border: 1px solid #ddd;
            border-radius: 0;
        }

        .subscribe-btn {
            height: 55px;
            border-radius: 0;
            padding: 0 30px;
        }

        .category-card {
            position: relative;
            overflow: hidden;
            height: 320px;
            background: #f4f4f4;
        }

        .category-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s ease;
        }

        .category-card:hover img {
            transform: scale(1.06);
        }

        .category-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(0,0,0,.7),
                rgba(0,0,0,.05)
            );

            display: flex;
            align-items: flex-end;
            padding: 30px;
        }

        .category-overlay h3 {
            color: #fff;
            font-family: 'Cormorant Garamond', serif;
            font-size: 38px;
            margin: 0;
        }

        .category-overlay a {
            color: #fff;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .suggestion-title {
           
            font-size: 45px;
        }

        .back-link {
            color: #222;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>


{{-- PAGE HEADER --}}

<section class="py-5">

    <div class="container">

        <div class="mb-4">

            <a
                href="{{ url()->previous() }}"
                class="back-link"
            >
                <i class="bi bi-arrow-left me-2"></i>
                BACK
            </a>

        </div>

        <div class="text-center py-4">

            <p class="text-uppercase small text-muted mb-2">
                Stay Connected
            </p>

            <h1 class="page-title">
                Newsletter & Suggestions
            </h1>

            <p class="text-muted mx-auto" style="max-width: 650px;">
                Get the latest collections, exclusive offers and
                fashion inspiration directly in your inbox.
            </p>

        </div>

    </div>

</section>


{{-- NEWSLETTER --}}

<section class="pb-5">

    <div class="container">

        <div class="newsletter-box">

            <div class="row align-items-center">

                <div class="col-lg-5 mb-4 mb-lg-0">

                    <span class="text-uppercase small text-muted">
                        Kaira Newsletter
                    </span>

                    <h2 class="mt-2">
                        Discover what's new.
                    </h2>

                    <p class="text-muted mb-0">
                        Subscribe to receive updates about new arrivals,
                        exclusive collections and special offers.
                    </p>

                </div>


                <div class="col-lg-7">

                    @if(session()->has('newsletter_success'))

                        <div
                            class="alert alert-success"
                            role="alert"
                        >
                            <i class="bi bi-check-circle me-2"></i>

                            {{ session('newsletter_success') }}
                        </div>

                    @endif


                    @if($errors->has('email'))

                        <div
                            class="alert alert-danger"
                            role="alert"
                        >
                            <i class="bi bi-exclamation-circle me-2"></i>

                            {{ $errors->first('email') }}
                        </div>

                    @endif


                    <form
                        action="{{ route('newsletter.subscribe') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="input-group">

                            <input
                                type="email"
                                name="email"
                                class="form-control newsletter-input"
                                placeholder="Your Email Address"
                                value="{{ old('email') }}"
                                required
                            >

                            <button
                                type="submit"
                                class="btn btn-dark subscribe-btn text-uppercase"
                            >
                                Subscribe
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- SUGGESTIONS --}}

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <p class="text-uppercase small text-muted mb-2">
                Explore Kaira
            </p>

            <h2 class="suggestion-title">
                What are you looking for?
            </h2>

            <p class="text-muted">
                Explore our collections and find something made for you.
            </p>

        </div>


        <div class="row g-4">


            {{-- MEN --}}

            <div class="col-md-4">

                <div class="category-card">

                    <img
                        src="{{ asset('homes/images/cat-item1.jpg') }}"
                        alt="Men"
                    >

                    <div class="category-overlay">

                        <div>

                            <h3>
                                Men
                            </h3>

                            <a href="{{ route('user.products') }}">
                                Shop Collection
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- WOMEN --}}

            <div class="col-md-4">

                <div class="category-card">

                    <img
                        src="{{ asset('homes/images/cat-sm-item2.jpg') }}"
                        alt="Women"
                    >

                    <div class="category-overlay">

                        <div>

                            <h3>
                                Women
                            </h3>

                            <a href="{{ route('user.products') }}">
                                Shop Collection
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FRAGRANCE --}}

            <div class="col-md-4">

                <div class="category-card">

                    <img
                        src="{{ asset('homes/images/cat-large-item3.jpg') }}"
                        alt="Fragrance"
                    >

                    <div class="category-overlay">

                        <div>

                            <h3>
                                Fragrance
                            </h3>

                            <a href="{{ route('user.products') }}">
                                Shop Collection
                                <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


</body>
</html>