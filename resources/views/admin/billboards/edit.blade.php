

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

          <!-- Content wrapper -->
        <div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-header">
            <h4 class="mb-0">
                <i class="bx bx-edit"></i>
                Edit Billboard
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('billboards.update', $billboard) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- UUID -->
                <div class="mb-3">
                    <label class="form-label">Billboard UUID</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $billboard->billboard_id }}"
                           readonly>
                </div>

                @include('admin.billboards.form')

                <div class="mt-3">

                    <button type="submit" class="btn btn-warning">
                        <i class="bx bx-save"></i>
                        Update Billboard
                    </button>

                    <a href="{{ route('billboards.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>
            <!-- / Content -->

          
           @include('admin.footer')
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
