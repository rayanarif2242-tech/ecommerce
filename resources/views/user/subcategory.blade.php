
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="text-uppercase">
                {{ $subCategory->name }}
            </h1>

            <p>
                Explore our {{ $subCategory->name }} collection
            </p>

        </div>

        <div class="row">

            @forelse($products as $product)

                <div class="col-md-4 col-lg-3 mb-4">

                    <div class="product-item">

                        <div class="image-holder">

                            <a href="{{ route('product.show', $product->slug) }}">

                                <img
                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="img-fluid"
                                    style="width:100%; height:350px; object-fit:cover;"
                                >

                            </a>

                        </div>

                        <div class="product-info text-center mt-3">

                            <h5>
                                {{ $product->name }}
                            </h5>

                            @if($product->discount_price)

                                <span class="text-muted text-decoration-line-through">
                                    Rs. {{ number_format($product->price) }}
                                </span>

                                <strong class="ms-2">
                                    Rs. {{ number_format($product->discount_price) }}
                                </strong>

                            @else

                                <strong>
                                    Rs. {{ number_format($product->price) }}
                                </strong>

                            @endif

                            <div class="mt-3">

                                <a
                                    href="{{ route('product.show', $product->slug) }}"
                                    class="btn btn-dark"
                                >
                                    View Product
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    <h4>No products available.</h4>

                </div>

            @endforelse

        </div>

    </div>

</section>

