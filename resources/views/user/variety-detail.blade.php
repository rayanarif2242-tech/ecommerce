<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $variety->title }} | Kaira</title>

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

        /* =========================
           NAV ICONS
        ========================= */

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
            position: relative;
            cursor: pointer;
        }

        .nav-icons a:hover {
            color: #777;
        }

        /* =========================
           SEARCH OVERLAY
        ========================= */

        .search-overlay {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;

            background: rgba(255, 255, 255, 0.98);

            z-index: 99999;

            display: none;

            align-items: flex-start;
            justify-content: center;

            padding-top: 110px;
        }

        .search-overlay.active {
            display: flex;
        }

        .search-box {
            width: 90%;
            max-width: 850px;
            position: relative;
        }

        .search-close {
            position: absolute;

            top: -60px;
            right: 0;

            width: 40px;
            height: 40px;

            border: none;
            background: transparent;

            font-size: 24px;

            color: #111;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-close:hover {
            color: #777;
        }

        .search-title {
            font-family: 'Cormorant Garamond', serif;

            font-size: 42px;

            text-align: center;

            margin-bottom: 30px;
        }

        .search-input-wrapper {
            display: flex;

            align-items: center;

            border-bottom: 1px solid #111;

            padding: 12px 5px;
        }

        .search-input-wrapper i {
            font-size: 20px;

            margin-right: 15px;
        }

        .search-input-wrapper input {
            width: 100%;

            border: none;
            outline: none;

            background: transparent;

            font-family: 'Montserrat', sans-serif;

            font-size: 16px;
        }

        .search-input-wrapper input::placeholder {
            color: #999;
        }

        /* =========================
           SEARCH RESULTS
        ========================= */

        .search-results {
            margin-top: 25px;

            max-height: 500px;

            overflow-y: auto;
        }

        .search-result-item {
            display: flex;

            align-items: center;

            gap: 18px;

            padding: 15px 5px;

            border-bottom: 1px solid #eee;

            color: #111;

            text-decoration: none;

            transition: .2s;
        }

        .search-result-item:hover {
            background: #f8f8f8;
        }

        .search-result-image {
            width: 70px;
            height: 80px;

            object-fit: cover;

            background: #f5f5f5;

            flex-shrink: 0;
        }

        .search-result-info {
            flex: 1;
        }

        .search-result-name {
            font-size: 14px;

            font-weight: 500;

            margin-bottom: 5px;
        }

        .search-result-type {
            font-size: 10px;

            color: #999;

            text-transform: uppercase;

            letter-spacing: 1px;
        }

        .search-result-price {
            font-size: 13px;

            color: #555;

            white-space: nowrap;
        }

        .search-no-result {
            text-align: center;

            padding: 40px;

            color: #888;

            font-size: 13px;
        }

        /* =========================
           DETAIL SECTION
        ========================= */

        .variety-detail-section {
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

        .back-home:hover {
            color: #777;
        }

        .back-home i {
            transition: .3s;
        }

        .back-home:hover i {
            transform: translateX(-4px);
        }

        /* =========================
           IMAGE
        ========================= */

        .variety-image-wrapper {
            position: relative;

            overflow: hidden;

            background: #f5f5f5;
        }

        .variety-image-wrapper img {
            width: 100%;

            height: 650px;

            object-fit: cover;

            display: block;

            transition: transform .7s ease;
        }

        .variety-image-wrapper:hover img {
            transform: scale(1.03);
        }

        /* =========================
           INFORMATION
        ========================= */

        .variety-info {
            padding: 20px 30px 20px 55px;
        }

        .variety-label {
            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            color: #888;

            margin-bottom: 15px;
        }

        .variety-title {
            font-size: 52px;

            line-height: 1.1;

            font-weight: 300;

            letter-spacing: 1px;

            text-transform: uppercase;

            margin-bottom: 25px;
        }

        .variety-subtitle {
            color: #777;

            font-size: 14px;

            line-height: 1.9;

            margin-bottom: 30px;
        }

        /* =========================
           PRODUCT BUTTON
        ========================= */

        .variety-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            width: 100%;

            border: none;

            background: #111;

            color: #fff;

            padding: 17px;

            font-size: 12px;

            letter-spacing: 2px;

            text-transform: uppercase;

            text-decoration: none;

            transition: .3s;
        }

        .variety-btn:hover {
            background: #333;

            color: #fff;
        }

        /* =========================
           PRODUCT INFORMATION
        ========================= */

        .product-info {
            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #ddd;
        }

        .product-info-title {
            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            color: #888;

            margin-bottom: 10px;
        }

        .product-name {
            font-size: 20px;

            font-weight: 500;
        }

        .product-price {
            margin-top: 8px;

            font-size: 15px;

            color: #555;
        }

        /* =========================
           COMING SOON
        ========================= */

        .coming-soon-box {
            width: 100%;

            padding: 22px 25px;

            border: 1px solid #111;

            background: #fff;

            color: #111;

            display: flex;

            align-items: center;

            gap: 14px;

            text-transform: uppercase;

            letter-spacing: 2px;
        }

        .coming-soon-box i {
            font-size: 18px;
        }

        .coming-soon-box span {
            font-size: 12px;

            font-weight: 600;
        }

        .coming-soon-box small {
            margin-left: auto;

            color: #888;

            font-size: 10px;

            letter-spacing: 1px;

            text-transform: none;
        }

        /* =========================
           META
        ========================= */

        .variety-meta {
            margin-top: 30px;

            padding-top: 25px;

            border-top: 1px solid #ddd;
        }

        .meta-item {
            font-size: 12px;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            color: #777;

            margin-bottom: 15px;
        }

        .meta-item strong {
            color: #111;

            font-weight: 600;

            margin-left: 5px;
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

            .variety-info {
                padding: 40px 10px;
            }

            .variety-image-wrapper img {
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

            .variety-detail-section {
                padding: 40px 0 70px;
            }

            .variety-image-wrapper img {
                height: 450px;
            }

            .variety-title {
                font-size: 40px;
            }

            .coming-soon-box {
                flex-wrap: wrap;

                gap: 10px;
            }

            .coming-soon-box small {
                width: 100%;

                margin-left: 32px;
            }

            .search-overlay {
                padding-top: 90px;
            }

            .search-box {
                width: 92%;
            }

            .search-title {
                font-size: 34px;
            }

            .search-result-image {
                width: 60px;
                height: 70px;
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
                    <a href="{{ route('user.products') }}">
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

                {{-- SEARCH --}}

                <a
                    href="javascript:void(0)"
                    id="openSearch"
                    aria-label="Search"
                >
                    <i class="bi bi-search"></i>
                </a>


                {{-- PROFILE --}}

                <a
                    href="{{ route('newsletter.index') }}"
                    aria-label="Profile"
                >
                    <i class="bi bi-person"></i>
                </a>


                {{-- CART --}}

                <a
                    href="{{ route('cart.show') }}"
                    aria-label="Cart"
                >

                    <i class="bi bi-bag"></i>

                    @php

                        $cartCount = collect(
                            session('cart', [])
                        )->sum('quantity');

                    @endphp

                    @if($cartCount > 0)

                        <span
                            style="
                                position:absolute;
                                top:-8px;
                                right:-10px;

                                background:#111;
                                color:#fff;

                                width:18px;
                                height:18px;

                                border-radius:50%;

                                font-size:9px;

                                display:flex;
                                align-items:center;
                                justify-content:center;
                            "
                        >
                            {{ $cartCount }}
                        </span>

                    @endif

                </a>

            </div>

        </div>

    </div>

</nav>


{{-- =========================
SEARCH OVERLAY
========================= --}}

<div
    id="searchOverlay"
    class="search-overlay"
>

    <div class="search-box">


        {{-- CLOSE BUTTON --}}

        <button
            type="button"
            id="closeSearch"
            class="search-close"
            aria-label="Close search"
        >

            <i class="bi bi-x-lg"></i>

        </button>


        {{-- TITLE --}}

        <div class="search-title">

            Search Kaira

        </div>


        {{-- SEARCH FORM --}}

        <form
            id="frontendSearchForm"
            action="{{ route('frontend.search') }}"
            method="GET"
        >

            <div class="search-input-wrapper">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    id="frontendSearchInput"
                    placeholder="Search products, categories..."
                    autocomplete="off"
                >

            </div>

        </form>


        {{-- SEARCH RESULTS --}}

        <div
            id="frontendSearchResults"
            class="search-results"
        ></div>

    </div>

</div>


{{-- =========================
VARIETY DETAIL
========================= --}}

<section class="variety-detail-section">

    <div class="container">


        {{-- BACK TO HOME --}}

        <a
            href="{{ url('/') }}"
            class="back-home"
        >

            <i class="bi bi-arrow-left"></i>

            Back To Home

        </a>


        <div class="row g-5 align-items-center">


            {{-- =========================
                 IMAGE
            ========================= --}}

            <div class="col-lg-7">

                <div class="variety-image-wrapper">

                    @if($variety->image)

                        <picture>

                            @if($variety->mobile_image)

                                <source
                                    media="(max-width: 767px)"
                                    srcset="{{ asset('uploads/varieties/' . $variety->mobile_image) }}"
                                >

                            @endif

                            <img
                                src="{{ asset('uploads/varieties/' . $variety->image) }}"
                                alt="{{ $variety->title }}"
                            >

                        </picture>

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
                 INFORMATION
            ========================= --}}

            <div class="col-lg-5">

                <div class="variety-info">


                    {{-- LABEL --}}

                    <div class="variety-label">

                        Kaira Variety

                    </div>


                    {{-- TITLE --}}

                    <h1 class="variety-title">

                        {{ $variety->title }}

                    </h1>


                    {{-- SUBTITLE --}}

                    @if($variety->subtitle)

                        <div class="variety-subtitle">

                            {{ $variety->subtitle }}

                        </div>

                    @endif


                    {{-- =========================
                         RELATED PRODUCT
                    ========================= --}}

                    @if($variety->product)

                        <div class="product-info">

                            <div class="product-info-title">

                                Featured Product

                            </div>


                            <div class="product-name">

                                {{ $variety->product->name }}

                            </div>


                            @if(
                                isset($variety->product->discount_price)
                                &&
                                $variety->product->discount_price
                            )

                                <div class="product-price">

                                    Rs.
                                    {{ number_format($variety->product->discount_price, 2) }}

                                </div>

                            @elseif(
                                isset($variety->product->price)
                            )

                                <div class="product-price">

                                    Rs.
                                    {{ number_format($variety->product->price, 2) }}

                                </div>

                            @endif


                            {{-- PRODUCT BUTTON --}}

                            @if($variety->product->uuid)

                                <a
                                    href="{{ route('product.show', $variety->product->uuid) }}"
                                    class="variety-btn mt-4"
                                >

                                    Explore Product

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            @endif

                        </div>


                    @else

                        {{-- COMING SOON --}}

                        <div class="coming-soon-box">

                            <i class="bi bi-stars"></i>

                            <span>
                                Coming Soon
                            </span>

                            <small>
                                This variety will be available soon.
                            </small>

                        </div>

                    @endif


                    {{-- =========================
                         META INFORMATION
                    ========================= --}}

                    @if(
                        $variety->position ||
                        $variety->start_date ||
                        $variety->end_date
                    )

                        <div class="variety-meta">


                            {{-- POSITION --}}

                            @if($variety->position)

                                <div class="meta-item">

                                    Position:

                                    <strong>
                                        {{ $variety->position }}
                                    </strong>

                                </div>

                            @endif


                            {{-- START DATE --}}

                            @if($variety->start_date)

                                <div class="meta-item">

                                    Available From:

                                    <strong>
                                        {{ $variety->start_date->format('d M Y') }}
                                    </strong>

                                </div>

                            @endif


                            {{-- END DATE --}}

                            @if($variety->end_date)

                                <div class="meta-item">

                                    Available Until:

                                    <strong>
                                        {{ $variety->end_date->format('d M Y') }}
                                    </strong>

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


{{-- Bootstrap JS --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
></script>


{{-- =========================
SEARCH JAVASCRIPT
========================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    const openSearch =
        document.getElementById('openSearch');

    const closeSearch =
        document.getElementById('closeSearch');

    const searchOverlay =
        document.getElementById('searchOverlay');

    const searchInput =
        document.getElementById('frontendSearchInput');

    const searchResults =
        document.getElementById('frontendSearchResults');

    const searchForm =
        document.getElementById('frontendSearchForm');


    let searchTimeout;


    /* =========================
       OPEN SEARCH
    ========================= */

    openSearch.addEventListener('click', function (event) {

        event.preventDefault();

        searchOverlay.classList.add('active');

        document.body.style.overflow = 'hidden';

        setTimeout(function () {

            searchInput.focus();

        }, 100);

    });


    /* =========================
       CLOSE SEARCH
    ========================= */

    closeSearch.addEventListener('click', function () {

        searchOverlay.classList.remove('active');

        document.body.style.overflow = '';

        searchInput.value = '';

        searchResults.innerHTML = '';

    });


    /* =========================
       CLOSE WHEN CLICKING OUTSIDE
    ========================= */

    searchOverlay.addEventListener('click', function (event) {

        if (event.target === searchOverlay) {

            searchOverlay.classList.remove('active');

            document.body.style.overflow = '';

        }

    });


    /* =========================
       ESC KEY
    ========================= */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            searchOverlay.classList.remove('active');

            document.body.style.overflow = '';

        }

    });


    /* =========================
       PREVENT NORMAL FORM SUBMIT
    ========================= */

    searchForm.addEventListener('submit', function (event) {

        event.preventDefault();

    });


    /* =========================
       LIVE SEARCH
    ========================= */

    searchInput.addEventListener('input', function () {


        const query = this.value.trim();


        clearTimeout(searchTimeout);


        /* Minimum 2 characters */

        if (query.length < 2) {

            searchResults.innerHTML = '';

            return;

        }


        /* Loading */

        searchResults.innerHTML = `

            <div class="search-no-result">

                Searching...

            </div>

        `;


        searchTimeout = setTimeout(function () {


            fetch(
                "{{ route('frontend.search') }}?search=" +
                encodeURIComponent(query),
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            )


            .then(function (response) {

                if (!response.ok) {

                    throw new Error(
                        'Search request failed'
                    );

                }

                return response.json();

            })


            .then(function (data) {


                searchResults.innerHTML = '';


                /* No results */

                if (
                    !Array.isArray(data)
                    ||
                    data.length === 0
                ) {

                    searchResults.innerHTML = `

                        <div class="search-no-result">

                            No results found for
                            "<strong>${escapeHtml(query)}</strong>"

                        </div>

                    `;

                    return;

                }


                /* Results */

                data.forEach(function (item) {


                    const result =
                        document.createElement('a');


                    result.href =
                        item.url || '#';


                    result.className =
                        'search-result-item';


                    /* Image */

                    let imageHTML = '';

                    if (item.image) {

                        imageHTML = `

                            <img
                                src="${escapeAttribute(item.image)}"
                                class="search-result-image"
                                alt="${escapeAttribute(item.name || '')}"
                            >

                        `;

                    }


                    /* Price */

                    let priceHTML = '';

                    if (
                        item.price !== null
                        &&
                        item.price !== undefined
                        &&
                        item.price !== ''
                    ) {

                        priceHTML = `

                            <div class="search-result-price">

                                Rs.
                                ${escapeHtml(
                                    Number(item.price).toLocaleString()
                                )}

                            </div>

                        `;

                    }


                    result.innerHTML = `

                        ${imageHTML}

                        <div class="search-result-info">

                            <div class="search-result-name">

                                ${escapeHtml(
                                    item.name || 'Unnamed'
                                )}

                            </div>

                            <div class="search-result-type">

                                ${escapeHtml(
                                    item.type || ''
                                )}

                            </div>

                        </div>

                        ${priceHTML}

                    `;


                    searchResults.appendChild(result);

                });

            })


            .catch(function (error) {


                console.error(
                    'Search Error:',
                    error
                );


                searchResults.innerHTML = `

                    <div class="search-no-result">

                        Something went wrong.
                        Please try again.

                    </div>

                `;

            });


        }, 300);

    });


    /* =========================
       ESCAPE HTML
    ========================= */

    function escapeHtml(value) {

        const div =
            document.createElement('div');

        div.textContent = value;

        return div.innerHTML;

    }


    /* =========================
       ESCAPE ATTRIBUTE
    ========================= */

    function escapeAttribute(value) {

        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

    }

});

</script>


</body>

</html>