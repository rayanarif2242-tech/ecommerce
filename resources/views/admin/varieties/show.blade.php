
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
            Variety Details
        </h4>

        <div>

            <a href="{{ route('admin.varieties.edit', $variety) }}"
               class="btn btn-warning">

                <i class="bx bx-edit"></i>
                Edit

            </a>

            <a href="{{ route('admin.varieties.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>


    <div class="row">

        {{-- Desktop Image --}}
        <div class="col-md-6 mb-4">

            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">Desktop Image</h5>
                </div>

                <div class="card-body text-center">

                    @if($variety->image)

                        <img
                            src="{{ asset('storage/' . $variety->image) }}"
                            alt="{{ $variety->title }}"
                            class="img-fluid rounded"
                            style="max-height:350px;"
                        >

                    @else

                        <p class="text-muted">
                            No desktop image
                        </p>

                    @endif

                </div>

            </div>

        </div>


        {{-- Mobile Image --}}
        <div class="col-md-6 mb-4">

            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">Mobile Image</h5>
                </div>

                <div class="card-body text-center">

                    @if($variety->mobile_image)

                        <img
                            src="{{ asset('storage/' . $variety->mobile_image) }}"
                            alt="{{ $variety->title }}"
                            class="img-fluid rounded"
                            style="max-height:350px;"
                        >

                    @else

                        <p class="text-muted">
                            No mobile image
                        </p>

                    @endif

                </div>

            </div>

        </div>


        {{-- Details --}}
        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h5 class="mb-0">Variety Information</h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <strong>Variety ID:</strong>

                            <p class="text-muted">
                                {{ $variety->variety_id }}
                            </p>

                        </div>


                        <div class="col-md-6 mb-3">

                            <strong>Product:</strong>

                            <p class="text-muted">

                                {{ $variety->product?->name ?? '—' }}

                            </p>

                        </div>


                        <div class="col-md-6 mb-3">

                            <strong>Title:</strong>

                            <p class="text-muted">
                                {{ $variety->title }}
                            </p>

                        </div>


                        <div class="col-md-6 mb-3">

                            <strong>Subtitle:</strong>

                            <p class="text-muted">
                                {{ $variety->subtitle ?? '—' }}
                            </p>

                        </div>


                        <div class="col-md-6 mb-3">

                            <strong>Button Text:</strong>

                            <p class="text-muted">
                                {{ $variety->button_text ?? '—' }}
                            </p>

                        </div>


                        <div class="col-md-6 mb-3">

                            <strong>Button Link:</strong>

                            <p class="text-muted">
                                {{ $variety->button_link ?? '—' }}
                            </p>

                        </div>


                        <div class="col-md-4 mb-3">

                            <strong>Position:</strong>

                            <p class="text-muted">
                                {{ $variety->position ?? '—' }}
                            </p>

                        </div>


                        <div class="col-md-4 mb-3">

                            <strong>Sort Order:</strong>

                            <p class="text-muted">
                                {{ $variety->sort_order }}
                            </p>

                        </div>


                        <div class="col-md-4 mb-3">

                            <strong>Status:</strong>

                            <p>

                                @if($variety->status === 'active')

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </p>

                        </div>


                        <div class="col-md-4 mb-3">

                            <strong>Featured:</strong>

                            <p>

                                @if($variety->featured)

                                    <span class="badge bg-warning">
                                        Yes
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        No
                                    </span>

                                @endif

                            </p>

                        </div>


                        <div class="col-md-4 mb-3">

                            <strong>Start Date:</strong>

                            <p class="text-muted">
                                {{ $variety->start_date?->format('d M Y, h:i A') ?? '—' }}
                            </p>

                        </div>


                        <div class="col-md-4 mb-3">

                            <strong>End Date:</strong>

                            <p class="text-muted">
                                {{ $variety->end_date?->format('d M Y, h:i A') ?? '—' }}
                            </p>

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