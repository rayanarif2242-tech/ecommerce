

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
        <div class="container-xxl container-p-y">


<div class="card">


<div class="card-header d-flex justify-content-between">


<h4>
<i class="bx bx-envelope"></i>
Message Details
</h4>


<a href="{{route('contact-messages.index')}}" 
class="btn btn-secondary">

Back

</a>


</div>



<div class="card-body">



<div class="row">



<div class="col-md-6 mb-3">

<label class="fw-bold">
Message ID
</label>

<p>
{{$contactMessage->message_id}}
</p>

</div>




<div class="col-md-6 mb-3">

<label class="fw-bold">
Status
</label>


<p>

@if($contactMessage->status=="New")

<span class="badge bg-primary">
New
</span>


@elseif($contactMessage->status=="Read")

<span class="badge bg-warning">
Read
</span>


@else

<span class="badge bg-success">
Replied
</span>


@endif


</p>

</div>





<div class="col-md-6 mb-3">

<label class="fw-bold">
Name
</label>

<p>
{{$contactMessage->name}}
</p>

</div>





<div class="col-md-6 mb-3">

<label class="fw-bold">
Email
</label>

<p>
{{$contactMessage->email}}
</p>

</div>





<div class="col-md-6 mb-3">

<label class="fw-bold">
Phone
</label>

<p>
{{$contactMessage->phone ?? 'N/A'}}
</p>

</div>





<div class="col-md-6 mb-3">

<label class="fw-bold">
Subject
</label>

<p>
{{$contactMessage->subject}}
</p>

</div>





<div class="col-md-12 mb-3">

<label class="fw-bold">
Message
</label>


<div class="border rounded p-3">

{{$contactMessage->message}}

</div>


</div>





<div class="col-md-6">

<label class="fw-bold">
Created At
</label>

<p>
{{$contactMessage->created_at->format('d M Y h:i A')}}
</p>


</div>




<div class="col-md-6">

<label class="fw-bold">
Updated At
</label>

<p>
{{$contactMessage->updated_at->format('d M Y h:i A')}}
</p>


</div>




</div>



<a href="{{ route('contact-messages.edit', $contactMessage) }}"
class="btn btn-warning">

<i class="bx bx-edit"></i>
Edit

</a>



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
