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

    <div class="card">

        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bx bx-collection"></i>
                Collections
            </h4>

            <a href="{{ route('admin.collections.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i>
                Add Collection
            </a>

        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search -->
            <form action="{{ route('admin.collections.index') }}" method="GET">

                <div class="row mb-3">

                    <div class="col-md-4">

                        <input
                            type="text"
                            class="form-control"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search UUID, Name, Slug">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-primary">

                            <i class="bx bx-search"></i>

                            Search

                        </button>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>UUID</th>

                        <th>Thumbnail</th>

                        <th>Banner</th>

                        <th>Name</th>

                        <th>Slug</th>

                        <th>Featured</th>

                        <th>Home</th>

                        <th>Status</th>

                        <th>Sort</th>

                        <th width="170">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($collections as $key => $collection)

                        <tr>

                            <td>{{ $collections->firstItem() + $key }}</td>

                            <td>
    <small title="{{ $collection->collection_id }}">
        {{ Str::limit($collection->collection_id, 8, '...') }}
    </small>
</td>

                            <td>

                                @if($collection->thumbnail)

                                    <img
                                        src="{{ asset('uploads/collections/'.$collection->thumbnail) }}"
                                        width="70"
                                        class="rounded border">

                                @else

                                    -

                                @endif

                            </td>

                            <td>

                                @if($collection->banner)

                                    <img
                                        src="{{ asset('uploads/collections/'.$collection->banner) }}"
                                        width="100"
                                        class="rounded border">

                                @else

                                    -

                                @endif

                            </td>

                            <td>{{ $collection->name }}</td>

                            <td>{{ $collection->slug }}</td>

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

                            <td>

                                {{ $collection->sort_order }}

                            </td>

                            <td>

                                <!-- View -->

                                <a href="{{ route('admin.collections.show',$collection) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bx bx-show"></i>

                                </a>

                                <!-- Edit -->

                                <a href="{{ route('admin.collections.edit',$collection) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bx bx-edit"></i>

                                </a>

                                <!-- Delete -->

                                <form
                                    action="{{ route('admin.collections.destroy',$collection) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this collection?')">

                                        <i class="bx bx-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="11" class="text-center">

                                No Collections Found.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $collections->links() }}

            </div>

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
