

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
                <i class="bx bx-edit"></i>
                Edit Sub Category
            </h4>
        </div>

        <div class="card-body">
<form action="{{ route('admin.subcategory.update',$subcategory->subcategory_id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Category</label>

                        <select name="category_id" class="form-select">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sub Category Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name',$subcategory->name) }}"
                               required>

                    </div>

                    <div class="col-12 mb-3">

                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  rows="4"
                                  class="form-control">{{ old('description',$subcategory->description) }}</textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Current Image</label>

                        <br>

                        @if($subcategory->image)

                            <img src="{{ asset('uploads/subcategories/'.$subcategory->image) }}"
                                 class="preview-image">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Upload New Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Current Banner</label>

                        <br>

                        @if($subcategory->banner)

                            <img src="{{ asset('uploads/subcategories/'.$subcategory->banner) }}"
                                 class="preview-banner">

                        @else

                            <span class="text-muted">No Banner</span>

                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Upload New Banner</label>

                        <input type="file"
                               name="banner"
                               class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Icon Class</label>

                        <input type="text"
                               name="icon"
                               class="form-control"
                               value="{{ old('icon',$subcategory->icon) }}"
                               placeholder="bx bx-mobile">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Sort Order</label>

                        <input type="number"
                               name="sort_order"
                               class="form-control"
                               value="{{ old('sort_order',$subcategory->sort_order) }}">

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Featured</label>

                        <select name="featured" class="form-select">

                            <option value="1" {{ $subcategory->featured ? 'selected' : '' }}>Yes</option>

                            <option value="0" {{ !$subcategory->featured ? 'selected' : '' }}>No</option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Show On Home</label>

                        <select name="show_on_home" class="form-select">

                            <option value="1" {{ $subcategory->show_on_home ? 'selected' : '' }}>Yes</option>

                            <option value="0" {{ !$subcategory->show_on_home ? 'selected' : '' }}>No</option>

                        </select>

                    </div>

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Status</label>

                        <select name="status" class="form-select">

                            <option value="1" {{ $subcategory->status ? 'selected' : '' }}>Active</option>

                            <option value="0" {{ !$subcategory->status ? 'selected' : '' }}>Inactive</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Meta Title</label>

                        <input type="text"
                               name="meta_title"
                               class="form-control"
                               value="{{ old('meta_title',$subcategory->meta_title) }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Meta Description</label>

                        <textarea name="meta_description"
                                  rows="2"
                                  class="form-control">{{ old('meta_description',$subcategory->meta_description) }}</textarea>

                    </div>
                    {{-- Price --}}

{{-- Price --}}

<div class="col-md-4 mb-3">

    <label class="form-label">
        Price <span class="text-danger">*</span>
    </label>

    <input
        type="number"
        name="price"
        class="form-control"
        value="{{ old('price', $subcategory->price) }}"
        min="0"
        step="0.01"
        required
    >

</div>


{{-- Discount Price --}}

<div class="col-md-4 mb-3">

    <label class="form-label">
        Discount Price
    </label>

    <input
        type="number"
        name="discount_price"
        class="form-control"
        value="{{ old('discount_price', $subcategory->discount_price) }}"
        min="0"
        step="0.01"
    >

</div>


{{-- Stock --}}

<div class="col-md-4 mb-3">

    <label class="form-label">
        Stock Quantity <span class="text-danger">*</span>
    </label>

    <input
        type="number"
        name="stock"
        class="form-control"
        value="{{ old('stock', $subcategory->stock) }}"
        min="0"
        step="1"
        required
    >

    <small class="text-muted">
        Available quantity
    </small>

</div>
                    <div class="col-12 mt-3">

                        <button type="submit" class="btn btn-success">

                            <i class="bx bx-save"></i>

                            Update Sub Category

                        </button>

                        <a href="{{ route('admin.subcategory.index') }}"
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

label{
    font-weight:600;
    margin-bottom:6px;
}

.preview-image{
    width:120px;
    height:120px;
    border-radius:10px;
    object-fit:cover;
    border:1px solid #ddd;
}

.preview-banner{
    width:180px;
    height:100px;
    border-radius:10px;
    object-fit:cover;
    border:1px solid #ddd;
}

.btn{
    border-radius:8px;
}

</style>
            <!-- / Content -->

          
          
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
