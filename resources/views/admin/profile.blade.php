

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

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4><i class="bx bx-user"></i> My Profile</h4>
            

            <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">
                <i class="bx bx-edit"></i> Edit Profile
            </a>
               
           
        </div>

        <div class="card-body">

        
            <table class="table table-bordered">

                <tr>
                    <th width="200">Name</th>
                    <td>{{ $admin->name }}</td>
                </tr>
                
        

                <tr>
                    <th>Email</th>
                    <td>{{ $admin->email }}</td>
                </tr>

                <tr>
                    <th>Password</th>
                    <td>********</td>
                </tr>

                <tr>
                    <th>Created At</th>
                    <td>{{ $admin->created_at->format('d M Y') }}</td>
                </tr>

            </table>
               <a href="{{ url('/admin') }}" class="btn btn-secondary me-2 mt-3">
    <i class="bx bx-arrow-back"></i> Back
</a>
           

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
