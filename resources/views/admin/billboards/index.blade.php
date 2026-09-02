
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





<div class="container-xxl flex-grow-1 container-p-y">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Billboards</h4>
            <p class="text-muted mb-0">
                Manage your website billboards
            </p>
        </div>

        <a href="{{ route('admin.billboards.create') }}"
           class="btn btn-primary">
            <i class="bx bx-plus me-1"></i>
            Add Billboard
        </a>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- Search --}}
    


    {{-- Billboard Table --}}
    <div class="card">

        <div class="card-header">
            <h5 class="mb-0">All Billboards</h5>
        </div>

        <div class="table-responsive text-nowrap">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>UUID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($billboards as $billboard)

                        <tr>

                            <td>
                                {{ $billboards->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <span class="badge bg-label-secondary">
                                    {{ $billboard->uuid }}
                                </span>
                            </td>

                            <td>
                                <strong>
                                    {{ $billboard->name }}
                                </strong>
                            </td>

                            <td>
                                {{ Str::limit($billboard->description, 80) }}
                            </td>

                            <td>

                                {{-- View --}}
                                <a href="{{ route('admin.billboards.show', $billboard) }}"
                                   class="btn btn-sm btn-info"
                                   title="View">

                                    <i class="bx bx-show"></i>

                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('admin.billboards.edit', $billboard) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit">

                                    <i class="bx bx-edit"></i>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.billboards.destroy', $billboard) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this billboard?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Delete">

                                        <i class="bx bx-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5"
                                class="text-center py-5">

                                <h5 class="text-muted">
                                    No billboards found
                                </h5>

                                <a href="{{ route('admin.billboards.create') }}"
                                   class="btn btn-primary mt-2">
                                    Add Billboard
                                </a>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($billboards->hasPages())

            <div class="card-footer">

                {{ $billboards->appends(request()->query())->links() }}

            </div>

        @endif

    </div>

</div>



 


 @include('admin.js')


 </body>
</html>