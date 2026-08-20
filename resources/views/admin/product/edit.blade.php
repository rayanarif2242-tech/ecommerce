
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
    Edit Product
</h4>



<div class="card">

<div class="card-body">


<form action="{{route('admin.products.update',$product->product_id)}}"
method="POST"
enctype="multipart/form-data">


@csrf

@method('PUT')



<div class="row">


{{-- Product Name --}}
<div class="col-md-6 mb-3">

<label class="form-label">
Product Name
</label>

<input 
type="text"
name="name"
value="{{$product->name}}"
class="form-control"
required>

</div>




{{-- Category --}}
<div class="col-md-6 mb-3">

<label class="form-label">
Category
</label>


<select name="category_id"
class="form-control">


<option>
Select Category
</option>


@foreach($categories as $category)

<option value="{{$category->id}}"
@if($product->category_id == $category->id)
selected
@endif
>

{{$category->name}}

</option>


@endforeach


</select>


</div>





{{-- Price --}}
<div class="col-md-6 mb-3">

<label class="form-label">
Price
</label>


<input 
type="number"
name="price"
value="{{$product->price}}"
class="form-control">

</div>





{{-- Discount Price --}}
<div class="col-md-6 mb-3">

<label class="form-label">
Discount Price
</label>


<input 
type="number"
name="discount_price"
value="{{$product->discount_price}}"
class="form-control">

</div>





{{-- Stock --}}
<div class="col-md-6 mb-3">

<label class="form-label">
Stock
</label>


<input 
type="number"
name="stock"
value="{{$product->stock}}"
class="form-control">

</div>





{{-- Image --}}
<div class="col-md-6 mb-3">

<label class="form-label">
Product Image
</label>


@if($product->image)

<div class="mb-2">

<img src="{{asset('uploads/products/'.$product->image)}}"
width="100"
height="100"
class="rounded">

</div>

@endif


<input 
type="file"
name="image"
class="form-control">


</div>





{{-- Description --}}
<div class="col-md-12 mb-3">


<label class="form-label">
Description
</label>


<textarea 
name="description"
class="form-control"
rows="4">{{$product->description}}</textarea>


</div>





{{-- Featured --}}
<div class="col-md-4 mb-3">


<label>
Featured
</label>


<select name="featured"
class="form-control">


<option value="1"
@if($product->featured == 1)
selected
@endif
>
Yes
</option>


<option value="0"
@if($product->featured == 0)
selected
@endif
>
No
</option>


</select>


</div>





{{-- Home --}}
<div class="col-md-4 mb-3">


<label>
Show On Home
</label>


<select name="home"
class="form-control">


<option value="1"
@if($product->home == 1)
selected
@endif
>
Yes
</option>


<option value="0"
@if($product->home == 0)
selected
@endif
>
No
</option>


</select>


</div>





{{-- Status --}}
<div class="col-md-4 mb-3">


<label>
Status
</label>


<select name="status"
class="form-control">


<option value="1"
@if($product->status == 1)
selected
@endif
>
Active
</option>


<option value="0"
@if($product->status == 0)
selected
@endif
>
Inactive
</option>


</select>


</div>





{{-- Sort --}}
<div class="col-md-6 mb-3">


<label>
Sort Order
</label>


<input 
type="number"
name="sort"
value="{{$product->sort}}"
class="form-control">


</div>





<div class="mt-4">


<button type="submit"
class="btn btn-primary">

Update Product

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
