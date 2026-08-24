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