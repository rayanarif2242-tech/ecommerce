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
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bx bx-category me-2"></i>
                Category List
            </h4>

            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i>
                Add Category
            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                <tr>

                    <th>#</th>

                    <th>Image</th>

                    <th>Name</th>

                    <th>Parent</th>

                    <th>Featured</th>

                    <th>Home</th>

                    <th>Status</th>

                    <th>Sort</th>

                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($categories as $category)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>

                        @if($category->image)

                            <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                 class="category-img">

                        @else

                            <img src="{{ asset('admin/assets/img/avatars/1.png') }}"
                                 class="category-img">

                        @endif

                    </td>

                    <td>

                        <strong>{{ $category->name }}</strong>

                        <br>

                        <small class="text-muted">

                            {{ $category->slug }}

                        </small>

                    </td>

                    <td>

                        {{ optional($category->parent)->name ?? 'Main Category' }}

                    </td>

                    <td>

                        @if($category->featured)

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

                        @if($category->show_on_home)

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

                        @if($category->status)

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

                        {{ $category->sort_order }}

                    </td>

<td>
    <div class="d-flex align-items-center gap-2">

       <a href="{{ route('admin.category.edit', $category->category_id) }}"
           class="btn btn-warning btn-sm">
            <i class="bx bx-edit"></i>
        </a>

        <form action="{{ route('admin.category.destroy', $category->category_id) }}"
              method="POST"
              onsubmit="return confirm('Delete this category?');"
              class="m-0">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger btn-sm">
                <i class="bx bx-trash"></i>
            </button>

        </form>

    </div>
</td>

                </tr>

                @empty

                <tr>

                    <td colspan="9" class="text-center py-4">

                        <strong>No Categories Found</strong>

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
    box-shadow:0 3px 15px rgba(0,0,0,.08);
}

.card-header{
    background:#fff;
    border-bottom:1px solid #eee;
}

.table th{
    font-weight:600;
    color:#566a7f;
}

.category-img{

    width:60px;

    height:60px;

    border-radius:8px;

    object-fit:cover;

    border:1px solid #ddd;

}

.badge{

    font-size:12px;

    padding:7px 12px;

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
