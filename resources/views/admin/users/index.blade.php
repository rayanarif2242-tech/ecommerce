
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


                {{-- Success Message --}}
                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        <i class="bx bx-check-circle me-1"></i>

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                {{-- Error Messages --}}
                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- ===================================================== --}}
                {{-- USERS + NEWSLETTER --}}
                {{-- ===================================================== --}}

                <div class="card">

                    <div class="card-header">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <h4 class="mb-1">

                                    <i class="bx bx-group me-1"></i>

                                    Users & Newsletter Subscribers

                                </h4>

                                <small class="text-muted">

                                    Manage registered users and newsletter subscribers

                                </small>

                            </div>


                            {{-- Add Newsletter --}}
                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#addSubscriberModal"
                            >

                                <i class="bx bx-envelope me-1"></i>

                                Add Subscriber

                            </button>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead class="table-light">

                                    <tr>

                                        <th>UUID</th>

                                        <th>Name</th>

                                        <th>Email</th>

                                        <th>Type</th>

                                        <th>Status</th>

                                        <th>Actions</th>

                                    </tr>

                                </thead>


                                <tbody>


                                    {{-- ============================== --}}
                                    {{-- NORMAL USERS --}}
                                    {{-- ============================== --}}

                                    @foreach($users as $user)

                                        <tr>

                                            {{-- UUID --}}
                                            <td>

                                                <code>

                                                    {{ $user->uuid }}

                                                </code>

                                            </td>


                                            {{-- Name --}}
                                            <td>

                                                <strong>

                                                    {{ $user->name }}

                                                </strong>

                                            </td>


                                            {{-- Email --}}
                                            <td>

                                                {{ $user->email }}

                                            </td>


                                            {{-- Type --}}
                                            <td>

                                                <span class="badge bg-primary">

                                                    <i class="bx bx-user me-1"></i>

                                                    User

                                                </span>

                                            </td>


                                            {{-- Status --}}
                                            <td>

                                                <span class="badge bg-success">

                                                    Active

                                                </span>

                                            </td>


                                            {{-- Actions --}}
                                            <td>

                                                <div class="d-flex gap-2">


                                                    <a
                                                        href="{{ route('admin.users.edit', $user->uuid) }}"
                                                        class="btn btn-warning btn-sm"
                                                    >

                                                        <i class="bx bx-edit"></i>

                                                    </a>


                                                    <form
                                                        action="{{ route('admin.users.destroy', $user->uuid) }}"
                                                        method="POST"
                                                        class="m-0"
                                                    >

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Delete this user?')"
                                                        >

                                                            <i class="bx bx-trash"></i>

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach



                                    {{-- ============================== --}}
                                    {{-- NEWSLETTER SUBSCRIBERS --}}
                                    {{-- ============================== --}}

                                    @foreach($subscribers as $subscriber)

                                        <tr>

                                            {{-- UUID --}}
                                            <td>

                                                <code>

                                                    {{ $subscriber->subscriber_id }}

                                                </code>

                                            </td>


                                            {{-- Name --}}
                                            <td>

                                                <span class="text-muted">

                                                    Newsletter Subscriber

                                                </span>

                                            </td>


                                            {{-- Email --}}
                                            <td>

                                                <strong>

                                                    {{ $subscriber->email }}

                                                </strong>

                                            </td>


                                            {{-- Type --}}
                                            <td>

                                                <span class="badge bg-info">

                                                    <i class="bx bx-envelope me-1"></i>

                                                    Newsletter

                                                </span>

                                            </td>


                                            {{-- Status --}}
                                            <td>

                                                @if($subscriber->status === 'Active')

                                                    <span class="badge bg-success">

                                                        Active

                                                    </span>

                                                @else

                                                    <span class="badge bg-secondary">

                                                        {{ $subscriber->status }}

                                                    </span>

                                                @endif

                                            </td>


                                            {{-- Remove --}}
                                            <td>

                                                <form
                                                    action="{{ route('admin.newsletter.destroy', $subscriber->subscriber_id) }}"
                                                    method="POST"
                                                    class="m-0"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Remove this newsletter subscriber?')"
                                                    >

                                                        <i class="bx bx-trash me-1"></i>

                                                        Remove

                                                    </button>

                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach



                                    {{-- Nothing --}}
                                    @if($users->count() === 0 && $subscribers->count() === 0)

                                        <tr>

                                            <td
                                                colspan="6"
                                                class="text-center py-5"
                                            >

                                                <i class="bx bx-user-x fs-1 text-muted"></i>

                                                <h5 class="mt-2">

                                                    No Users or Subscribers Found

                                                </h5>

                                            </td>

                                        </tr>

                                    @endif


                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ===================================================== --}}
{{-- ADD NEWSLETTER SUBSCRIBER MODAL --}}
{{-- ===================================================== --}}

<div
    class="modal fade"
    id="addSubscriberModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">

                    <i class="bx bx-envelope me-1"></i>

                    Add Newsletter Subscriber

                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <form
                action="{{ route('admin.newsletter.store') }}"
                method="POST"
            >

                @csrf


                <div class="modal-body">


                    <div class="mb-3">

                        <label class="form-label">

                            Email Address

                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="example@email.com"
                            required
                        >

                    </div>


                    <div class="mb-3">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option value="Active">
                                Active
                            </option>

                            <option value="Inactive">
                                Inactive
                            </option>

                        </select>

                    </div>


                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bx bx-plus me-1"></i>

                        Add Subscriber

                    </button>

                </div>


            </form>

        </div>

    </div>

</div>


 


 @include('admin.js')


 </body>
</html>