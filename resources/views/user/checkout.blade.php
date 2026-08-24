<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Checkout | Kaira</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    >

    <style>

        * {
            box-sizing: border-box;
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
    position: relative;
}

.nav-icons a:hover {
    color: #777;
}

/* =========================
   SEARCH POPUP
========================= */

.search-popup {
    position: fixed;
    top: 82px;
    left: 0;
    right: 0;

    z-index: 9999;

    background: #fff;

    border-bottom: 1px solid #e5e5e5;

    padding: 35px 0 40px;

    display: none;

    box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
}

.search-popup.is-visible {
    display: block;
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


/* =========================
   BROWSE CATEGORIES
========================= */

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


/* =========================
   LIVE SEARCH RESULTS
========================= */

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


/* =========================
   MOBILE SEARCH
========================= */

@media (max-width: 767px) {

    .search-popup {

        top: 70px;

        padding: 25px 0 30px;
    }

    .search-popup-container {

        width: calc(100% - 30px);
    }

}

        body {
            margin: 0;
            background: #f7f7f7;
            color: #111;
            font-family: 'Montserrat', sans-serif;
        }

       .main-navbar {
    height: 82px;
    border-bottom: 1px solid #e5e5e5;
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
    font-size: 13px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    transition: .3s;
}

.nav-links a:hover {
    color: #777;
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

@media (max-width: 991px) {

    .nav-links {
        display: none;
    }

}

@media (max-width: 767px) {

    .main-navbar {
        height: 70px;
    }

    .brand {
        font-size: 28px;
    }

}

        .brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 600;
            letter-spacing: 4px;
            color: #111;
            text-decoration: none;
        }

        .checkout-page {
            padding: 50px 0 90px;
        }

        .page-title {
            font-size: 46px;
            font-weight: 500;
            letter-spacing: 2px;
        }

        .checkout-card {
            background: #fff;
            border: 1px solid #ddd;
            padding: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 25px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 0;
            border: 1px solid #ccc;
            padding: 13px;
            font-size: 13px;
        }

        .form-control:focus {
            border-color: #111;
            box-shadow: none;
        }

        .summary-card {
            background: #fff;
            border: 1px solid #ddd;
            padding: 25px;
            position: sticky;
            top: 25px;
        }

        .summary-title {
            font-size: 21px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 13px;
            color: #555;
        }

        .summary-total {
            border-top: 1px solid #ddd;
            margin-top: 12px;
            padding-top: 18px;
            display: flex;
            justify-content: space-between;
        }

        .summary-total strong {
            font-size: 21px;
        }

        .payment-box {
            border: 1px solid #ddd;
            padding: 18px;
            margin-top: 25px;
        }

        .confirm-btn {
            width: 100%;
            background: #111;
            color: #fff;
            border: none;
            padding: 16px;
            margin-top: 25px;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .confirm-btn:hover {
            background: #333;
        }

        .alert {
            border-radius: 0;
            font-size: 13px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item-name {
            font-size: 13px;
            font-weight: 500;
        }

        .cart-item-qty {
            color: #777;
            font-size: 11px;
            margin-top: 4px;
        }

        .cart-item-price {
            font-size: 13px;
            white-space: nowrap;
        }

    </style>

</head>

<body>


{{-- =====================================================
     NAVBAR
===================================================== --}}

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

    <a
        href="#"
        class="search-toggle"
        aria-label="Open search"
    >
        <i class="bi bi-search"></i>
    </a>

   

    <a
        href="{{ route('cart.show') }}"
        aria-label="Cart"
    >
        <i class="bi bi-bag"></i>

        @php
            $cartCount = collect(session('cart', []))
                ->sum('quantity');
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
     SEARCH POPUP
========================= --}}

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

<section class="checkout-page">

    <div class="container">

        <div class="mb-5">

            <h1 class="page-title">
                Checkout
            </h1>

            <p class="text-muted">
                Enter your shipping details to complete your order.
            </p>

        </div>


        @if(session('error'))

            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>

        @endif


        @if($errors->any())

            <div class="alert alert-danger mb-4">

                <strong>Please fix the following:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('checkout.store') }}"
            method="POST"
        >

            @csrf

            <div class="row g-4">


                {{-- SHIPPING INFORMATION --}}

                <div class="col-lg-7">

                    <div class="checkout-card">

                        <div class="section-title">
                            Shipping Information
                        </div>


                        <div class="row g-3">


                            <div class="col-12">

                                <label class="form-label">
                                    Full Name *
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    placeholder="Enter your full name"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Email *
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    placeholder="example@email.com"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone *
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone') }}"
                                    placeholder="03XX XXXXXXX"
                                    required
                                >

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Address *
                                </label>

                                <textarea
                                    name="address"
                                    class="form-control"
                                    rows="4"
                                    placeholder="House number, street, area..."
                                    required
                                >{{ old('address') }}</textarea>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    City *
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    value="{{ old('city') }}"
                                    placeholder="Enter city"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Postal Code
                                </label>

                                <input
                                    type="text"
                                    name="postal_code"
                                    class="form-control"
                                    value="{{ old('postal_code') }}"
                                    placeholder="Postal code"
                                >

                            </div>

                        </div>


                        <div class="payment-box">

                            <strong>
                                Payment Method
                            </strong>

                            <div class="mt-3">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        checked
                                    >

                                    <label class="form-check-label">

                                        Cash on Delivery

                                    </label>

                                </div>

                            </div>

                            <small class="text-muted d-block mt-2">

                                Pay when your order is delivered.

                            </small>

                        </div>


                        <button
                            type="submit"
                            class="confirm-btn"
                        >

                            <i class="bi bi-check-circle me-2"></i>

                            Confirm Order

                        </button>

                    </div>

                </div>


                {{-- ORDER SUMMARY --}}

                <div class="col-lg-5">

                    <div class="summary-card">

                        <div class="summary-title">
                            Your Order
                        </div>


                        @foreach($cart as $item)

                            <div class="cart-item">

                                <div>

                                    <div class="cart-item-name">
                                        {{ $item['name'] }}
                                    </div>

                                    <div class="cart-item-qty">

                                        Quantity:
                                        {{ $item['quantity'] }}

                                    </div>

                                </div>

                                <div class="cart-item-price">

                                    Rs.
                                    {{ number_format(
                                        ($item['price'] ?? 0) *
                                        ($item['quantity'] ?? 1),
                                        2
                                    ) }}

                                </div>

                            </div>

                        @endforeach


                        <div class="summary-row mt-3">

                            <span>
                                Items
                            </span>

                            <strong>
                                {{ $totalItems }}
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                Rs. {{ number_format($subtotal, 2) }}
                            </strong>

                        </div>


                        <div class="summary-row">

                            <span>
                                Delivery
                            </span>

                            <strong>
                                Free
                            </strong>

                        </div>


                        <div class="summary-total">

                            <span>
                                Total
                            </span>

                            <strong>
                                Rs. {{ number_format($total, 2) }}
                            </strong>

                        </div>

                    </div>

                </div>


            </div>

        </form>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

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


    /* =========================
       OPEN / CLOSE SEARCH
    ========================= */

    searchToggle.addEventListener('click', function (e) {

        e.preventDefault();

        searchPopup.classList.toggle('is-visible');


        if (searchPopup.classList.contains('is-visible')) {

            setTimeout(function () {

                searchInput.focus();

            }, 100);

        } else {

            searchInput.value = '';

            searchResults.innerHTML = '';

            searchResults.style.display = 'none';

            if (browseCategories) {
                browseCategories.style.display = 'block';
            }

        }

    });


    /* =========================
       LIVE SEARCH
    ========================= */

    searchInput.addEventListener('input', function () {

        const keyword =
            this.value.trim();

        clearTimeout(searchTimeout);


        /* Empty */

        if (keyword === '') {

            searchResults.innerHTML = '';

            searchResults.style.display = 'none';

            if (browseCategories) {
                browseCategories.style.display = 'block';
            }

            return;
        }


        /* Hide categories */

        if (browseCategories) {
            browseCategories.style.display = 'none';
        }


        /* Delay request */

        searchTimeout = setTimeout(function () {

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
            .then(function (response) {

                if (!response.ok) {
                    throw new Error('Search failed');
                }

                return response.json();

            })
            .then(function (results) {

                searchResults.innerHTML = '';


                /* =========================
                   NO RESULTS
                ========================= */

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

                    searchResults.style.display = 'block';

                    return;
                }


                /* =========================
                   TITLE
                ========================= */

                const title =
                    document.createElement('div');

                title.className =
                    'search-suggestion-title';

                title.innerHTML = `
                    Related results for
                    "<strong>${escapeHtml(keyword)}</strong>"
                `;

                searchResults.appendChild(title);


                /* =========================
                   RESULTS
                ========================= */

                results.forEach(function (item) {

                    const result =
                        document.createElement('a');

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


                        if (!Number.isNaN(number)) {

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


                    searchResults.appendChild(result);

                });


                searchResults.style.display =
                    'block';

            })
            .catch(function (error) {

                console.error(error);

                searchResults.innerHTML = `

                    <div class="search-no-results">

                        <i class="bi bi-exclamation-circle"></i>

                        Search could not be completed.

                    </div>

                `;

                searchResults.style.display =
                    'block';

            });

        }, 250);

    });


    /* =========================
       ENTER SEARCH
    ========================= */

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


    /* =========================
       ESCAPE HTML
    ========================= */

    function escapeHtml(value) {

        const div =
            document.createElement('div');

        div.textContent =
            value ?? '';

        return div.innerHTML;
    }


    function escapeAttribute(value) {

        return String(value ?? '')
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }

});
</script>
</body>

</html>