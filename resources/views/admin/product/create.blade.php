

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
        <div class="container-xxl container-p-y">


<h4 class="fw-bold mb-4">
Add Product
</h4>



<div class="card">

<div class="card-body">


<form action="{{route('admin.products.store')}}"
method="POST"
enctype="multipart/form-data">


@csrf



<div class="row">


<div class="col-md-6 mb-3">

<label>
Product Name
</label>

<input type="text"
name="name"
class="form-control"
required>

</div>



<div class="col-md-6 mb-3">

<label>
Category
</label>


<select name="category_id"
class="form-control">


<option>
Select Category
</option>


@foreach($categories as $category)

<option value="{{$category->id}}">

{{$category->name}}

</option>


@endforeach


</select>


</div>





<div class="col-md-6 mb-3">

<label>
Price
</label>

<input type="number"
name="price"
class="form-control">

</div>



<div class="col-md-6 mb-3">

<label>
Discount Price
</label>


<input type="number"
name="discount_price"
class="form-control">


</div>





<div class="col-md-6 mb-3">

<label>
Stock
</label>


<input type="number"
name="stock"
class="form-control">


</div>




<div class="col-md-6 mb-3">

<label>
Product Image
</label>


<input type="file"
name="image"
class="form-control">


</div>




<div class="col-md-12 mb-3">


<label>
Description
</label>


<textarea name="description"
class="form-control"
rows="4"></textarea>


</div>





<div class="col-md-4">

<label>
Featured
</label>


<select name="featured"
class="form-control">

<option value="1">
Yes
</option>

<option value="0">
No
</option>


</select>


</div>




<div class="col-md-4">

<label>
Home
</label>


<select name="home"
class="form-control">

<option value="1">
Yes
</option>

<option value="0">
No
</option>


</select>


</div>





<div class="col-md-4">

<label>
Status
</label>


<select name="status"
class="form-control">

<option value="1">
Active
</option>

<option value="0">
Inactive
</option>


</select>


</div>




<div class="mt-4">

<button class="btn btn-primary">

Save Product

</button>


<a href="{{route('admin.products.index')}}"
class="btn btn-secondary">

Back

</a>

</div>



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
