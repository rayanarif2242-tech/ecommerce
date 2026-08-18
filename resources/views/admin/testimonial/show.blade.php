@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Testimonial Details
        </h4>

        <div>

            <a
                href="{{ route(
                    'admin.testimonial.edit',
                    $testimonial
                ) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route('admin.testimonial.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>


    <div class="card">

        <div class="card-body">

            <div class="row">


                {{-- UUID --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Testimonial UUID
                    </strong>

                    <div class="mt-1 text-primary">

                        {{ $testimonial->testimonial_id }}

                    </div>

                </div>


                {{-- Product --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Product Name
                    </strong>

                    <div class="mt-1">

                        {{ $testimonial->product_name }}

                    </div>

                </div>


                {{-- Title --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Title
                    </strong>

                    <div class="mt-1">

                        {{ $testimonial->title }}

                    </div>

                </div>


                {{-- Price --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Price
                    </strong>

                    <div class="mt-1">

                        {{ $testimonial->price
                            ? number_format(
                                $testimonial->price,
                                2
                            )
                            : '-'
                        }}

                    </div>

                </div>


                {{-- Discount --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Discount Price
                    </strong>

                    <div class="mt-1">

                        {{ $testimonial->discount_price
                            ? number_format(
                                $testimonial->discount_price,
                                2
                            )
                            : '-'
                        }}

                    </div>

                </div>


                {{-- Sort --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Sort Order
                    </strong>

                    <div class="mt-1">

                        {{ $testimonial->sort_order }}

                    </div>

                </div>


                {{-- Active --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Active
                    </strong>

                    <div class="mt-1">

                        @if($testimonial->active)

                            <span class="badge bg-success">
                                Active
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Inactive
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Home --}}
                <div class="col-md-6 mb-4">

                    <strong>
                        Show on Home
                    </strong>

                    <div class="mt-1">

                        @if($testimonial->show_on_home)

                            <span class="badge bg-success">
                                Yes
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                No
                            </span>

                        @endif

                    </div>

                </div>


                {{-- Description --}}
                <div class="col-md-12 mb-4">

                    <strong>
                        Description
                    </strong>

                    <div class="mt-2">

                        {{ $testimonial->description
                            ?: 'No description available.'
                        }}

                    </div>

                </div>

            </div>


            <a
                href="{{ route(
                    'admin.testimonial.edit',
                    $testimonial
                ) }}"
                class="btn btn-warning"
            >
                Edit Testimonial
            </a>

        </div>

    </div>

</div>

@endsection