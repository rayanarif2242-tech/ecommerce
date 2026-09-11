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


        html {
            scroll-behavior: smooth;
        }


        body {
            margin: 0;
            padding-top: 82px;
            background: #fff;
            color: #111;
            font-family: 'Montserrat', sans-serif;
        }


        /* =========================================================
           NAVBAR
        ========================================================= */

        .main-navbar {
            position: fixed;

            top: 0;
            left: 0;

            width: 100%;
            height: 82px;

            z-index: 5000;

            display: flex;
            align-items: center;

            background: rgba(255, 255, 255, 0.98);

            border-bottom: 1px solid #e8e8e8;

            transition:
                top .45s ease,
                left .45s ease,
                width .45s ease,
                height .45s ease,
                border-radius .45s ease,
                background .45s ease,
                box-shadow .45s ease,
                backdrop-filter .45s ease;
        }


        /* =========================================================
           SCROLLED FLOATING NAVBAR
        ========================================================= */

        .main-navbar.scrolled {

            top: 14px;
            left: 28px;

            width: calc(100% - 56px);

            height: 76px;

            border-radius: 28px;

            background: rgba(255, 255, 255, 0.84);

            border: 1px solid rgba(0, 0, 0, 0.06);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            box-shadow:
                0 12px 35px rgba(0, 0, 0, 0.08);
        }


        /* =========================================================
           NAVBAR CONTAINER
        ========================================================= */

        .main-navbar .container {
            width: 100%;
        }


        .main-navbar .container > .d-flex {
            width: 100%;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .brand {

            font-family: 'Cormorant Garamond', serif;

            font-size: 34px;

            font-weight: 600;

            letter-spacing: 4px;

            color: #111;

            text-decoration: none;

            white-space: nowrap;

            transition: .3s ease;
        }


        .brand:hover {
            color: #777;
        }


        /* =========================================================
           NAV LINKS
        ========================================================= */

        .nav-links {

            display: flex;

            align-items: center;

            gap: 38px;

            list-style: none;

            margin: 0;
            padding: 0;
        }


        .nav-links > li {
            position: relative;
        }


        .nav-links a {

            text-decoration: none;

            color: #222;

            font-size: 14px;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            transition: .3s ease;
        }


        .nav-links a:hover {
            color: #888;
        }


        /* =========================================================
           BOOTSTRAP DROPDOWN
        ========================================================= */

        .nav-links .dropdown-menu {

            margin-top: 18px;

            min-width: 210px;

            padding: 8px 0;

            border: 1px solid #eee;

            border-radius: 0;

            background: #fff;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, .08);
        }


        .nav-links .dropdown-item {

            padding: 10px 18px;

            font-size: 12px;

            letter-spacing: 1px;

            text-transform: uppercase;

            color: #222;

            background: transparent;

            transition: .25s ease;
        }


        .nav-links .dropdown-item:hover {

            color: #111;

            background: #f7f7f7;
        }


        /* =========================================================
           SHOP SUBMENU
        ========================================================= */

        .dropdown-submenu {
            position: relative;
        }


        .dropdown-submenu > .dropdown-menu {

            top: -8px;
            left: 100%;

            margin-top: 0;
            margin-left: 2px;
        }


        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }


        .submenu-arrow {

            font-size: 20px;

            line-height: 1;

            color: #888;

            margin-left: 15px;
        }


        /* =========================================================
           NAV ICONS
        ========================================================= */

        .nav-icons {

            display: flex;

            align-items: center;

            gap: 22px;
        }


        .nav-icons a {

            position: relative;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 28px;
            height: 28px;

            color: #111;

            font-size: 20px;

            text-decoration: none;

            transition: .3s ease;
        }


        .nav-icons a:hover {
            color: #777;
        }


        /* =========================================================
           CART BADGE
        ========================================================= */

        .cart-badge {

            position: absolute;

            top: -8px;
            right: -10px;

            width: 18px;
            height: 18px;

            border-radius: 50%;

            background: #111;

            color: #fff;

            font-size: 9px;

            display: flex;

            align-items: center;
            justify-content: center;

            line-height: 1;
        }


        /* =========================================================
           SEARCH POPUP
        ========================================================= */

        .search-popup {

            position: fixed;

            top: 82px;

            left: 0;
            right: 0;

            z-index: 4999;

            background: #fff;

            border-bottom: 1px solid #e5e5e5;

            padding: 35px 0 40px;

            display: none;

            box-shadow:
                0 15px 35px rgba(0, 0, 0, .08);

            transition:
                top .45s ease,
                left .45s ease,
                right .45s ease,
                border-radius .45s ease;
        }


        .search-popup.is-visible {
            display: block;
        }


        /* Search popup when navbar is floating */

        body.navbar-scrolled .search-popup {

            top: 104px;

            left: 28px;
            right: 28px;

            border: 1px solid rgba(0, 0, 0, .08);

            border-top: none;

            border-radius:
                0 0 24px 24px;
        }


        .search-popup-container {

            width: min(900px, calc(100% - 40px));

            margin: auto;
        }


        .search-popup .form-group {
            position: relative;
        }


        .search-popup #search-form {

            height: 55px;

            padding-right: 60px;

            font-size: 16px;

            outline: none;

            box-shadow: none;
        }


        .search-popup #search-form:focus {

            border-color: #111 !important;
        }


        /* =========================================================
           BROWSE CATEGORIES
        ========================================================= */

        .search-popup .cat-list {

            list-style: none;

            padding: 0;

            margin: 15px 0 0;
        }


        .search-popup .cat-list-item {

            border-bottom: 1px solid #eee;
        }


        .search-popup .cat-list-item a {

            display: block;

            padding: 10px 0;

            color: #222;

            text-decoration: none;

            font-size: 13px;

            letter-spacing: 1px;

            transition: .3s;
        }


        .search-popup .cat-list-item a:hover {

            color: #888;

            padding-left: 5px;
        }


        .search-popup .cat-list-title {

            margin-top: 30px;

            font-size: 11px;

            letter-spacing: 3px;

            text-transform: uppercase;

            color: #888;
        }


        /* =========================================================
           LIVE SEARCH RESULTS
        ========================================================= */

        #frontendSearchResults {

            display: none;

            margin-top: 15px;

            max-height: 430px;

            overflow-y: auto;
        }


        .search-suggestion-title {

            padding: 12px 0;

            font-size: 11px;

            letter-spacing: 2px;

            text-transform: uppercase;

            color: #888;
        }


        .search-suggestion {

            display: flex;

            align-items: center;

            gap: 15px;

            width: 100%;

            padding: 12px 5px;

            border-bottom: 1px solid #eee;

            text-decoration: none;

            color: #111;

            transition: all .2s ease;
        }


        .search-suggestion:hover {

            background: #fafafa;

            padding-left: 10px;
        }


        .search-suggestion-image {

            width: 55px;

            height: 55px;

            object-fit: cover;

            flex-shrink: 0;

            border-radius: 4px;

            background: #f5f5f5;
        }


        .search-suggestion-image.no-image {

            display: flex;

            align-items: center;

            justify-content: center;

            color: #888;

            font-size: 18px;
        }


        .search-suggestion-info {
            flex: 1;
        }


        .search-suggestion-name {

            font-size: 14px;

            font-weight: 500;

            color: #111;
        }


        .search-suggestion-type {

            margin-top: 3px;

            font-size: 10px;

            letter-spacing: 1.5px;

            text-transform: uppercase;

            color: #999;
        }


        .search-suggestion-price {

            margin-top: 4px;

            font-size: 12px;

            color: #777;
        }


        .search-arrow {

            margin-right: 10px;

            color: #aaa;
        }


        .search-no-results {

            padding: 35px 10px;

            text-align: center;

            color: #888;

            font-size: 14px;
        }


        .search-no-results i {

            display: block;

            margin-bottom: 10px;

            font-size: 24px;
        }


        /* =========================================================
           SUBCATEGORY DETAIL
        ========================================================= */

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


        /* =========================================================
           SUBCATEGORY INFO
        ========================================================= */

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


        /* =========================================================
           PRICE BOX
        ========================================================= */

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

            color: #000;

            margin-bottom: 6px;
        }


        .category-name {

            font-size: 25px;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        /* =========================================================
           QUANTITY SELECTOR
        ========================================================= */

        .quantity-wrapper {

            display: flex;

            align-items: center;

            width: 150px;

            height: 48px;

            margin-bottom: 18px;

            border: 1px solid #ddd;
        }


        .quantity-btn {

            width: 45px;

            height: 46px;

            border: none;

            background: #fff;

            color: #111;

            font-size: 20px;

            cursor: pointer;

            transition: .2s ease;
        }


        .quantity-btn:hover {

            background: #111;

            color: #fff;
        }


        .quantity-input {

            width: 60px;

            height: 46px;

            border: none;

            border-left: 1px solid #ddd;

            border-right: 1px solid #ddd;

            text-align: center;

            font-size: 15px;

            font-family: 'Montserrat', sans-serif;

            outline: none;

            background: #fff;
        }


        /* Remove number input arrows */

        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }


        .quantity-input[type=number] {
            appearance: textfield;
            -moz-appearance: textfield;
        }


        /* =========================================================
           EXPLORE / ADD TO CART BUTTON
        ========================================================= */

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


        /* =========================================================
           BACK BUTTON
        ========================================================= */

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


        /* =========================================================
           FOOTER
        ========================================================= */

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


        /* =========================================================
           TABLET
        ========================================================= */

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


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 767px) {

            body {
                padding-top: 70px;
            }


            .main-navbar {

                height: 70px;

                padding: 0 4px;
            }


            .main-navbar.scrolled {

                top: 10px;

                left: 12px;

                width: calc(100% - 24px);

                height: 64px;

                border-radius: 20px;
            }


            .brand {
                font-size: 28px;
            }


            .nav-icons {
                gap: 14px;
            }


            .nav-icons a {
                font-size: 19px;
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


            /* Search popup mobile */

            .search-popup {

                top: 70px;

                padding: 25px 0 30px;
            }


            body.navbar-scrolled .search-popup {

                top: 84px;

                left: 12px;

                right: 12px;

                border-radius:
                    0 0 18px 18px;
            }


            .search-popup-container {

                width: calc(100% - 30px);
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


{{-- =========================================================
     NAVBAR
========================================================= --}}

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


                {{-- HOME --}}

                <li>

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                </li>


                {{-- SHOP --}}

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="dropdownShop"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Shop
                    </a>


                    <ul
                        class="dropdown-menu list-unstyled"
                        aria-labelledby="dropdownShop"
                    >

                        @foreach($categories as $category)

                            <li class="dropdown-submenu">

                                <a
                                    href="{{ route('category.show', $category->slug) }}"
                                    class="dropdown-item item-anchor d-flex justify-content-between align-items-center"
                                >

                                    {{ $category->name }}


                                    @if($category->subCategories && $category->subCategories->count() > 0)

                                        <span class="submenu-arrow">
                                            ›
                                        </span>

                                    @endif

                                </a>


                                @if($category->subCategories && $category->subCategories->count() > 0)

                                    <ul class="dropdown-menu list-unstyled">

                                        @foreach($category->subCategories as $subcategory)

                                            <li>

                                                <a
                                                    href="{{ route('subcategory.show', $subcategory->slug) }}"
                                                    class="dropdown-item item-anchor"
                                                >
                                                    {{ $subcategory->name }}
                                                </a>

                                            </li>

                                        @endforeach

                                    </ul>

                                @endif

                            </li>

                        @endforeach

                    </ul>

                </li>


                {{-- PAGES --}}

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="dropdownPages"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Pages
                    </a>


                    <ul
                        class="dropdown-menu list-unstyled"
                        aria-labelledby="dropdownPages"
                    >

                        <li>

                            <a
                                href="{{ route('cart.show') }}"
                                class="dropdown-item item-anchor"
                            >
                                Cart
                            </a>

                        </li>


                        <li>

                            <a
                                href="{{ route('contact') }}"
                                class="dropdown-item item-anchor"
                            >
                                Contact
                            </a>

                        </li>


                        <li>

                            <a
                                href="index.html"
                                class="dropdown-item item-anchor"
                            >
                                FAQs
                            </a>

                        </li>


                        <li>

                            <a
                                href="{{ route('blogs') }}"
                                class="dropdown-item item-anchor"
                            >
                                Blog
                            </a>

                        </li>

                    </ul>

                </li>


                {{-- PRODUCTS --}}

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('user.products') }}"
                    >
                        PRODUCTS
                    </a>

                </li>


                {{-- COLLECTIONS --}}

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="{{ route('user.collections') }}"
                    >
                        COLLECTIONS
                    </a>

                </li>


            </ul>


            {{-- ICONS --}}

            <div class="nav-icons">


                {{-- SEARCH --}}

                <a
                    href="#"
                    class="search-toggle"
                    aria-label="Open search"
                >

                    <i class="bi bi-search"></i>

                </a>


                {{-- NEWSLETTER / PROFILE --}}

                <a
                    href="{{ route('newsletter.index') }}"
                    aria-label="Newsletter & Suggestions"
                    title="Newsletter & Suggestions"
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

                        <span class="cart-badge">

                            {{ $cartCount }}

                        </span>

                    @endif

                </a>


            </div>


        </div>

    </div>

</nav>



{{-- =========================================================
     SEARCH POPUP
========================================================= --}}

<div class="search-popup">

    <div class="search-popup-container">


        <form
            role="search"
            method="GET"
            action="{{ route('frontend.search') }}"
            class="form-group"
            id="frontendSearchForm"
        >

            <input
                type="search"
                id="search-form"
                class="form-control border-0 border-bottom"
                placeholder="Search products, categories..."
                autocomplete="off"
                name="search"
            >


            <button
                type="submit"
                class="search-submit border-0 position-absolute bg-white"
                style="top:15px;right:15px;"
            >

                <i class="bi bi-search"></i>

            </button>

        </form>


        {{-- LIVE SEARCH RESULTS --}}

        <div
            id="frontendSearchResults"
            class="mt-3"
            style="display:none;"
        ></div>


        {{-- DEFAULT CATEGORIES --}}

        <div id="browseCategories">


            <h5 class="cat-list-title">
                Browse Categories
            </h5>


            <ul class="cat-list">


                <li class="cat-list-item">

                    <a href="{{ route('user.products') }}">
                        All Products
                    </a>

                </li>


                <li class="cat-list-item">

                    <a href="{{ route('user.collections') }}">
                        Collections
                    </a>

                </li>


                @foreach(
                    \App\Models\Category::where('status', 1)
                        ->orderBy('name')
                        ->get()
                    as $categoryItem
                )

                    <li class="cat-list-item">

                        <a
                            href="{{ route('category.show', $categoryItem->slug) }}"
                        >
                            {{ $categoryItem->name }}
                        </a>

                    </li>

                @endforeach


            </ul>

        </div>

    </div>

</div>



{{-- =========================================================
     SUBCATEGORY DETAIL
========================================================= --}}

<section class="subcategory-detail-section">

    <div class="container">


        {{-- BACK BUTTON --}}

        <a
            href="{{ url()->previous() }}"
            class="back-subcategory"
        >

            <i class="bi bi-arrow-left"></i>

            Back

        </a>


        <div class="row g-5 align-items-center">


            {{-- =================================================
                 SUBCATEGORY IMAGE
            ================================================= --}}

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


            {{-- =================================================
                 SUBCATEGORY INFORMATION
            ================================================= --}}

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


                    {{-- =================================================
                         PRICE
                    ================================================= --}}

                    <div class="category-box">

                        <div class="category-label">
                            Price
                        </div>


                        <div class="category-name">


                            @if($subCategory->discount_price)


                                {{-- ORIGINAL PRICE --}}

                                <span
                                    style="
                                        color:#999;
                                        text-decoration:line-through;
                                        font-size:18px;
                                        margin-right:10px;
                                    "
                                >

                                    Rs.{{ number_format($subCategory->price, 2) }}

                                </span>


                                {{-- DISCOUNT PRICE --}}

                                <span
                                    style="
                                        color:#111;
                                        font-size:25px;
                                        font-weight:600;
                                    "
                                >

                                    Rs.{{ number_format($subCategory->discount_price, 2) }}

                                </span>


                            @else


                                {{-- REGULAR PRICE --}}

                                <span
                                    style="
                                        color:#111;
                                        font-size:25px;
                                        font-weight:600;
                                    "
                                >

                                    Rs.{{ number_format($subCategory->price, 2) }}

                                </span>


                            @endif


                        </div>

                    </div>


                    {{-- =================================================
                         ADD TO CART
                    ================================================= --}}

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


                        {{-- QUANTITY --}}

                        <div class="quantity-wrapper">


                            <button
                                type="button"
                                class="quantity-btn"
                                onclick="decreaseQuantity()"
                            >
                                −
                            </button>


                            <input
                                type="number"
                                name="quantity"
                                id="quantity"
                                class="quantity-input"
                                value="1"
                                min="1"
                                max="{{ $subCategory->stock }}"
                            >


                            <button
                                type="button"
                                class="quantity-btn"
                                onclick="increaseQuantity()"
                            >
                                +
                            </button>


                        </div>


                        {{-- ADD TO CART BUTTON --}}

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


    </div>

</section>



{{-- =========================================================
     FOOTER
========================================================= --}}

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



{{-- =========================================================
     BOOTSTRAP JS
========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>



<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =========================================================
       NAVBAR SCROLL EFFECT
    ========================================================= */

    const navbar = document.querySelector('.main-navbar');


    if (navbar) {

        function handleNavbarScroll() {

            if (window.scrollY > 40) {

                navbar.classList.add('scrolled');

                document.body.classList.add('navbar-scrolled');

            } else {

                navbar.classList.remove('scrolled');

                document.body.classList.remove('navbar-scrolled');

            }

        }


        /* Run once on page load */

        handleNavbarScroll();


        /* Run while scrolling */

        window.addEventListener(
            'scroll',
            handleNavbarScroll,
            { passive: true }
        );

    }



    /* =========================================================
       SEARCH ELEMENTS
    ========================================================= */

    const searchToggle =
        document.querySelector('.search-toggle');


    const searchPopup =
        document.querySelector('.search-popup');


    const searchForm =
        document.getElementById('frontendSearchForm');


    const searchInput =
        document.getElementById('search-form');


    const searchResults =
        document.getElementById('frontendSearchResults');


    const browseCategories =
        document.getElementById('browseCategories');


    if (
        !searchToggle ||
        !searchPopup ||
        !searchInput ||
        !searchResults
    ) {

        return;

    }


    let searchTimeout = null;



    /* =========================================================
       OPEN / CLOSE SEARCH
    ========================================================= */

    searchToggle.addEventListener(
        'click',
        function (e) {

            e.preventDefault();


            searchPopup.classList.toggle(
                'is-visible'
            );


            if (
                searchPopup.classList.contains(
                    'is-visible'
                )
            ) {

                setTimeout(
                    function () {

                        searchInput.focus();

                    },
                    100
                );

            } else {

                searchInput.value = '';

                searchResults.innerHTML = '';

                searchResults.style.display = 'none';


                if (browseCategories) {

                    browseCategories.style.display =
                        'block';

                }

            }

        }
    );



    /* =========================================================
       LIVE SEARCH
    ========================================================= */

    searchInput.addEventListener(
        'input',
        function () {


            const keyword =
                this.value.trim();


            clearTimeout(searchTimeout);



            /* EMPTY SEARCH */

            if (keyword === '') {

                searchResults.innerHTML = '';

                searchResults.style.display =
                    'none';


                if (browseCategories) {

                    browseCategories.style.display =
                        'block';

                }

                return;

            }



            /* HIDE CATEGORIES */

            if (browseCategories) {

                browseCategories.style.display =
                    'none';

            }



            /* DELAY REQUEST */

            searchTimeout = setTimeout(
                function () {


                    fetch(
                        "{{ route('frontend.search') }}?search=" +
                        encodeURIComponent(keyword),
                        {
                            method: 'GET',

                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }
                    )

                    .then(
                        function (response) {

                            if (!response.ok) {

                                throw new Error(
                                    'Search failed'
                                );

                            }

                            return response.json();

                        }
                    )

                    .then(
                        function (results) {


                            searchResults.innerHTML =
                                '';



                            /* NO RESULTS */

                            if (!results.length) {


                                searchResults.innerHTML = `

                                    <div class="search-no-results">

                                        <i class="bi bi-search"></i>

                                        <div>

                                            No results found for
                                            "<strong>${escapeHtml(keyword)}</strong>"

                                        </div>

                                    </div>

                                `;


                                searchResults.style.display =
                                    'block';


                                return;

                            }



                            /* RESULTS TITLE */

                            const title =
                                document.createElement(
                                    'div'
                                );


                            title.className =
                                'search-suggestion-title';


                            title.innerHTML = `

                                Related results for
                                "<strong>${escapeHtml(keyword)}</strong>"

                            `;


                            searchResults.appendChild(
                                title
                            );



                            /* RESULTS */

                            results.forEach(
                                function (item) {


                                    const result =
                                        document.createElement(
                                            'a'
                                        );


                                    result.href =
                                        item.url;


                                    result.className =
                                        'search-suggestion';



                                    /* IMAGE */

                                    let image = '';


                                    if (item.image) {


                                        image = `

                                            <img
                                                src="${escapeAttribute(item.image)}"
                                                alt="${escapeAttribute(item.name)}"
                                                class="search-suggestion-image"
                                            >

                                        `;


                                    } else {


                                        image = `

                                            <div
                                                class="search-suggestion-image no-image"
                                            >

                                                <i class="bi bi-grid"></i>

                                            </div>

                                        `;

                                    }



                                    /* PRICE */

                                    let price = '';


                                    if (
                                        item.price !== null &&
                                        item.price !== undefined &&
                                        item.price !== ''
                                    ) {


                                        const number =
                                            Number(item.price);


                                        if (
                                            !Number.isNaN(number)
                                        ) {


                                            price = `

                                                <div class="search-suggestion-price">

                                                    Rs.
                                                    ${number.toLocaleString(
                                                        'en-PK',
                                                        {
                                                            minimumFractionDigits: 2,
                                                            maximumFractionDigits: 2
                                                        }
                                                    )}

                                                </div>

                                            `;

                                        }

                                    }



                                    /* RESULT HTML */

                                    result.innerHTML = `

                                        ${image}

                                        <div class="search-suggestion-info">

                                            <div class="search-suggestion-name">

                                                ${escapeHtml(item.name)}

                                            </div>

                                            <div class="search-suggestion-type">

                                                ${escapeHtml(item.type)}

                                            </div>

                                            ${price}

                                        </div>

                                        <i class="
                                            bi bi-arrow-right
                                            search-arrow
                                        "></i>

                                    `;


                                    searchResults.appendChild(
                                        result
                                    );

                                }
                            );


                            searchResults.style.display =
                                'block';

                        }
                    )

                    .catch(
                        function (error) {


                            console.error(error);


                            searchResults.innerHTML = `

                                <div class="search-no-results">

                                    <i class="bi bi-exclamation-circle"></i>

                                    Search could not be completed.

                                </div>

                            `;


                            searchResults.style.display =
                                'block';

                        }
                    );


                },
                250
            );

        }
    );



    /* =========================================================
       ENTER SEARCH
    ========================================================= */

    if (searchForm) {

        searchForm.addEventListener(
            'submit',
            function (e) {

                e.preventDefault();


                const keyword =
                    searchInput.value.trim();


                if (!keyword) {
                    return;
                }


                window.location.href =
                    "{{ route('frontend.search') }}" +
                    "?search=" +
                    encodeURIComponent(keyword);

            }
        );

    }



    /* =========================================================
       ESCAPE HTML
    ========================================================= */

    function escapeHtml(value) {

        const div =
            document.createElement('div');


        div.textContent =
            value ?? '';


        return div.innerHTML;

    }



    /* =========================================================
       ESCAPE ATTRIBUTE
    ========================================================= */

    function escapeAttribute(value) {

        return String(value ?? '')

            .replace(
                /&/g,
                '&amp;'
            )

            .replace(
                /"/g,
                '&quot;'
            )

            .replace(
                /</g,
                '&lt;'
            )

            .replace(
                />/g,
                '&gt;'
            );

    }

});



/* =========================================================
   QUANTITY INCREASE
========================================================= */

function increaseQuantity() {

    const quantity =
        document.getElementById('quantity');


    if (!quantity) {
        return;
    }


    let value =
        parseInt(quantity.value) || 1;


    const max =
        parseInt(quantity.max);


    if (
        max &&
        value >= max
    ) {

        quantity.value = max;

        return;

    }


    quantity.value =
        value + 1;

}



/* =========================================================
   QUANTITY DECREASE
========================================================= */

function decreaseQuantity() {

    const quantity =
        document.getElementById('quantity');


    if (!quantity) {
        return;
    }


    let value =
        parseInt(quantity.value) || 1;


    if (value > 1) {

        quantity.value =
            value - 1;

    }

}

</script>


</body>

</html>