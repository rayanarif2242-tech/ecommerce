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
        @php
    use Illuminate\Support\Str;
@endphp

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">


@if(session('success'))

<div class="alert alert-success">
{{ session('success') }}
</div>

@endif


<div class="card">


<div class="card-header d-flex justify-content-between align-items-center">

<h4>
<i class="bx bx-news"></i>
Blog Management
</h4>


<a href="{{route('admin.blog.create')}}" class="btn btn-primary">

<i class="bx bx-plus"></i>
Add Blog

</a>

</div>



<div class="card-body">


<form method="GET" class="mb-3">

<div class="input-group">

<input 
type="text"
name="search"
class="form-control"
placeholder="Search UUID or Title"
value="{{request('search')}}">


<button class="btn btn-primary">
Search
</button>

</div>

</form>



<div class="table-responsive">


<table class="table table-hover">


<thead class="table-light">

<tr>

<th>UUID</th>

<th>Image</th>

<th>Title</th>

<th>Category</th>

<th>Featured</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>



<tbody>


@forelse($blog as $blog)


<tr>

<td>
    <span title="{{ $blog->blog_id }}">
        {{ Str::limit($blog->blog_id, 6, '...') }}
    </span>
</td>


<td>

@if($blog->image)

<img src="{{asset('uploads/blog/'.$blog->image)}}"
width="60"
height="60"
class="rounded">

@endif

</td>


<td>

<strong>
{{$blog->title}}
</strong>

<br>

<small>
{{$blog->slug}}
</small>

</td>


<td>
{{$blog->category}}
</td>


<td>

@if($blog->featured)

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

@if($blog->status)

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


<a href="{{route('admin.blog.edit',$blog->blog_id)}}"
class="btn btn-warning btn-sm">

<i class="bx bx-edit"></i>

</a>



<form action="{{route('admin.blog.destroy',$blog->blog_id)}}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')


<button onclick="return confirm('Delete Blog?')"
class="btn btn-danger btn-sm">

<i class="bx bx-trash"></i>

</button>


</form>


</td>


</tr>


@empty

<tr>

<td colspan="7" class="text-center">

No blog Found

</td>

</tr>


@endforelse


</tbody>


</table>


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
