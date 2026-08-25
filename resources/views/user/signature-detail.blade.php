<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>{{ $signature->product_name }} | Kaira</title>

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
.quantity-box {
    display: flex;
    align-items: center;
    width: 160px;
    border: 1px solid #ddd;
}

.quantity-btn {
    width: 50px;
    height: 48px;
    border: none;
    background: #fff;
    font-size: 22px;
    cursor: pointer;
}

.quantity-btn:hover {
    background: #f5f5f5;
}

#signatureQuantity {
    width: 60px;
    height: 48px;
    border: none;
    text-align: center;
    font-size: 15px;
    outline: none;
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
           PRODUCT DETAIL
        ========================= */

        .product-detail-section {
            padding: 70px 0 100px;
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 650px;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }

        .product-image-wrapper:hover img {
            transform: scale(1.03);
        }

        /* =========================
           PRODUCT INFO
        ========================= */

        .product-info {
            padding: 20px 30px 20px 55px;
        }

        .product-label {
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }

        .product-title {
            
            font-size: 52px;
            line-height: 1.1;
            font-weight: 200;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 18px;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .product-description {
            color: #777;
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        /* =========================
           ADD TO CART
        ========================= */

        .add-cart-btn {
            width: 100%;
            border: none;
            background: #111;
            color: #fff;
            padding: 17px;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: .3s;
        }

        .add-cart-btn:hover {
            background: #333;
        }

        /* =========================
           BACK BUTTON
        ========================= */

        .back-products {
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

        .back-products i {
            transition: .3s;
        }

        .back-products:hover {
            color: #777;
        }

        .back-products:hover i {
            transform: translateX(-4px);
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

            .product-info {
                padding: 40px 10px;
            }

            .product-image-wrapper img {
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

            .product-detail-section {
                padding: 40px 0 70px;
            }

            .product-image-wrapper img {
                height: 450px;
            }

            .product-title {
                font-size: 40px;
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

    <a
        href="#"
        class="search-toggle"
        aria-label="Open search"
    >
        <i class="bi bi-search"></i>
    </a>

<a 
    href="{{ route('newsletter.index') }}" 
    aria-label="Newsletter & Suggestions"
    title="Newsletter & Suggestions"
>
    <i class="bi bi-person"></i>
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



{{-- =========================
     PRODUCT DETAIL
========================= --}}

<section class="product-detail-section">

    <div class="container">


        {{-- BACK --}}

        <a
            href="{{ route('signatures') }}"
            class="back-products"
        >

            <i class="bi bi-arrow-left"></i>

            Back To Products

        </a>



        <div class="row g-5 align-items-center">


            {{-- =========================
                 PRODUCT IMAGE
            ========================= --}}

            <div class="col-lg-7">

                <div class="product-image-wrapper">

                    @if($signature->image)

                <img
    src="{{ asset($signature->image) }}"
    alt="{{ $signature->product_name }}"
    class="product-detail-image"
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
                 PRODUCT INFORMATION
            ========================= --}}

            <div class="col-lg-5">

                <div class="product-info">


                    <div class="product-label">
                        Kaira Signature
                    </div>


                    <h1 class="product-title">

    {{ $signature->product_name }}

</h1>


                    @if(isset($signature->price))

                        <div class="product-price">

                            Rs. {{ number_format($signature->price, 2) }}

                        </div>

                    @endif


                    @if($signature->description)

                        <div class="product-description">

                            {!! $signature->description !!}

                        </div>

                    @endif


{{-- ADD TO CART --}}
{{-- =========================
     SIGNATURE STOCK & CART
========================= --}}

@if((int) $signature->stock > 0)

    {{-- AVAILABLE STOCK --}}
    <div class="mb-3">

        <span class="text-muted">
            Available Stock:
        </span>

        <strong>
            {{ $signature->stock }}
        </strong>

    </div>


    {{-- ADD TO CART FORM --}}
    <form
        action="{{ route('cart.add.signature') }}"
        method="POST"
    >

        @csrf

        <input
            type="hidden"
            name="signature_id"
            value="{{ $signature->signature_id }}"
        >


        {{-- QUANTITY --}}
        <div class="quantity-box mb-3">

            <button
                type="button"
                class="quantity-btn"
                onclick="decreaseSignatureQuantity()"
                aria-label="Decrease quantity"
            >
                −
            </button>


            <input
                type="number"
                id="signatureQuantity"
                name="quantity"
                value="1"
                min="1"
                max="{{ $signature->stock }}"
                readonly
            >


            <button
                type="button"
                class="quantity-btn"
                onclick="increaseSignatureQuantity()"
                aria-label="Increase quantity"
            >
                +
            </button>

        </div>


        {{-- ADD TO CART --}}
        <button
            type="submit"
            class="add-cart-btn"
        >

            <i class="bi bi-bag me-2"></i>

            Add To Cart

        </button>

    </form>


@else

    {{-- OUT OF STOCK --}}
    <button
        type="button"
        class="add-cart-btn"
        disabled
        style="background:#999;cursor:not-allowed;"
    >

        Out Of Stock

    </button>

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

<script>
function increaseSignatureQuantity() {

    const input = document.getElementById('signatureQuantity');

    let quantity = parseInt(input.value) || 1;

    const maxStock = parseInt(input.max) || 0;

    if (quantity < maxStock) {
        input.value = quantity + 1;
    }
}

function decreaseSignatureQuantity() {

    const input = document.getElementById('signatureQuantity');

    let quantity = parseInt(input.value) || 1;

    if (quantity > 1) {
        input.value = quantity - 1;
    }
}
</script>

</html>