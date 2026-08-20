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

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bx bx-sitemap me-2"></i>
                Sub Category List
            </h4>

            <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i>
                Add Sub Category
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Image</th>

                    <th>Banner</th>

                    <th>Category</th>

                    <th>Sub Category</th>

                    <th>Featured</th>

                    <th>Home</th>

                    <th>Status</th>

                    <th>Sort</th>

                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($subcategories as $subcategory)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        @if($subcategory->image)

                            <img src="{{ asset('uploads/subcategories/'.$subcategory->image) }}"
                                 class="img-box">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif

                    </td>

                    <td>

                        @if($subcategory->banner)

                            <img src="{{ asset('uploads/subcategories/'.$subcategory->banner) }}"
                                 class="banner-box">

                        @else

                            <span class="text-muted">No Banner</span>

                        @endif

                    </td>

                    <td>

                        {{ optional($subcategory->category)->name }}

                    </td>

                    <td>

                        <strong>{{ $subcategory->name }}</strong>

                        <br>

                        <small class="text-muted">

                            {{ $subcategory->slug }}

                        </small>

                    </td>

                    <td>

                        @if($subcategory->featured)

                            <span class="badge bg-label-warning">
                                Featured
                            </span>

                        @else

                            <span class="badge bg-label-secondary">
                                No
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($subcategory->show_on_home)

                            <span class="badge bg-label-info">
                                Yes
                            </span>

                        @else

                            <span class="badge bg-label-secondary">
                                No
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($subcategory->status)

                            <span class="badge bg-label-success">
                                Active
                            </span>

                        @else

                            <span class="badge bg-label-danger">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $subcategory->sort_order }}

                    </td>

                    <td>

                        <div class="d-flex gap-2">

                           <a href="{{ route('admin.subcategory.edit',$subcategory->subcategory_id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="bx bx-edit"></i>

                            </a>
<form action="{{ route('admin.subcategory.destroy',$subcategory->subcategory_id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this sub category?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

                                    <i class="bx bx-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="10" class="text-center py-4">

                        No Sub Categories Found

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>

.card{

    border:none;

    border-radius:12px;

    box-shadow:0 4px 15px rgba(0,0,0,.08);

}

.card-header{

    border-bottom:1px solid #eee;

    background:#fff;

}

.table th{

    background:#f8f9fa;

    color:#566a7f;

    font-weight:600;

}

.table td{

    vertical-align:middle;

}

.img-box{

    width:60px;

    height:60px;

    object-fit:cover;

    border-radius:8px;

    border:1px solid #ddd;

}

.banner-box{

    width:90px;

    height:60px;

    object-fit:cover;

    border-radius:8px;

    border:1px solid #ddd;

}

.badge{

    padding:8px 12px;

    font-size:12px;

}

.btn{

    border-radius:6px;

}

.table tbody tr:hover{

    background:#f8f9fa;

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
