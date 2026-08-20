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

        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bx bx-images"></i>
                Billboards
            </h4>

            <a href="{{ route('admin.billboards.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i>
                Add Billboard
            </a>

        </div>

        <!-- Search -->
        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

            <form method="GET" action="{{ route('admin.billboards.index') }}">

                <div class="row mb-3">

                    <div class="col-md-4">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search UUID, Title, Position">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary">

                            <i class="bx bx-search"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

            <!-- Table -->

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>UUID</th>

                        <th>Image</th>

                        <th>Title</th>

                        <th>Position</th>

                        <th>Featured</th>

                        <th>Status</th>

                        <th>Sort</th>

                        <th>Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($billboards as $key => $billboard)

                        <tr>

                            <td>

                                {{ $billboards->firstItem() + $key }}

                            </td>

                            <td>

                                <small>

                                    {{ $billboard->billboard_id }}

                                </small>

                            </td>

                            <td>

                                @if($billboard->image)

                                    <img
                                        src="{{ asset('uploads/billboards/'.$billboard->image) }}"
                                        width="80"
                                        class="rounded">

                                @else

                                    No Image

                                @endif

                            </td>

                            <td>

                                {{ $billboard->title }}

                            </td>

                            <td>

                                <span class="badge bg-info">

                                    {{ $billboard->position }}

                                </span>

                            </td>

                            <td>

                                @if($billboard->featured)

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

                                @if($billboard->status)

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

                                {{ $billboard->sort_order }}

                            </td>

                            <td>

                                <!-- View -->

                                <a href="{{ route('admin.billboards.show',$billboard) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bx bx-show"></i>

                                </a>

                                <!-- Edit -->

                                <a href="{{ route('admin.billboards.edit',$billboard) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bx bx-edit"></i>

                                </a>

                                <!-- Delete -->

                              <form action="{{ route('admin.billboards.destroy',$billboard) }}"
      method="POST"
      class="d-inline">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete this billboard?')">

        <i class="bx bx-trash"></i>

    </button>

</form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center">

                                No Billboards Found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->

            <div class="mt-3">

                {{ $billboards->links() }}

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
