










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

                <div class="row justify-content-center">

                    <div class="col-md-7 col-lg-6">


                        <div class="card">

                            <div class="card-header">

                                <h4 class="mb-0">

                                    <i class="bx bx-edit me-1"></i>

                                    Edit Newsletter Subscriber

                                </h4>

                            </div>


                            <form
                                action="{{ route('admin.newsletter.update', $subscriber->subscriber_id) }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')


                                <div class="card-body">


                                    {{-- Email --}}

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Email Address

                                        </label>

                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $subscriber->email) }}"
                                            required
                                        >


                                        @error('email')

                                            <div class="invalid-feedback">

                                                {{ $message }}

                                            </div>

                                        @enderror

                                    </div>



                                    {{-- Status --}}

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Status

                                        </label>

                                        <select
                                            name="status"
                                            class="form-select"
                                        >

                                            <option
                                                value="Active"
                                                {{ $subscriber->status === 'Active' ? 'selected' : '' }}
                                            >

                                                Active

                                            </option>


                                            <option
                                                value="Inactive"
                                                {{ $subscriber->status === 'Inactive' ? 'selected' : '' }}
                                            >

                                                Inactive

                                            </option>

                                        </select>

                                    </div>



                                    {{-- Subscriber UUID --}}

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Subscriber UUID

                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            value="{{ $subscriber->subscriber_id }}"
                                            readonly
                                        >

                                    </div>


                                </div>


                                <div class="card-footer d-flex justify-content-between">


                                    <a
                                        href="{{ route('admin.users.index') }}"
                                        class="btn btn-secondary"
                                    >

                                        <i class="bx bx-arrow-back me-1"></i>

                                        Back

                                    </a>


                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >

                                        <i class="bx bx-save me-1"></i>

                                        Update Subscriber

                                    </button>


                                </div>


                            </form>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

 


 @include('admin.js')


 </body>
</html>















