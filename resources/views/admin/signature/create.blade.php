
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
            Add Signature
        </h4>

        <a href="{{ route('admin.signature.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </div>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.signature.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Product Name --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Product Name
                        </label>

                        <input type="text"
                               name="product_name"
                               class="form-control"
                               value="{{ old('product_name') }}"
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
                               name="price"
                               class="form-control"
                               value="{{ old('price') }}"
                               placeholder="0.00"
                               required>

                    </div>


                    {{-- Discount Price --}}
                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Discount Price
                        </label>

                        <input type="number"
                               step="0.01"
                               name="discount_price"
                               class="form-control"
                               value="{{ old('discount_price') }}"
                               placeholder="0.00">

                    </div>
                      {{-- Stock --}}
<div class="col-md-3 mb-3">

    <label class="form-label">
        Stock
    </label>

    <input type="number"
           name="stock"
           class="form-control"
           value="{{ old('stock', 0) }}"
           placeholder="Enter stock quantity"
           min="0"
           required>

    @error('stock')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

                    {{-- Description --}}
                    <div class="col-12 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="5"
                                  placeholder="Enter product description">{{ old('description') }}</textarea>

                    </div>


                    {{-- Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Product Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/*">

                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Sort Order
                        </label>

                        <input type="number"
                               name="sort_order"
                               class="form-control"
                               value="{{ old('sort_order', 0) }}"
                               min="0">

                    </div>


                    {{-- Show on Home --}}
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Show on Home
                        </label>

                        <select name="show_on_home"
                                class="form-select">

                            <option value="1">
                                Yes
                            </option>

                            <option value="0">
                                No
                            </option>

                        </select>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="Active">
                                Active
                            </option>

                            <option value="Inactive">
                                Inactive
                            </option>

                        </select>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bx bx-save"></i>
                    Save Signature

                </button>

            </form>

        </div>

    </div>

</div>



 @include('admin.footer')


 @include('admin.js')


 </body>
</html>