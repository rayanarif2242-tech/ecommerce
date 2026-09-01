
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
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
        <!-- Menu -->
 @include('admin.sidebar')
  <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
             @include('admin.nav')



<div class="container-xxl flex-grow-1 container-p-y">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold mb-0">
            Edit Signature
        </h4>

        <a href="{{ route('admin.signature.index') }}"
           class="btn btn-secondary">

            <i class="bx bx-arrow-back"></i>
            Back

        </a>

    </div>

    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                Signature Information
            </h5>

        </div>

        <div class="card-body">

            {{-- Validation Errors --}}
            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('admin.signature.update', $signature) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Signature UUID --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Signature ID
                        </label>

                        <input type="text"
                               class="form-control"
                               value="{{ $signature->signature_id }}"
                               readonly>

                        <small class="text-muted">
                            UUID cannot be changed.
                        </small>

                    </div>


                    {{-- Product Name --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Product Name
                        </label>

                        <input type="text"
                               name="product_name"
                               class="form-control"
                               value="{{ old('product_name', $signature->product_name) }}"
                               placeholder="Enter product name"
                               required>

                    </div>


                    {{-- Price --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Price
                        </label>

                        <input type="number"
                               step="0.01"
                               min="0"
                               name="price"
                               class="form-control"
                               value="{{ old('price', $signature->price) }}"
                               required>

                    </div>


                    {{-- Discount Price --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Discount Price
                        </label>

                        <input type="number"
                               step="0.01"
                               min="0"
                               name="discount_price"
                               class="form-control"
                               value="{{ old('discount_price', $signature->discount_price) }}">

                    </div>
           

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="5"
                                  placeholder="Enter product description">{{ old('description', $signature->description) }}</textarea>

                    </div>


                    {{-- Current Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Current Image
                        </label>

                        <div class="mb-3">

                            @if($signature->image)

                                <img src="{{ asset($signature->image) }}"
                                     alt="{{ $signature->product_name }}"
                                     width="150"
                                     height="150"
                                     class="rounded"
                                     style="object-fit: cover;">

                            @else

                                <div class="text-muted">
                                    No image available
                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- New Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Change Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/jpeg,image/png,image/jpg,image/webp">

                        <small class="text-muted">
                            Leave empty to keep the current image.
                        </small>

                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Sort Order
                        </label>

                        <input type="number"
                               name="sort_order"
                               class="form-control"
                               min="0"
                               value="{{ old('sort_order', $signature->sort_order) }}">

                    </div>
                    {{-- Stock --}}
<div class="col-md-3 mb-3">

    <label class="form-label">
        Stock
    </label>

    <input type="number"
           name="stock"
           class="form-control"
           min="0"
           value="{{ old('stock', $signature->stock) }}"
           placeholder="Enter stock quantity"
           required>

    @error('stock')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>


                    {{-- Show on Home --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Show on Home
                        </label>

                        <select name="show_on_home"
                                class="form-select">

                            <option value="1"
                                {{ old('show_on_home', $signature->show_on_home) == 1 ? 'selected' : '' }}>
                                Yes
                            </option>

                            <option value="0"
                                {{ old('show_on_home', $signature->show_on_home) == 0 ? 'selected' : '' }}>
                                No
                            </option>

                        </select>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="Active"
                                {{ old('status', $signature->status) == 'Active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="Inactive"
                                {{ old('status', $signature->status) == 'Inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>


                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bx bx-save"></i>
                        Update Signature

                    </button>

                    <a href="{{ route('admin.signature.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>






 @include('admin.js')


 </body>
</html>