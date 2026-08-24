<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $category->name }} | Kaira</title>

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

@media (max-width: 767px) {

    .search-popup {
        top: 70px;
        padding: 25px 0 30px;
    }

    .search-popup-container {
        width: calc(100% - 30px);
    }

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
            color: #777;
        }


        /* =========================
           PAGE HEADER
        ========================= */

        .category-header {
            padding: 80px 0 55px;
            text-align: center;
        }

        .category-label {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 18px;
        }

        .category-title {
           
            font-size: 64px;
            font-weight: 390;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0 0 15px;
        }

        .category-description {
            max-width: 650px;
            margin: auto;
            color: #777;
            font-size: 14px;
            line-height: 1.9;
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

            margin-bottom: 50px;

            transition: .3s;
        }

        .back-home i {
            transition: .3s;
        }

        .back-home:hover {
            color: #777;
        }

        .back-home:hover i {
            transform: translateX(-5px);
        }


        /* =========================
           SUBCATEGORY SECTION
        ========================= */

        .subcategory-section {
            padding: 0 0 100px;
        }


        /* =========================
           SUBCATEGORY CARD
        ========================= */

        .subcategory-card {
            text-decoration: none;
            color: #111;
            display: block;
        }

        .subcategory-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f5f5f5;
        }

        .subcategory-image-wrapper img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
            transition: transform .7s ease;
        }

        .subcategory-card:hover img {
            transform: scale(1.04);
        }


        /* =========================
           OVERLAY
        ========================= */

        .subcategory-overlay {
            position: absolute;
            inset: 0;

            background: rgba(0, 0, 0, 0);

            display: flex;
            align-items: flex-end;
            justify-content: center;

            padding: 30px;

            transition: .4s ease;
        }

        .subcategory-card:hover .subcategory-overlay {
            background: rgba(0, 0, 0, .18);
        }


        /* =========================
           EXPLORE BUTTON
        ========================= */

        .explore-btn {
            background: #fff;
            color: #111;

            padding: 13px 25px;

            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;

            opacity: 0;
            transform: translateY(15px);

            transition: .4s ease;
        }

        .subcategory-card:hover .explore-btn {
            opacity: 1;
            transform: translateY(0);
        }


        /* =========================
           SUBCATEGORY INFO
        ========================= */

        .subcategory-info {
            padding: 20px 5px 35px;
        }

        .subcategory-name {
         
            font-size: 30px;
            font-weight: 390;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin: 0 0 7px;
        }

        .subcategory-text {
            font-size: 11px;
            color: #888;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }


        /* =========================
           EMPTY STATE
        ========================= */

        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state i {
            font-size: 55px;
            color: #aaa;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 35px;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: #888;
            font-size: 14px;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            background: #111;
            color: #fff;
            padding: 60px 0;
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
            line-height: 1.8;
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


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 991px) {

            .nav-links {
                display: none;
            }

            .category-title {
                font-size: 52px;
            }

            .subcategory-image-wrapper img {
                height: 430px;
            }

        }


        @media (max-width: 767px) {

            .main-navbar {
                height: 70px;
            }

            .brand {
                font-size: 28px;
            }

            .category-header {
                padding: 55px 0 40px;
            }

            .category-title {
                font-size: 42px;
            }

            .category-description {
                padding: 0 20px;
            }

            .subcategory-image-wrapper img {
                height: 430px;
            }

            .subcategory-name {
                font-size: 27px;
            }

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

@media (max-width: 767px) {

    .search-popup {
        top: 70px;
        padding: 25px 0 30px;
    }

    .search-popup-container {
        width: calc(100% - 30px);
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

             <a href="#" class="search-toggle" aria-label="Open search">
    <i class="bi bi-search"></i>
</a>



<a 
    href="{{ route('newsletter.index') }}" 
    aria-label="Newsletter & Suggestions"
    title="Newsletter & Suggestions"
>
    <i class="bi bi-person"></i>
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



{{-- =========================
     CATEGORY HEADER
========================= --}}

<section class="category-header">

    <div class="container">


        {{-- BACK BUTTON --}}

        


        <div class="category-label">
            Kaira Collection
        </div>


        <h1 class="category-title">

            {{ $category->name }}

        </h1>


        @if($category->description)

            <div class="category-description">

                {!! $category->description !!}

            </div>

        @else

            <div class="category-description">

                Explore our {{ $category->name }} collection,
                carefully curated for timeless style and modern living.

            </div>

        @endif


    </div>

</section>



{{-- =========================
     SUBCATEGORIES
========================= --}}

<section class="subcategory-section">

    <div class="container">


        @if($subCategories->count() > 0)

            <div class="row g-4">


                @foreach($subCategories as $subCategory)

                    <div class="col-md-6 col-lg-4">


                        <a
                            href="{{ route('subcategory.show', $subCategory->slug) }}"
                            class="subcategory-card"
                        >


                            {{-- IMAGE --}}

                            <div class="subcategory-image-wrapper">


                                @if($subCategory->image)

                                    <img
                                        src="{{ asset('uploads/subcategories/' . $subCategory->image) }}"
                                        alt="{{ $subCategory->name }}"
                                    >

                                @else

                                    <div
                                        class="d-flex align-items-center justify-content-center"
                                        style="height:500px;"
                                    >

                                        <i
                                            class="bi bi-image"
                                            style="font-size:70px;color:#aaa;"
                                        ></i>

                                    </div>

                                @endif


                                {{-- HOVER OVERLAY --}}

                                <div class="subcategory-overlay">

                                    <span class="explore-btn">

                                        Explore Collection

                                    </span>

                                </div>


                            </div>


                            {{-- INFO --}}

                            <div class="subcategory-info">

                                <h2 class="subcategory-name">

                                    {{ $subCategory->name }}

                                </h2>


                                <div class="subcategory-text">

                                    Discover {{ $subCategory->name }}

                                </div>

                            </div>


                        </a>

                    </div>

                @endforeach


            </div>


        @else


            {{-- NO SUBCATEGORIES --}}

            <div class="empty-state">

                <i class="bi bi-grid"></i>

                <h3>
                    No Collections Available
                </h3>

                <p>
                    There are currently no subcategories available
                    in this collection.
                </p>

            </div>


        @endif


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



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>
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








