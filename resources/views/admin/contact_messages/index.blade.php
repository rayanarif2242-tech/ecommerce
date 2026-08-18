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
      


<div class=" container-p-y">


<div class="card">
    @if(session('success'))

<div class="alert alert-success">

{{session('success')}}

</div>

@endif


<div class="card-header d-flex justify-content-between">


<h4>
<i class="bx bx-envelope"></i>
Contact Messages
</h4>

<a href="{{route('contact-messages.create')}}" 
class="btn btn-primary">

<i class="bx bx-plus"></i>
Add Message

</a>


</div>



<div class="card-body">


<form method="GET">


<div class="row mb-3">

<div class="col-md-6">

<div class="input-group">


<input 
type="text"
name="search"
class="form-control"
placeholder="Search messages..."
value="{{request('search')}}"
>


<button class="btn btn-primary">
Search
</button>


<a href="{{route('contact-messages.index')}}" 
class="btn btn-secondary">
Reset
</a>


</div>


</form>




<div class="mt-3"></div>


<table class="table table-bordered">


<thead>

<tr>

<th>#</th>
<th>UUID</th>
<th>Name</th>
<th>Email</th>
<th>Subject</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>


<tbody>


@foreach($messages as $key=>$message)

<tr>

<td>
{{$messages->firstItem()+$key}}
</td>


<td>
{{substr($message->message_id,0,8)}}...
</td>


<td>
{{$message->name}}
</td>


<td>
{{$message->email}}
</td>


<td>
{{$message->subject}}
</td>



<td>

@if($message->status=="New")

<span class="badge bg-primary">
New
</span>


@elseif($message->status=="Read")

<span class="badge bg-warning">
Read
</span>


@else

<span class="badge bg-success">
Replied
</span>

@endif


</td>



<td>

<a href="{{route('contact-messages.show',$message)}}" 
class="btn btn-info btn-sm">

<i class="bx bx-show"></i>

</a>


<a href="{{route('contact-messages.edit',$message)}}" 
class="btn btn-warning btn-sm">

<i class="bx bx-edit"></i>

</a>


<form action="{{ route('contact-messages.destroy', $message) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Are you sure you want to delete this message?')">
        <i class="bx bx-trash"></i>
    </button>

</form>


</td>


</tr>


@endforeach


</tbody>


</table>


{{$messages->links()}}


</div>


</div>


</div>

            <!-- / Content -->

          
           @include('admin.footer')
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
