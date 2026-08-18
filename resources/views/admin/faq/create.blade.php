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

<h4 class="mb-0">
<i class="bx bx-help-circle"></i>
Create FAQ
</h4>


<a href="{{route('faq.index')}}" 
class="btn btn-secondary">

Back

</a>


</div>



<div class="card-body">


@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>
{{$error}}
</li>

@endforeach

</ul>

</div>

@endif



<form action="{{route('faq.store')}}" method="POST">

@csrf



<div class="mb-3">

<label class="form-label">
Question
</label>


<input 
type="text"
name="question"
class="form-control"
placeholder="Enter FAQ Question"
value="{{old('question')}}">


</div>



<div class="mb-3">

<label class="form-label">
Answer
</label>


<textarea
name="answer"
rows="5"
class="form-control"
placeholder="Enter FAQ Answer">{{old('answer')}}</textarea>


</div>




<div class="row">


<div class="col-md-6">


<label class="form-label">
Display Order
</label>


<input
type="number"
name="order"
class="form-control"
value="0">


</div>




<div class="col-md-6">


<label class="form-label">
Status
</label>


<select name="status"
class="form-select">


<option value="Active">
Active
</option>


<option value="Inactive">
Inactive
</option>


</select>


</div>


</div>




<div class="mt-4">


<button class="btn btn-primary">

Save FAQ

</button>


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
