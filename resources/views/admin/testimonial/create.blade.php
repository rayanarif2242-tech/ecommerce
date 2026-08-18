@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Add Testimonial
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

            <form
                action="{{ route('admin.testimonial.store') }}"
                method="POST"
            >

                @csrf


                {{-- Product Name --}}
                <div class="mb-3">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="product_name"
                        class="form-control"
                        value="{{ old('product_name') }}"
                        required
                    >

                    @error('product_name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

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
                        value="{{ old('title') }}"
                        required
                    >

                    @error('title')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

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
                            value="{{ old('price') }}"
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
                            value="{{ old('discount_price') }}"
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
                        value="{{ old('sort_order', 0) }}"
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
                        {{ old('active', 1) ? 'checked' : '' }}
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
                        {{ old('show_on_home') ? 'checked' : '' }}
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
                    >{{ old('description') }}</textarea>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Save Testimonial
                </button>

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