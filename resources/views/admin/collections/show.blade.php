

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

<i class="bx bx-show"></i>

Collection Details

</h4>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th width="250">UUID</th>

<td>{{ $collection->collection_id }}</td>

</tr>

<tr>

<th>Name</th>

<td>{{ $collection->name }}</td>

</tr>

<tr>

<th>Slug</th>

<td>{{ $collection->slug }}</td>

</tr>

<tr>

<th>Description</th>

<td>{{ $collection->description }}</td>

</tr>

<tr>

<th>Thumbnail</th>

<td>

@if($collection->thumbnail)

<img src="{{ asset('uploads/collections/'.$collection->thumbnail) }}"
width="180"
class="rounded border">

@endif

</td>

</tr>

<tr>

<th>Banner</th>

<td>

@if($collection->banner)

<img src="{{ asset('uploads/collections/'.$collection->banner) }}"
width="250"
class="rounded border">

@endif

</td>

</tr>

<tr>

<th>Icon</th>

<td>

@if($collection->icon)

<img src="{{ asset('uploads/collections/'.$collection->icon) }}"
width="80"
class="rounded border">

@endif

</td>

</tr>

<tr>

<th>Featured</th>

<td>

@if($collection->featured)

<span class="badge bg-success">

Yes

</span>

@else

<span class="badge bg-secondary">

No

</span>

@endif

</td>

</tr>

<tr>

<th>Show On Home</th>

<td>

@if($collection->show_home)

<span class="badge bg-primary">

Yes

</span>

@else

<span class="badge bg-secondary">

No

</span>

@endif

</td>

</tr>

<tr>

<th>Status</th>

<td>

@if($collection->status)

<span class="badge bg-success">

Active

</span>

@else

<span class="badge bg-danger">

Inactive

</span>

@endif

</td>

</tr>

<tr>

<th>Sort Order</th>

<td>{{ $collection->sort_order }}</td>

</tr>

<tr>

<th>SEO Title</th>

<td>{{ $collection->seo_title }}</td>

</tr>

<tr>

<th>SEO Keywords</th>

<td>{{ $collection->seo_keywords }}</td>

</tr>

<tr>

<th>SEO Description</th>

<td>{{ $collection->seo_description }}</td>

</tr>

</table>

<a href="{{ route('admin.collections.index') }}"
class="btn btn-secondary">

<i class="bx bx-arrow-back"></i>

Back

</a>

</div>

</div>

</div>
            <!-- / Content -->

          
          
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>