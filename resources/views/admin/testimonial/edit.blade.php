@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Edit Testimonial
        </h4>

        <a
            href="{{ route('admin.testimonial.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            {{-- UUID --}}
            <div class="mb-4">

                <label class="form-label">
                    Testimonial UUID
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $testimonial->testimonial_id }}"
                    readonly
                >

            </div>


            <form
                action="{{ route(
                    'admin.testimonial.update',
                    $testimonial
                ) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                {{-- Product Name --}}
                <div class="mb-3">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="product_name"
                        class="form-control"
                        value="{{ old(
                            'product_name',
                            $testimonial->product_name
                        ) }}"
                        required
                    >

                </div>


                {{-- Title --}}
                <div class="mb-3">

                    <label class="form-label">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old(
                            'title',
                            $testimonial->title
                        ) }}"
                        required
                    >

                </div>


                {{-- Price --}}
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Price
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            name="price"
                            class="form-control"
                            value="{{ old(
                                'price',
                                $testimonial->price
                            ) }}"
                        >

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Discount Price
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            name="discount_price"
                            class="form-control"
                            value="{{ old(
                                'discount_price',
                                $testimonial->discount_price
                            ) }}"
                        >

                    </div>

                </div>


                {{-- Sort Order --}}
                <div class="mb-3">

                    <label class="form-label">
                        Sort Order
                    </label>

                    <input
                        type="number"
                        min="0"
                        name="sort_order"
                        class="form-control"
                        value="{{ old(
                            'sort_order',
                            $testimonial->sort_order
                        ) }}"
                    >

                </div>


                {{-- Active --}}
                <div class="form-check mb-3">

                    <input
                        type="checkbox"
                        name="active"
                        value="1"
                        id="active"
                        class="form-check-input"
                        {{ old(
                            'active',
                            $testimonial->active
                        ) ? 'checked' : '' }}
                    >

                    <label
                        class="form-check-label"
                        for="active"
                    >
                        Active
                    </label>

                </div>


                {{-- Show Home --}}
                <div class="form-check mb-3">

                    <input
                        type="checkbox"
                        name="show_on_home"
                        value="1"
                        id="show_on_home"
                        class="form-check-input"
                        {{ old(
                            'show_on_home',
                            $testimonial->show_on_home
                        ) ? 'checked' : '' }}
                    >

                    <label
                        class="form-check-label"
                        for="show_on_home"
                    >
                        Show on Home
                    </label>

                </div>


                {{-- Description --}}
                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control"
                    >{{ old(
                        'description',
                        $testimonial->description
                    ) }}</textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-success"
                >
                    Update Testimonial
                </button>


                <a
                    href="{{ route(
                        'admin.testimonial.show',
                        $testimonial
                    ) }}"
                    class="btn btn-info"
                >
                    Show
                </a>


                <a
                    href="{{ route('admin.testimonial.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection