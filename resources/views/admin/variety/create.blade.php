
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
<h4>Add Variety</h4>
</div>

<div class="card-body">

<form action="{{ route('admin.variety.store') }}" method="POST">

@csrf

<div class="mb-3">

<label class="form-label">Variety Name</label>

<input
type="text"
name="name"
class="form-control"
placeholder="Enter Variety Name">

</div>

<div class="mb-3">

<label class="form-label">Description</label>

<textarea
name="description"
rows="4"
class="form-control"
placeholder="Description"></textarea>

</div>

<div class="mb-3">

<label class="form-label">Status</label>

<select name="status" class="form-select">

<option value="1">Active</option>

<option value="0">Inactive</option>

</select>

</div>

<button class="btn btn-primary">
<i class="bx bx-save"></i>
Save
</button>

<a href="{{ route('admin.variety.index') }}"
class="btn btn-secondary">

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
