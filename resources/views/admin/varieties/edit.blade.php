
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
        <h4 class="fw-bold mb-0">Edit Variety</h4>

        <a href="{{ route('admin.varieties.index') }}" class="btn btn-secondary">
            <i class="bx bx-arrow-back me-1"></i>
            Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Update Variety</h5>
        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.varieties.update', $variety) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                <div class="row">

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title', $variety->title) }}"
                            required
                        >
                    </div>


                    {{-- Product --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Product
                        </label>

                        <select name="product_id" class="form-select">

                            <option value="">Select Product</option>

                            @foreach($products as $product)

                                <option
                                    value="{{ $product->uuid }}"
                                    {{ old('product_id', $variety->product_id) == $product->uuid ? 'selected' : '' }}
                                >
                                    {{ $product->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>


                    {{-- Subtitle --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Subtitle
                        </label>

                        <textarea
                            name="subtitle"
                            class="form-control"
                            rows="3"
                        >{{ old('subtitle', $variety->subtitle) }}</textarea>
                    </div>


                    {{-- Button Text --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Button Text
                        </label>

                        <input
                            type="text"
                            name="button_text"
                            class="form-control"
                            value="{{ old('button_text', $variety->button_text) }}"
                            placeholder="Shop Now"
                        >
                    </div>


                    {{-- Button Link --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Button Link
                        </label>

                        <input
                            type="text"
                            name="button_link"
                            class="form-control"
                            value="{{ old('button_link', $variety->button_link) }}"
                            placeholder="/products"
                        >
                    </div>


                    {{-- Desktop Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Desktop Image
                        </label>

                        @if($variety->image)
                            <div class="mb-3">
                                <img
                                    src="{{ asset('storage/' . $variety->image) }}"
                                    alt="Current Image"
                                    style="width: 180px; height: 100px; object-fit: cover;"
                                    class="rounded border"
                                >
                            </div>
                        @endif

                        <input
                            type="file"
                            name="image"
                            class="form-control"
                            accept="image/*"
                        >

                        <small class="text-muted">
                            Leave empty to keep the current image.
                        </small>

                    </div>


                    {{-- Mobile Image --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Mobile Image
                        </label>

                        @if($variety->mobile_image)
                            <div class="mb-3">
                                <img
                                    src="{{ asset('storage/' . $variety->mobile_image) }}"
                                    alt="Current Mobile Image"
                                    style="width: 120px; height: 150px; object-fit: cover;"
                                    class="rounded border"
                                >
                            </div>
                        @endif

                        <input
                            type="file"
                            name="mobile_image"
                            class="form-control"
                            accept="image/*"
                        >

                        <small class="text-muted">
                            Leave empty to keep the current image.
                        </small>

                    </div>


                    {{-- Position --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Position
                        </label>

                        <input
                            type="text"
                            name="position"
                            class="form-control"
                            value="{{ old('position', $variety->position) }}"
                            placeholder="left / center / right"
                        >
                    </div>


                    {{-- Sort Order --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Sort Order
                        </label>

                        <input
                            type="number"
                            name="sort_order"
                            class="form-control"
                            min="0"
                            value="{{ old('sort_order', $variety->sort_order) }}"
                        >
                    </div>


                    {{-- Status --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option
                                value="active"
                                {{ old('status', $variety->status) == 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                {{ old('status', $variety->status) == 'inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>
                    </div>


                    {{-- Featured --}}
                    <div class="col-md-12 mb-3">

                        <div class="form-check">

                            <input
                                type="checkbox"
                                name="featured"
                                value="1"
                                class="form-check-input"
                                id="featured"
                                {{ old('featured', $variety->featured) ? 'checked' : '' }}
                            >

                            <label
                                class="form-check-label"
                                for="featured"
                            >
                                Featured Variety
                            </label>

                        </div>

                    </div>


                    {{-- Start Date --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Start Date
                        </label>

                        <input
                            type="datetime-local"
                            name="start_date"
                            class="form-control"
                            value="{{ old('start_date', $variety->start_date ? $variety->start_date->format('Y-m-d\TH:i') : '') }}"
                        >

                    </div>


                    {{-- End Date --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            End Date
                        </label>

                        <input
                            type="datetime-local"
                            name="end_date"
                            class="form-control"
                            value="{{ old('end_date', $variety->end_date ? $variety->end_date->format('Y-m-d\TH:i') : '') }}"
                        >

                    </div>


                    {{-- Buttons --}}
                    <div class="col-12 mt-3">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bx bx-save me-1"></i>
                            Update Variety
                        </button>

                        <a
                            href="{{ route('admin.varieties.index') }}"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>

</div>



 


 @include('admin.js')


 </body>
</html>