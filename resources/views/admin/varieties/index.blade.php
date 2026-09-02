
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

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Varieties
        </h4>

        <a href="{{ route('admin.varieties.create') }}"
           class="btn btn-primary">
            <i class="bx bx-plus"></i>
            Add Variety
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="table-responsive">

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Variety ID</th>
                        <th>Title</th>
                        <th>Product</th>
                        <th>Position</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Sort Order</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($varieties as $variety)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <small>
                                    {{ Str::limit($variety->variety_id, 8, '...') }}
                                </small>
                            </td>

                            <td>
                                {{ $variety->title }}
                            </td>

                            <td>
                                {{ $variety->product?->name ?? '—' }}
                            </td>

                            <td>
                                {{ $variety->position ?? '—' }}
                            </td>

                            <td>

                                @if($variety->featured)

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

                                @if($variety->status === 'active')

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
                                {{ $variety->sort_order }}
                            </td>

                            <td>

                                <a href="{{ route('admin.varieties.show', $variety) }}"
                                   class="btn btn-sm btn-info">
                                    View
                                </a>

                                <a href="{{ route('admin.varieties.edit', $variety) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.varieties.destroy', $variety) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this variety?')">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9" class="text-center">
                                No varieties found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="card-body">
            {{ $varieties->links() }}
        </div>

    </div>

</div>


 


 @include('admin.js')


 </body>
</html>