
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

        <h4 class="fw-bold mb-0">
            Signatures
        </h4>

        <a href="{{ route('admin.signature.create') }}"
           class="btn btn-primary">

            <i class="bx bx-plus"></i>
            Add Signature

        </a>

    </div>


    {{-- Search --}}
    <div class="card mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.signature.index') }}">

                <div class="input-group">

                    <input type="text"
                           name="search"
                           class="form-control"
                           value="{{ request('search') }}"
                           placeholder="Search Signature UUID or Product Name">

                    <button class="btn btn-primary"
                            type="submit">

                        <i class="bx bx-search"></i>
                        Search

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- Success --}}
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

                        <th>Signature ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Stock</th>
                        <th>Home</th>
                        <th>Status</th>
                        <th>Sort</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($signatures as $signature)

                        <tr>

                            <td>
                                <span title="{{ $signature->signature_id }}">
                                    {{ Str::limit($signature->signature_id, 18) }}
                                </span>
                            </td>


                            <td>

                                @if($signature->image)

                                    <img src="{{ asset($signature->image) }}"
                                         width="60"
                                         height="60"
                                         style="object-fit: cover;"
                                         class="rounded">

                                @else

                                    <span class="text-muted">
                                        No Image
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $signature->product_name }}
                            </td>


                            <td>
                                {{ number_format($signature->price, 2) }}
                            </td>


                            <td>

                                @if($signature->discount_price)

                                    {{ number_format($signature->discount_price, 2) }}

                                @else

                                    -

                                @endif

                            </td>
                            <td>

    @if($signature->stock > 0)

        <span class="badge bg-label-success">
            {{ $signature->stock }}
        </span>

    @else

        <span class="badge bg-label-danger">
            Out of Stock
        </span>

    @endif

</td>


                            <td>

                                @if($signature->show_on_home)

                                    <span class="badge bg-label-success">
                                        Yes
                                    </span>

                                @else

                                    <span class="badge bg-label-secondary">
                                        No
                                    </span>

                                @endif

                            </td>


                            <td>

                                @if($signature->status === 'Active')

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
                                {{ $signature->sort_order }}
                            </td>


                            <td>

                                {{-- View --}}
                                <a href="{{ route('admin.signature.show', $signature) }}"
                                   class="btn btn-sm btn-info">

                                    <i class="bx bx-show"></i>

                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('admin.signature.edit', $signature) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bx bx-edit"></i>

                                </a>


                                {{-- Delete --}}
                                <form action="{{ route('admin.signature.destroy', $signature) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this signature?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">

                                        <i class="bx bx-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="10"
                                class="text-center">

                                No signatures found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="card-footer">

            {{ $signatures->links() }}

        </div>

    </div>

</div>



 @include('admin.footer')


 @include('admin.js')


 </body>
</html>