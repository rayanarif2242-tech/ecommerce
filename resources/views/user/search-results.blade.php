<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Search: {{ $keyword }} | Kaira</title>

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
        /* =========================================
   SEARCH SUGGESTIONS
========================================= */

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
    width: 100%;
    height: 82px;

    background: #fff;

    border-bottom: 1px solid #e8e8e8;

    position: relative;
    z-index: 10000;
}

.navbar-inner {
    height: 82px;

    display: flex;
    align-items: center;
    justify-content: space-between;
}


/* LOGO */

.brand {
    font-family: 'Cormorant Garamond', serif;

    font-size: 34px;
    font-weight: 600;

    letter-spacing: 4px;

    color: #111;

    text-decoration: none;

    white-space: nowrap;
}


/* NAV LINKS */

.nav-links {
    display: flex;
    align-items: center;

    gap: 38px;

    list-style: none;

    margin: 0;
    padding: 0;
}

.nav-links li {
    margin: 0;
    padding: 0;
}

.nav-links a {
    color: #222;

    text-decoration: none;

    font-size: 14px;

    letter-spacing: 1.5px;

    text-transform: uppercase;

    transition: .3s ease;
}

.nav-links a:hover {
    color: #888;
}


/* ICONS */

.nav-icons {
    display: flex;
    align-items: center;

    gap: 24px;
}

.nav-icons a {
    color: #111;

    text-decoration: none;

    font-size: 23px;

    line-height: 1;

    transition: .3s ease;
}

.nav-icons a:hover {
    color: #888;
}


/* =========================
   SEARCH POPUP
========================= */

.search-popup {
    position: fixed;

    top: 82px;
    left: 0;
    right: 0;

    width: 100%;

    background: #fff;

    border-bottom: 1px solid #e5e5e5;

    box-shadow: 0 15px 35px rgba(0, 0, 0, .08);

    z-index: 9999;

    display: none;

    padding: 35px 0 40px;
}

.search-popup.is-visible {
    display: block;
}

.search-popup-container {
    width: min(900px, calc(100% - 40px));

    margin: 0 auto;
}


/* SEARCH FORM */

.search-form {
    position: relative;

    width: 100%;
}

.search-form .form-control {
    width: 100%;

    height: 58px;

    border: 0;

    border-bottom: 1px solid #ddd;

    border-radius: 0;

    padding: 0 60px 0 0;

    font-family: 'Montserrat', sans-serif;

    font-size: 16px;

    color: #111;

    background: #fff;

    outline: none;

    box-shadow: none;
}

.search-form .form-control:focus {
    border-bottom-color: #111;

    box-shadow: none;
}

.search-submit {
    position: absolute;

    top: 50%;
    right: 0;

    transform: translateY(-50%);

    border: 0;

    background: transparent;

    color: #111;

    font-size: 22px;

    padding: 10px;

    cursor: pointer;
}


/* =========================
   SEARCH RESULTS
========================= */

.search-results {
    display: none;

    max-height: 420px;

    overflow-y: auto;

    margin-top: 10px;
}

.search-result-item {
    display: flex;

    align-items: center;

    gap: 15px;

    padding: 14px 0;

    border-bottom: 1px solid #eee;

    text-decoration: none;

    color: #111;
}

.search-result-item:hover {
    background: #fafafa;
}

.search-result-image {
    width: 55px;
    height: 55px;

    object-fit: cover;

    border-radius: 4px;

    background: #f5f5f5;

    flex-shrink: 0;
}

.search-result-name {
    font-size: 14px;

    font-weight: 500;

    color: #111;
}

.search-result-type {
    margin-top: 3px;

    font-size: 10px;

    letter-spacing: 1.5px;

    text-transform: uppercase;

    color: #999;
}

.search-result-price {
    margin-top: 4px;

    font-size: 12px;

    color: #777;
}


/* =========================
   BROWSE CATEGORIES
========================= */

.cat-list-title {
    margin-top: 30px;

    margin-bottom: 12px;

    font-size: 11px;

    letter-spacing: 3px;

    text-transform: uppercase;

    color: #888;
}

.cat-list {
    list-style: none;

    margin: 0;

    padding: 0;
}

.cat-list-item {
    border-bottom: 1px solid #eee;
}

.cat-list-item a {
    display: block;

    padding: 12px 0;

    color: #222;

    text-decoration: none;

    font-size: 13px;

    letter-spacing: 1px;

    transition: .3s ease;
}

.cat-list-item a:hover {
    color: #888;

    padding-left: 5px;
}


/* =========================
   MOBILE
========================= */

@media (max-width: 991px) {

    .nav-links {
        display: none;
    }

}

