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
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Variety List</h4>

            <a href="{{ route('variety.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Variety
            </a>

        </div>

        <div class="table-responsive text-nowrap">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Variety ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($varieties as $variety)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $variety->variety_id }}</td>

                        <td>{{ $variety->name }}</td>

                        <td>
                            @if($variety->status)
                                <span class="badge bg-label-success">Active</span>
                            @else
                                <span class="badge bg-label-danger">Inactive</span>
                            @endif
                        </td>

                        <td>

                            <a href="{{ route('variety.edit',$variety->variety_id) }}"
                                class="btn btn-sm btn-warning">

                                <i class="bx bx-edit"></i>

                            </a>

                           <form action="{{ route('variety.destroy',$variety->variety_id) }}"
                                method="POST"
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this variety?')">

                                    <i class="bx bx-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">

                            No Variety Found

                        </td>

                    </tr>

                @endforelse

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
