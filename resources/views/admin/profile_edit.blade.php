

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
            <h4>
                <i class="bx bx-edit"></i> Edit Profile
            </h4>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text"
                           name="name"
                           value="{{ $admin->name }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           value="{{ $admin->email }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-save"></i> Update Profile
                </button>

                <a href="{{ route('admin.profile') }}" class="btn btn-secondary">
                    Cancel
                </a>

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
