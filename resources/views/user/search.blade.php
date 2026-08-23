<div class="search-popup">
    <div class="search-popup-container">

        <form
            role="search"
            method="GET"
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
                <svg class="search" width="24" height="24">
                    <use xlink:href="#search"></use>
                </svg>
            </button>

        </form>

        <!-- Search Results -->

        <div
            id="frontendSearchResults"
            class="mt-3"
            style="display:none;"
        ></div>


        <!-- Categories -->

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
                    as $category
                )

                    <li class="cat-list-item">

                        <a
                            href="{{ route('category.show', $category->slug) }}"
                        >
                            {{ $category->name }}
                        </a>

                    </li>

                @endforeach

            </ul>

        </div>

    </div>
</div>






<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchForm = document.getElementById('frontendSearchForm');
    const searchInput = document.getElementById('search-form');
    const searchResults = document.getElementById('frontendSearchResults');
    const browseCategories = document.getElementById('browseCategories');

    if (!searchForm || !searchInput || !searchResults) {
        return;
    }

    let timeout;

    searchInput.addEventListener('input', function () {

        const keyword = this.value.trim();

        clearTimeout(timeout);

        if (keyword === '') {

            searchResults.innerHTML = '';
            searchResults.style.display = 'none';

            if (browseCategories) {
                browseCategories.style.display = 'block';
            }

            return;
        }

        timeout = setTimeout(function () {

            fetch(
                "{{ route('frontend.search') }}?search=" +
                encodeURIComponent(keyword),
                {
                    headers: {
                        'Accept': 'application/json'
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

                if (results.length === 0) {

                    searchResults.innerHTML = `
                        <div class="py-4 text-center text-muted">
                            <i class="bi bi-search fs-4 d-block mb-2"></i>
                            No results found for
                            "<strong>${escapeHtml(keyword)}</strong>"
                        </div>
                    `;

                    searchResults.style.display = 'block';

                    return;
                }

                results.forEach(function (item) {

                    const result = document.createElement('a');

                    result.href = item.url;

                    result.className =
                        'd-flex align-items-center gap-3 text-decoration-none py-3 border-bottom';

                    let imageHtml = '';

                    if (item.image) {

                        imageHtml = `
                            <img
                                src="${item.image}"
                                alt="${escapeHtml(item.name)}"
                                style="
                                    width:55px;
                                    height:55px;
                                    object-fit:cover;
                                    border-radius:6px;
                                "
                            >
                        `;

                    } else {

                        imageHtml = `
                            <div
                                style="
                                    width:55px;
                                    height:55px;
                                    background:#f5f5f5;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    border-radius:6px;
                                "
                            >
                                <i class="bi bi-grid"></i>
                            </div>
                        `;
                    }

                    let priceHtml = '';

                    if (item.price !== null && item.price !== undefined) {

                        priceHtml = `
                            <div class="small text-muted">
                                Rs. ${Number(item.price).toLocaleString(
                                    'en-PK',
                                    {
                                        minimumFractionDigits: 2,
                                        maximumFractionDigits: 2
                                    }
                                )}
                            </div>
                        `;
                    }

                    result.innerHTML = `
                        ${imageHtml}

                        <div class="flex-grow-1">

                            <div class="fw-semibold text-dark">
                                ${escapeHtml(item.name)}
                            </div>

                            <div class="small text-muted text-capitalize">
                                ${escapeHtml(item.type)}
                            </div>

                            ${priceHtml}

                        </div>

                        <i class="bi bi-arrow-right text-muted"></i>
                    `;

                    searchResults.appendChild(result);
                });

                searchResults.style.display = 'block';

            })
            .catch(error => {

                console.error(error);

                searchResults.innerHTML = `
                    <div class="py-3 text-center text-danger">
                        Search could not be completed.
                    </div>
                `;

                searchResults.style.display = 'block';
            });

        }, 300);

    });


    /*
    |--------------------------------------------------------------------------
    | Submit Search
    |--------------------------------------------------------------------------
    */

    searchForm.addEventListener('submit', function (event) {

        event.preventDefault();

        const firstResult =
            searchResults.querySelector('a');

        if (firstResult) {
            window.location.href = firstResult.href;
        }

    });


    /*
    |--------------------------------------------------------------------------
    | Escape HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        const div = document.createElement('div');

        div.textContent = value;

        return div.innerHTML;
    }

});
</script>