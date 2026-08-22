<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>

<head>
    @include('admin.header')
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            <!-- Sidebar -->
            @include('admin.sidebar')
            <!-- / Sidebar -->


            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('admin.nav')
                <!-- / Navbar -->


                <!-- Content wrapper -->
                <div class="container-xxl container-p-y">

                    <!-- Page Title -->
                    <h4 class="fw-bold mb-4">
                        Edit Product
                    </h4>


                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            {{ session('success') }}

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="alert">
                            </button>

                        </div>
                    @endif


                    <!-- Validation Errors -->
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <strong>Please fix the following errors:</strong>

                            <ul class="mb-0 mt-2">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <!-- Product Card -->
                    <div class="card">

                        <div class="card-body">


                            <!-- IMPORTANT: UPDATE FORM -->

                            <form
                                action="{{ route('admin.products.update', ['product' => $product->product_id]) }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                @csrf

                                @method('PUT')


                                <div class="row">


                                    <!-- Product Name -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Product Name
                                        </label>

                                        <input
                                            type="text"
                                            name="name"
                                            value="{{ old('name', $product->name) }}"
                                            class="form-control"
                                            placeholder="Enter product name"
                                            required
                                        >

                                    </div>


                                    <!-- Category -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Category
                                        </label>

                                        <select
                                            name="category_id"
                                            class="form-control"
                                            required
                                        >

                                            <option value="">
                                                Select Category
                                            </option>


                                            @foreach($categories as $category)

                                                <option
                                                    value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                                                >

                                                    {{ $category->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>


                                    <!-- Price -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Price
                                        </label>

                                        <input
                                            type="number"
                                            name="price"
                                            value="{{ old('price', $product->price) }}"
                                            class="form-control"
                                            min="0"
                                            step="0.01"
                                            required
                                        >

                                    </div>


                                    <!-- Discount Price -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Discount Price
                                        </label>

                                        <input
                                            type="number"
                                            name="discount_price"
                                            value="{{ old('discount_price', $product->discount_price) }}"
                                            class="form-control"
                                            min="0"
                                            step="0.01"
                                        >

                                    </div>


                                    <!-- Stock -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Stock
                                        </label>

                                        <input
                                            type="number"
                                            name="stock"
                                            value="{{ old('stock', $product->stock) }}"
                                            class="form-control"
                                            min="0"
                                            required
                                        >

                                    </div>


                                    <!-- Product Image -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Product Image
                                        </label>


                                        @if($product->image)

                                            <div class="mb-3">

                                                <img
                                                    src="{{ asset('uploads/products/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                    width="120"
                                                    height="120"
                                                    style="object-fit: cover;"
                                                    class="rounded border"
                                                >

                                            </div>

                                        @endif


                                        <input
                                            type="file"
                                            name="image"
                                            class="form-control"
                                            accept=".jpg,.jpeg,.png,.webp"
                                        >

                                        <small class="text-muted">
                                            Leave empty if you don't want to change the image.
                                        </small>

                                    </div>


                                    <!-- Description -->
                                    <div class="col-md-12 mb-3">

                                        <label class="form-label">
                                            Description
                                        </label>

                                        <textarea
                                            name="description"
                                            class="form-control"
                                            rows="5"
                                            placeholder="Enter product description"
                                        >{{ old('description', $product->description) }}</textarea>

                                    </div>


                                    <!-- Featured -->
                                    <div class="col-md-4 mb-3">

                                        <label class="form-label">
                                            Featured
                                        </label>

                                        <select
                                            name="featured"
                                            class="form-control"
                                        >

                                            <option
                                                value="1"
                                                {{ old('featured', $product->featured) == 1 ? 'selected' : '' }}
                                            >
                                                Yes
                                            </option>

                                            <option
                                                value="0"
                                                {{ old('featured', $product->featured) == 0 ? 'selected' : '' }}
                                            >
                                                No
                                            </option>

                                        </select>

                                    </div>


                                    <!-- Show On Home -->
                                    <div class="col-md-4 mb-3">

                                        <label class="form-label">
                                            Show On Home
                                        </label>

                                        <select
                                            name="home"
                                            class="form-control"
                                        >

                                            <option
                                                value="1"
                                                {{ old('home', $product->home) == 1 ? 'selected' : '' }}
                                            >
                                                Yes
                                            </option>

                                            <option
                                                value="0"
                                                {{ old('home', $product->home) == 0 ? 'selected' : '' }}
                                            >
                                                No
                                            </option>

                                        </select>

                                    </div>


                                    <!-- Status -->
                                    <div class="col-md-4 mb-3">

                                        <label class="form-label">
                                            Status
                                        </label>

                                        <select
                                            name="status"
                                            class="form-control"
                                        >

                                            <option
                                                value="1"
                                                {{ old('status', $product->status) == 1 ? 'selected' : '' }}
                                            >
                                                Active
                                            </option>

                                            <option
                                                value="0"
                                                {{ old('status', $product->status) == 0 ? 'selected' : '' }}
                                            >
                                                Inactive
                                            </option>

                                        </select>

                                    </div>


                                    <!-- Sort Order -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Sort Order
                                        </label>

                                        <input
                                            type="number"
                                            name="sort"
                                            value="{{ old('sort', $product->sort) }}"
                                            class="form-control"
                                            min="0"
                                        >

                                    </div>


                                    <!-- Buttons -->
                                    <div class="col-12 mt-4">

                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >

                                            <i class="bx bx-save me-1"></i>

                                            Update Product

                                        </button>


                                        <a
                                            href="{{ route('admin.products.index') }}"
                                            class="btn btn-secondary"
                                        >

                                            <i class="bx bx-arrow-back me-1"></i>

                                            Back

                                        </a>

                                    </div>


                                </div>

                            </form>

                        </div>

                    </div>

                </div>
                <!-- / Content -->


                <!-- Footer -->
                @include('admin.footer')
                <!-- / Footer -->

            </div>
            <!-- / Layout container -->

        </div>

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')

</body>

</html>