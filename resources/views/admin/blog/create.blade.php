

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
        <i class="bx bx-news"></i>
        Add New Blog
    </h4>
</div>


<div class="card-body">


<form action="{{ route('blog.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf


<div class="row">


<div class="col-md-6 mb-3">

<label class="form-label">
Blog Title *
</label>

<input type="text"
name="title"
class="form-control"
placeholder="Enter Blog Title"
required>

</div>



<div class="col-md-6 mb-3">

<label class="form-label">
Category
</label>

<input type="text"
name="category"
class="form-control"
placeholder="Example: Fashion">

</div>




<div class="col-md-6 mb-3">

<label class="form-label">
Author
</label>

<input type="text"
name="author"
class="form-control"
placeholder="Author Name">

</div>




<div class="col-md-6 mb-3">

<label class="form-label">
Blog Image
</label>

<input type="file"
name="image"
class="form-control">

</div>




<div class="col-12 mb-3">

<label class="form-label">
Short Description
</label>

<textarea name="short_description"
rows="3"
class="form-control"
placeholder="Short blog summary"></textarea>

</div>




<div class="col-12 mb-3">

<label class="form-label">
Content
</label>

<textarea name="content"
rows="8"
class="form-control"
placeholder="Write full blog content"></textarea>

</div>





<div class="col-md-6 mb-3">

<label class="form-label">
SEO Title
</label>

<input type="text"
name="meta_title"
class="form-control"
placeholder="SEO Meta Title">

</div>




<div class="col-md-6 mb-3">

<label class="form-label">
SEO Description
</label>

<textarea name="meta_description"
rows="2"
class="form-control"
placeholder="SEO Meta Description"></textarea>

</div>





<div class="col-md-3 mb-3">

<label class="form-label">
Featured
</label>

<select name="featured"
class="form-select">

<option value="0">
No
</option>

<option value="1">
Yes
</option>

</select>

</div>





<div class="col-md-3 mb-3">

<label class="form-label">
Show On Home
</label>

<select name="show_on_home"
class="form-select">

<option value="0">
No
</option>

<option value="1">
Yes
</option>

</select>

</div>





<div class="col-md-3 mb-3">

<label class="form-label">
Status
</label>

<select name="status"
class="form-select">


<option value="1">
Active
</option>


<option value="0">
Inactive
</option>


</select>

</div>





<div class="col-md-3 mb-3">

<label class="form-label">
Sort Order
</label>

<input type="number"
name="sort_order"
class="form-control"
value="0">

</div>




<div class="col-12 mt-3">


<button class="btn btn-success">

<i class="bx bx-save"></i>

Save Blog

</button>


<a href="{{route('blog.index')}}"
class="btn btn-secondary">

Cancel

</a>


</div>



</div>


</form>


</div>


</div>


</div>


<style>

.card{

border:none;
border-radius:12px;
box-shadow:0 4px 15px rgba(0,0,0,.08);

}


.form-control,
.form-select{

border-radius:8px;

}


label{

font-weight:600;

}


.btn{

border-radius:8px;

}


</style>
            <!-- / Content -->

          
           @include('admin.footer')
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
