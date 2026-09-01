
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

        <div class="card-header">

            <h4>
                <i class="bx bx-show"></i>
                Billboard Details
            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="220">UUID</th>
                    <td>{{ $billboard->billboard_id }}</td>
                </tr>

                <tr>
                    <th>Title</th>
                    <td>{{ $billboard->title }}</td>
                </tr>

                <tr>
                    <th>Subtitle</th>
                    <td>{{ $billboard->subtitle }}</td>
                </tr>

                <tr>
                    <th>Button Text</th>
                    <td>{{ $billboard->button_text }}</td>
                </tr>

                <tr>
                    <th>Button Link</th>
                    <td>{{ $billboard->button_link }}</td>
                </tr>

                <tr>
                    <th>Position</th>
                    <td>{{ $billboard->position }}</td>
                </tr>

                <tr>
                    <th>Featured</th>
                    <td>
                        @if($billboard->featured)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if($billboard->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Sort Order</th>
                    <td>{{ $billboard->sort_order }}</td>
                </tr>

                <tr>
                    <th>Start Date</th>
                    <td>{{ $billboard->start_date }}</td>
                </tr>

                <tr>
                    <th>End Date</th>
                    <td>{{ $billboard->end_date }}</td>
                </tr>

                <tr>
                    <th>Desktop Image</th>
                    <td>
                        @if($billboard->image)
                            <img src="{{ asset('uploads/billboards/'.$billboard->image) }}"
                                 width="250"
                                 class="rounded border">
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Mobile Image</th>
                    <td>
                        @if($billboard->mobile_image)
                            <img src="{{ asset('uploads/billboards/'.$billboard->mobile_image) }}"
                                 width="250"
                                 class="rounded border">
                        @endif
                    </td>
                </tr>

            </table>

            <a href="{{ route('admin.billboards.index') }}"
               class="btn btn-secondary">

                <i class="bx bx-arrow-back"></i>

                Back

            </a>

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
