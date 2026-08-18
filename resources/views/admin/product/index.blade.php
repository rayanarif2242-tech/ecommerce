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


<div class="d-flex justify-content-between align-items-center mb-4">

<h4 class="fw-bold">
Product Management
</h4>


<a href="{{route('products.create')}}" 
class="btn btn-primary">

<i class="bx bx-plus"></i>
Add Product

</a>

</div>



@if(session('success'))

<div class="alert alert-success">
{{session('success')}}
</div>

@endif



<div class="card">

<div class="table-responsive">

<table class="table table-hover">

<thead class="table-light">

<tr>

<th>#</th>

<th>Image</th>

<th>Product</th>

<th>Category</th>

<th>Price</th>

<th>Stock</th>

<th>Featured</th>

<th>Home</th>

<th>Status</th>

<th>Action</th>


</tr>

</thead>



<tbody>


@foreach($products as $key=>$product)


<tr>


<td>
{{$key+1}}
</td>


<td>


@if($product->image)

<img src="{{asset('uploads/products/'.$product->image)}}"
width="60"
height="60"
class="rounded">

@else

<img src="{{asset('admin/assets/img/no-image.png')}}"
width="60">

@endif


</td>



<td>

<strong>
{{$product->name}}
</strong>

<br>

<small class="text-muted">

{{$product->product_id}}

</small>

</td>



<td>

{{$product->category->name}}

</td>



<td>

${{$product->price}}

</td>



<td>

{{$product->stock}}

</td>



<td>


@if($product->featured)

<span class="badge bg-success">
Yes
</span>

@else

<span class="badge bg-secondary">
No
</span>

@endif


</td>



<td>


@if($product->home)

<span class="badge bg-success">
Yes
</span>

@else

<span class="badge bg-secondary">
No
</span>

@endif


</td>



<td>


@if($product->status)

<span class="badge bg-success">
Active
</span>

@else

<span class="badge bg-danger">
Inactive
</span>

@endif


</td>



<td>


<a href="{{route('products.edit',$product->product_id)}}"
class="btn btn-sm btn-warning">

<i class="bx bx-edit"></i>

</a>


<form action="{{route('products.destroy',$product->product_id)}}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')


<button onclick="return confirm('Delete Product?')"
class="btn btn-sm btn-danger">

<i class="bx bx-trash"></i>

</button>


</form>



</td>


</tr>


@endforeach



</tbody>


</table>


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
