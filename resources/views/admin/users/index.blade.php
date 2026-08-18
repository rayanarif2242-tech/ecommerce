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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                <i class="bx bx-group"></i>
                Users Management
            </h4>

            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="bx bx-user-plus"></i>
                Add User
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                    <tr>

                        <th>UUID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="180">Actions</th>

                    </tr>

                    </thead>

                    <tbody>

                    @forelse($users as $user)

                        <tr>

                        <td>{{ $user->uuid }}</td>

                            <td>
                                <strong>{{ $user->name }}</strong>
                            </td>

                            <td>{{ $user->email }}</td>

                           <td>
    <div class="d-flex align-items-center gap-2">

        <a href="{{ route('users.edit', $user->uuid) }}"
   class="btn btn-warning btn-sm">
            <i class="bx bx-edit"></i> Edit
        </a>

      <form action="{{ route('users.destroy', $user->uuid) }}"
              method="POST"
              class="m-0">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete this user?')">
                <i class="bx bx-trash"></i> Delete
            </button>

        </form>

    </div>
</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                No Users Found

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
          <!-- Content wrapper -->
     
            <!-- / Content -->

          
           @include('admin.footer')
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
