
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
            Signature Details
        </h4>

        <div>

            <a href="{{ route('admin.signature.edit', $signature) }}"
               class="btn btn-warning">

                <i class="bx bx-edit"></i>
                Edit

            </a>

            <a href="{{ route('admin.signature.index') }}"
               class="btn btn-secondary">

                <i class="bx bx-arrow-back"></i>
                Back

            </a>

        </div>

    </div>


    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                {{ $signature->product_name }}
            </h5>

        </div>


        <div class="card-body">

            <div class="row">


                {{-- Image --}}
                <div class="col-md-4 text-center mb-4">

                    @if($signature->image)

                        <img src="{{ asset($signature->image) }}"
                             alt="{{ $signature->product_name }}"
                             class="img-fluid rounded"
                             style="max-height: 350px; object-fit: cover;">

                    @else

                        <div class="border rounded p-5 text-muted">

                            <i class="bx bx-image"
                               style="font-size: 60px;"></i>

                            <p class="mb-0">
                                No Image
                            </p>

                        </div>

                    @endif

                </div>


                {{-- Information --}}
                <div class="col-md-8">

                    {{-- UUID --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Signature ID
                        </label>

                        <div class="form-control bg-light">
                            {{ $signature->signature_id }}
                        </div>

                    </div>


                    {{-- Product Name --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Product Name
                        </label>

                        <div class="form-control bg-light">
                            {{ $signature->product_name }}
                        </div>

                    </div>


                    <div class="row">

                        {{-- Price --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-bold">
                                Price
                            </label>

                            <div class="form-control bg-light">
                                {{ number_format($signature->price, 2) }}
                            </div>

                        </div>


                        {{-- Discount Price --}}
                        <div class="col-md-6 mb-4">

                            <label class="form-label fw-bold">
                                Discount Price
                            </label>

                            <div class="form-control bg-light">

                                @if($signature->discount_price)

                                    {{ number_format($signature->discount_price, 2) }}

                                @else

                                    -

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Description --}}
                    <div class="mb-4">

                        <label class="form-label fw-bold">
                            Description
                        </label>

                        <div class="border rounded p-3 bg-light">

                            {!! nl2br(e($signature->description)) !!}

                        </div>

                    </div>


                    <div class="row">

                        {{-- Sort Order --}}
                        <div class="col-md-4 mb-4">

                            <label class="form-label fw-bold">
                                Sort Order
                            </label>

                            <div class="form-control bg-light">
                                {{ $signature->sort_order }}
                            </div>

                        </div>
         

                        {{-- Show on Home --}}
                        <div class="col-md-4 mb-4">

                            <label class="form-label fw-bold">
                                Show on Home
                            </label>

                            <div class="mt-2">

                                @if($signature->show_on_home)

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

                        {{-- Status --}}
                        <div class="col-md-4 mb-4">

                            <label class="form-label fw-bold">
                                Status
                            </label>

                            <div class="mt-2">

                                @if($signature->status === 'Active')

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

                    </div>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="card-footer">

            <small class="text-muted">

                Created:
                {{ $signature->created_at?->format('d M Y, h:i A') }}

                @if($signature->updated_at)

                    &nbsp; | &nbsp;

                    Updated:
                    {{ $signature->updated_at->format('d M Y, h:i A') }}

                @endif

            </small>

        </div>

    </div>

</div>





 @include('admin.js')


 </body>
</html>