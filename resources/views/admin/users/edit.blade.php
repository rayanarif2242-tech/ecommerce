

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

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4 class="mb-0">
                        <i class="bx bx-edit text-warning"></i>
                        Edit User
                    </h4>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="bx bx-arrow-back"></i>
                        Back
                    </a>

                </div>

                <div class="card-body">

                <form action="{{ route('users.update',$user->uuid) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name',$user->name) }}">

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email',$user->email) }}">

                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                New Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Leave blank if you don't want to change it">

                            <small class="text-muted">
                                Leave empty to keep the current password.
                            </small>

                            @error('password')
                                <small class="text-danger d-block">{{ $message }}</small>
                            @enderror

                        </div>

                        <button class="btn btn-warning">
                            <i class="bx bx-save"></i>
                            Update User
                        </button>

                    </form>

                </div>

            </div>

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