@media (max-width: 767px) {

    .main-navbar {
        height: 70px;
    }

    .navbar-inner {
        height: 70px;
    }

    .brand {
        font-size: 28px;
    }

    .nav-icons {
        gap: 18px;
    }

    .search-popup {
        top: 70px;

        padding: 25px 0 30px;
    }

    .search-popup-container {
        width: calc(100% - 30px);
    }

}

        .navbar {
            height: 82px;
            border-bottom: 1px solid #eee;
            background: #fff;
        }

        .brand {
           
            font-size: 34px;
            font-weight: 600;
            letter-spacing: 4px;
            color: #111;
            text-decoration: none;
        }

        .nav-link {
            color: #222 !important;
            font-size: 13px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 0 15px;
        }

        .search-header {
            padding: 80px 0 45px;
            text-align: center;
        }

        .search-label {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 15px;
        }

        .search-title {
           
            font-size: 55px;
            font-weight: 500;
            margin-bottom: 15px;
        }

       

        .result-count {
            color: #888;
            font-size: 13px;
        }

        .search-section {
            padding-bottom: 100px;
        }

        .section-title {
           
            font-size: 32px;
            margin-bottom: 30px;
        }

        .product-card {
            text-decoration: none;
            color: #111;
            display: block;
        }

        .product-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            background: #f5f5f5;
            transition: .5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.02);
        }

        .image-wrapper {
            overflow: hidden;
            background: #f5f5f5;
        }

        .product-name {
            font-size: 14px;
            letter-spacing: 1px;
            margin-top: 16px;
            margin-bottom: 7px;
        }

        .product-price {
            font-size: 13px;
            color: #777;
        }

        .old-price {
            text-decoration: line-through;
            color: #aaa;
            margin-right: 8px;
        }

        .category-result {
            display: block;
            padding: 20px;
            border: 1px solid #eee;
            text-decoration: none;
            color: #111;
            transition: .3s;
        }

        .category-result:hover {
            background: #f8f8f8;
        }

        .category-result i {
            font-size: 25px;
            margin-right: 15px;
        }

        .category-type {
            display: block;
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #999;
            margin-top: 5px;
        }

        .no-results {
            text-align: center;
            padding: 100px 20px;
        }

        .no-results i {
            font-size: 55px;
            color: #aaa;
        }

        .no-results h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 40px;
            margin-top: 20px;
        }

        .no-results p {
            color: #888;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 13px 25px;
            border: 1px solid #111;
            color: #111;
            text-decoration: none;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .back-btn:hover {
            background: #111;
            color: #fff;
        }

    </style>

</head>

<body>

{{-- NAVBAR --}}

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

             <a href="#" class="search-toggle" aria-label="Open search">
    <i class="bi bi-search"></i>
</a>

                

                <a href="#">
                    <i class="bi bi-bag"></i>
                </a>

            </div>

        </div>

    </div>

</nav>

</nav>

{{-- SEARCH POPUP --}}
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
            />

            <button
                type="submit"
                class="search-submit border-0 position-absolute bg-white"
                style="top: 15px; right: 15px;"
            >
                <i class="bi bi-search"></i>
            </button>

        </form>

        <div
            id="frontendSearchResults"
            class="mt-3"
            style="display:none;"
        ></div>

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
                        <a href="{{ route('category.show', $categoryItem->slug) }}">
                            {{ $categoryItem->name }}
                        </a>
                    </li>

                @endforeach

            </ul>

        </div>

    </div>
</div>


{{-- SEARCH HEADER --}}

<section class="search-header">

    <div class="container">

        <div class="search-label">
            Kaira Search
        </div>

        <h1 class="search-title">
            Results for <span>"{{ $keyword }}"</span>
        </h1>

        <div class="result-count">

            {{ $products->count() }}
            product(s) found

        </div>

    </div>

</section>


{{-- RESULTS --}}

<section class="search-section">

    <div class="container">


        {{-- PRODUCTS --}}

        @if($products->count() > 0)

            <div class="section-title">
                Products
            </div>

            <div class="row g-4 mb-5">

                @foreach($products as $product)

                    <div class="col-12 col-sm-6 col-lg-3">

                        <a
                            href="{{ route('product.show', $product->slug) }}"
                            class="product-card"
                        >

                            <div class="image-wrapper">

                                @if($product->image)

                                    <img
                                        src="{{ asset('uploads/products/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="product-image"
                                    >

                                @else

                                    <div
                                        class="product-image d-flex align-items-center justify-content-center"
                                    >
                                        <i class="bi bi-image fs-1 text-muted"></i>
                                    </div>

                                @endif

                            </div>

                            <div class="product-name">
                                {{ $product->name }}
                            </div>

                            <div class="product-price">

                                @if($product->discount_price)

                                    <span class="old-price">
                                        Rs. {{ number_format($product->price, 2) }}
                                    </span>

                                    Rs. {{ number_format($product->discount_price, 2) }}

                                @else

                                    Rs. {{ number_format($product->price, 2) }}

                                @endif

                            </div>

                        </a>

                    </div>

                @endforeach

            </div>

        @endif


        {{-- CATEGORIES --}}

        @if($categories->count() > 0)

            <div class="section-title mt-5">
                Categories
            </div>

            <div class="row g-3 mb-5">

                @foreach($categories as $category)

                    <div class="col-md-6">

                        <a
                            href="{{ route('category.show', $category->slug) }}"
                            class="category-result"
                        >

                            <i class="bi bi-grid"></i>

                            <strong>
                                {{ $category->name }}
                            </strong>

                            <span class="category-type">
                                Category
                            </span>

                        </a>

                    </div>

                @endforeach

            </div>

        @endif


        {{-- SUBCATEGORIES --}}

        @if($subCategories->count() > 0)

            <div class="section-title mt-5">
                Sub Categories
            </div>

            <div class="row g-3">

                @foreach($subCategories as $subCategory)

                    <div class="col-md-6">

                        <a
                            href="{{ route('subcategory.show', $subCategory->slug) }}"
                            class="category-result"
                        >

                            <i class="bi bi-tags"></i>

                            <strong>
                                {{ $subCategory->name }}
                            </strong>

                            <span class="category-type">
                                Sub Category
                            </span>

                        </a>

                    </div>

                @endforeach

            </div>

        @endif


        {{-- NOTHING FOUND --}}

        @if(
            $products->count() === 0 &&
            $categories->count() === 0 &&
            $subCategories->count() === 0
        )

            <div class="no-results">

                <i class="bi bi-search"></i>

                <h2>
                    No results found
                </h2>

                <p>
                    We couldn't find anything matching
                    "{{ $keyword }}".
                </p>

                <a
                    href="{{ route('user.products') }}"
                    class="back-btn"
                >
                    Continue Shopping
                </a>

            </div>

        @endif

    </div>

</section>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchToggle = document.querySelector('.search-toggle');
    const searchPopup = document.querySelector('.search-popup');
    const searchForm = document.getElementById('frontendSearchForm');
    const searchInput = document.getElementById('search-form');
    const searchResults = document.getElementById('frontendSearchResults');
    const browseCategories = document.getElementById('browseCategories');

    if (!searchToggle || !searchPopup || !searchInput || !searchResults) {
        return;
    }

    let searchTimeout = null;


    /* =========================================
       OPEN SEARCH
    ========================================= */

    searchToggle.addEventListener('click', function (e) {

        e.preventDefault();

        searchPopup.classList.toggle('is-visible');

        if (searchPopup.classList.contains('is-visible')) {
            setTimeout(() => {
                searchInput.focus();
            }, 100);
        }

    });


    /* =========================================
       LIVE RELATED SEARCH
    ========================================= */

    searchInput.addEventListener('input', function () {

        const keyword = this.value.trim();

        clearTimeout(searchTimeout);


        // Empty search
        if (keyword === '') {

            searchResults.innerHTML = '';
            searchResults.style.display = 'none';

            if (browseCategories) {
                browseCategories.style.display = 'block';
            }

            return;
        }


        // Small delay so we don't send request on every keystroke
        searchTimeout = setTimeout(() => {

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
            .then(response => {

                if (!response.ok) {
                    throw new Error('Search failed');
                }

                return response.json();

            })
            .then(results => {

                searchResults.innerHTML = '';

                if (browseCategories) {
                    browseCategories.style.display = 'none';
                }


                /* =================================
                   NO RESULTS
                ================================= */

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


                /* =================================
                   RESULTS TITLE
                ================================= */

                const title = document.createElement('div');

                title.className = 'search-suggestion-title';

                title.innerHTML = `
                    Suggestions for
                    "<strong>${escapeHtml(keyword)}</strong>"
                `;

                searchResults.appendChild(title);


                /* =================================
                   SHOW RESULTS
                ================================= */

                results.forEach(item => {

                    const result = document.createElement('a');

                    result.href = item.url;

                    result.className = 'search-suggestion';


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
                            <div class="search-suggestion-image no-image">
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
                                    ${number.toLocaleString('en-PK', {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    })}
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

                        <i class="bi bi-arrow-right search-arrow"></i>

                    `;


                    searchResults.appendChild(result);

                });


                searchResults.style.display = 'block';

            })
            .catch(error => {

                console.error(error);

                searchResults.innerHTML = `

                    <div class="search-no-results text-danger">

                        Search could not be completed.

                    </div>

                `;

                searchResults.style.display = 'block';

            });

        }, 250);

    });


    /* =========================================
       PRESS ENTER
    ========================================= */

    if (searchForm) {

        searchForm.addEventListener('submit', function (e) {

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

        });

    }


    /* =========================================
       ESCAPE HTML
    ========================================= */

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