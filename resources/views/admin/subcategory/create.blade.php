
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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <h4 class="mb-0">
                <i class="bx bx-plus-circle"></i>
                Add New Sub Category
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('subcategory.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Category -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Category <span class="text-danger">*</span></label>

                        <select name="category_id" class="form-select" required>

                            <option value="">Select Category</option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Name -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sub Category Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter Sub Category Name"
                               value="{{ old('name') }}"
                               required>

                    </div>

                    <!-- Description -->

                    <div class="col-12 mb-3">

                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  rows="4"
                                  class="form-control"
                                  placeholder="Enter Description">{{ old('description') }}</textarea>

                    </div>

                    <!-- Image -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <!-- Banner -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Banner Image</label>

                        <input type="file"
                               name="banner"
                               class="form-control">

                    </div>

                    <!-- Icon -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Icon Class</label>

                        <input type="text"
                               name="icon"
                               class="form-control"
                               placeholder="Example: bx bx-mobile">

                    </div>

                    <!-- Sort -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sort Order</label>

                        <input type="number"
                               name="sort_order"
                               value="0"
                               class="form-control">

                    </div>

                    <!-- Featured -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Featured</label>

                        <select name="featured" class="form-select">

                            <option value="1">Yes</option>

                            <option value="0" selected>No</option>

                        </select>

                    </div>

                    <!-- Home -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Show On Home</label>

                        <select name="show_on_home" class="form-select">

                            <option value="1">Yes</option>

                            <option value="0" selected>No</option>

                        </select>

                    </div>

                    <!-- Status -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">

                            <option value="1" selected>Active</option>

                            <option value="0">Inactive</option>

                        </select>

                    </div>

                    <!-- Meta -->

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Meta Title</label>

                        <input type="text"
                               name="meta_title"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Meta Description</label>

                        <textarea name="meta_description"
                                  rows="2"
                                  class="form-control"></textarea>

                    </div>

                    <div class="col-12 mt-3">

                        <button type="submit" class="btn btn-primary">

                            <i class="bx bx-save"></i>

                            Save Sub Category

                        </button>

                        <a href="{{ route('subcategory.index') }}"
                           class="btn btn-secondary">

                            Cancel

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<style>

.card{
    border:none;
    border-radius:12px;
    box-shadow:0 5px 18px rgba(0,0,0,.08);
}

.card-header{
    background:#fff;
    border-bottom:1px solid #eee;
}

.form-control,
.form-select{
    border-radius:8px;
}

.form-control:focus,
.form-select:focus{
    box-shadow:none;
    border-color:#696cff;
}

label{
    font-weight:600;
    margin-bottom:6px;
}

.btn{
    border-radius:8px;
    padding:8px 18px;
}

textarea{
    resize:none;
}

</style>
            <!-- / Content -->

          
           @include('admin.footer')
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
