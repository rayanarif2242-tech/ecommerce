

<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

            {{-- Product Image --}}
            <div class="col-md-6">

                <div class="product-image">

                    @if($product->image)

                        <img
                            src="{{ asset('uploads/products/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="img-fluid"
                            style="width:100%; max-height:600px; object-fit:cover;"
                        >

                    @endif

                </div>

            </div>


            {{-- Product Information --}}
            <div class="col-md-6">

                <h1 class="text-uppercase mb-3">
                    {{ $product->name }}
                </h1>

                <div class="mb-3">

                    @if($product->discount_price)

                        <span class="text-muted text-decoration-line-through fs-5">
                            Rs. {{ number_format($product->price) }}
                        </span>

                        <span class="fs-3 fw-bold ms-2">
                            Rs. {{ number_format($product->discount_price) }}
                        </span>

                    @else

                        <span class="fs-3 fw-bold">
                            Rs. {{ number_format($product->price) }}
                        </span>

                    @endif

                </div>


                @if($product->description)

                    <div class="mb-4">

                        {!! $product->description !!}

                    </div>

                @endif


                <div class="mb-4">

                    @if($product->stock > 0)

                        <span class="badge bg-success">
                            In Stock
                        </span>

                    @else

                        <span class="badge bg-danger">
                            Out of Stock
                        </span>

                    @endif

                </div>


                @if($product->stock > 0)

                    <form action="{{ route('cart.add') }}" method="POST">

                        @csrf

                        <input
                            type="hidden"
                            name="product_id"
                            value="{{ $product->product_id }}"
                        >

                        <div class="mb-3">

                            <label class="form-label">
                                Quantity
                            </label>

                            <input
                                type="number"
                                name="quantity"
                                value="1"
                                min="1"
                                max="{{ $product->stock }}"
                                class="form-control"
                                style="width:100px;"
                            >

                        </div>

                        <button
                            type="submit"
                            class="btn btn-dark btn-lg"
                        >
                            Add To Cart
                        </button>

                    </form>

                @else

                    <button
                        class="btn btn-secondary btn-lg"
                        disabled
                    >
                        Out of Stock
                    </button>

                @endif

            </div>

        </div>

    </div>

</section>

