
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
            <h4 class="mb-0">
                <i class="bx bx-edit"></i>
                Edit Category
            </h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.category.update',$category->category_id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Category Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name',$category->name) }}"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Slug</label>

                        <input type="text"
                               class="form-control"
                               value="{{ $category->slug }}"
                               readonly>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Parent Category</label>

                        <select name="parent_id" class="form-select">

                            <option value="">Main Category</option>

                            @foreach($categories as $cat)

                                <option value="{{ $cat->id }}"
                                    {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sort Order</label>

                        <input type="number"
                               name="sort_order"
                               class="form-control"
                               value="{{ $category->sort_order }}">

                    </div>

                    <div class="col-12 mb-3">

                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  rows="4"
                                  class="form-control">{{ old('description',$category->description) }}</textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Current Image</label>

                        <br>

                        @if($category->image)

                            <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                 class="preview-img">

                        @else

                            <img src="{{ asset('admin/assets/img/avatars/1.png') }}"
                                 class="preview-img">

                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Change Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Featured</label>

                        <select name="featured" class="form-select">

                            <option value="1" {{ $category->featured ? 'selected':'' }}>
                                Yes
                            </option>

                            <option value="0" {{ !$category->featured ? 'selected':'' }}>
                                No
                            </option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Show On Home</label>

                        <select name="show_on_home" class="form-select">

                            <option value="1" {{ $category->show_on_home ? 'selected':'' }}>
                                Yes
                            </option>

                            <option value="0" {{ !$category->show_on_home ? 'selected':'' }}>
                                No
                            </option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">

                            <option value="1" {{ $category->status ? 'selected':'' }}>
                                Active
                            </option>

                            <option value="0" {{ !$category->status ? 'selected':'' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Meta Title</label>

                        <input type="text"
                               name="meta_title"
                               class="form-control"
                               value="{{ old('meta_title',$category->meta_title) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Meta Description</label>

                        <textarea name="meta_description"
                                  rows="2"
                                  class="form-control">{{ old('meta_description',$category->meta_description) }}</textarea>

                    </div>

                    <div class="col-12 mt-3">

                        <button class="btn btn-success">
                            <i class="bx bx-save"></i>
                            Update Category
                        </button>

                        <a href="{{ route('admin.category.index') }}"
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
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}

.card-header{
    background:#fff;
    border-bottom:1px solid #eee;
    font-weight:600;
}

.form-control,
.form-select{
    border-radius:8px;
}

.btn{
    border-radius:8px;
}

.preview-img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #ddd;
    padding:4px;
    background:#fff;
}

label{
    font-weight:600;
    margin-bottom:6px;
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
