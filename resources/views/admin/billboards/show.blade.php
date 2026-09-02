
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

        <div>
            <h4 class="fw-bold mb-1">Billboard Details</h4>
            <p class="text-muted mb-0">
                View billboard information
            </p>
        </div>

        <div>

            <a href="{{ route('admin.billboards.edit', $billboard) }}"
               class="btn btn-warning">

                <i class="bx bx-edit me-1"></i>
                Edit

            </a>

            <a href="{{ route('admin.billboards.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>


    <div class="card">

        <div class="card-body">

            {{-- UUID --}}
            <div class="mb-4">

                <label class="form-label fw-bold">
                    UUID
                </label>

                <div class="form-control bg-light">
                    {{ $billboard->uuid }}
                </div>

            </div>


            {{-- Name --}}
            <div class="mb-4">

                <label class="form-label fw-bold">
                    Name
                </label>

                <div class="form-control bg-light">
                    {{ $billboard->name }}
                </div>

            </div>


            {{-- Description --}}
            <div class="mb-4">

                <label class="form-label fw-bold">
                    Description
                </label>

                <div class="form-control bg-light"
                     style="min-height: 120px; white-space: pre-wrap;">
                    {{ $billboard->description ?: 'No description available.' }}
                </div>

            </div>


            {{-- Dates --}}
            <div class="row">

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Created At
                    </label>

                    <div class="form-control bg-light">
                        {{ $billboard->created_at?->format('d M Y, h:i A') }}
                    </div>

                </div>

                <div class="col-md-6">

                    <label class="form-label fw-bold">
                        Updated At
                    </label>

                    <div class="form-control bg-light">
                        {{ $billboard->updated_at?->format('d M Y, h:i A') }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

 


 @include('admin.js')


 </body>
</html>