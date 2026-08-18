@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold mb-0">
            Testimonials
        </h4>

        <a
            href="{{ route('testimonials.create') }}"
            class="btn btn-primary"
        >
            <i class="bx bx-plus"></i>
            Add Testimonial
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- Search --}}
    <div class="card mb-4">

        <div class="card-body">

            <form
                method="GET"
                action="{{ route('testimonials.index') }}"
            >

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Search UUID, product name, title..."
                        value="{{ request('search') }}"
                    >

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bx bx-search"></i>
                        Search
                    </button>

                    @if(request('search'))

                        <a
                            href="{{ route('testimonials.index') }}"
                            class="btn btn-secondary"
                        >
                            <i class="bx bx-x"></i>
                            Clear
                        </a>

                    @endif

                </div>

            </form>

        </div>

    </div>


    {{-- Table --}}
    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                All Testimonials
            </h5>

        </div>


        <div class="table-responsive">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>UUID</th>

                        <th>Product Name</th>

                        <th>Title</th>

                        <th>Active</th>

                        <th>Home</th>

                        <th>Sort</th>

                        <th>Price</th>

                        <th>Discount Price</th>

                        <th>Description</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($testimonials as $testimonial)

                        <tr>

                            {{-- Number --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- UUID --}}
                            <td>

                                <span
                                    title="{{ $testimonial->testimonial_id }}"
                                    class="text-primary"
                                    style="cursor: pointer;"
                                >

                                    {{ Str::limit(
                                        $testimonial->testimonial_id,
                                        12,
                                        '...'
                                    ) }}

                                </span>

                            </td>


                            {{-- Product Name --}}
                            <td>
                                {{ $testimonial->product_name }}
                            </td>


                            {{-- Title --}}
                            <td>
                                {{ $testimonial->title }}
                            </td>


                            {{-- Active --}}
                            <td>

                                @if($testimonial->active)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>


                            {{-- Show On Home --}}
                            <td>

                                @if($testimonial->show_on_home)

                                    <span class="badge bg-success">
                                        Yes
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        No
                                    </span>

                                @endif

                            </td>


                            {{-- Sort Order --}}
                            <td>
                                {{ $testimonial->sort_order }}
                            </td>


                            {{-- Price --}}
                            <td>

                                @if($testimonial->price !== null)

                                    {{ number_format(
                                        $testimonial->price,
                                        2
                                    ) }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- Discount Price --}}
                            <td>

                                @if($testimonial->discount_price !== null)

                                    {{ number_format(
                                        $testimonial->discount_price,
                                        2
                                    ) }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- Description --}}
                            <td>

                                @if($testimonial->description)

                                    {{ Str::limit(
                                        $testimonial->description,
                                        40,
                                        '...'
                                    ) }}

                                @else

                                    -

                                @endif

                            </td>


                            {{-- Actions --}}
                            <td>

                                <div class="d-flex gap-1">

                                    {{-- SHOW --}}
                                    <a
                                        href="{{ route(
                                            'testimonials.show',
                                            $testimonial
                                        ) }}"
                                        class="btn btn-sm btn-info"
                                        title="Show"
                                    >
                                        <i class="bx bx-show"></i>
                                    </a>


                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route(
                                            'testimonials.edit',
                                            $testimonial
                                        ) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit"
                                    >
                                        <i class="bx bx-edit"></i>
                                    </a>


                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route(
                                            'testimonials.destroy',
                                            $testimonial
                                        ) }}"
                                        method="POST"
                                        onsubmit="return confirm(
                                            'Are you sure you want to delete this testimonial?'
                                        )"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Delete"
                                        >
                                            <i class="bx bx-trash"></i>
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="11"
                                class="text-center py-4"
                            >

                                <i class="bx bx-message-square-x fs-1"></i>

                                <p class="mb-0">
                                    No testimonials found.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        <div class="card-body">

            {{ $testimonials->withQueryString()->links() }}

        </div>

    </div>

</div>

@endsection