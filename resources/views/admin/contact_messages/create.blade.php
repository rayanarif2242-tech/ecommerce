

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


<div class="card-header">

<h4>
<i class="bx bx-envelope"></i>
Add Contact Message
</h4>

</div>



<div class="card-body">


<form action="{{ route('admin.contact-messages.store') }}" method="POST">

@csrf



<div class="row">


<div class="col-md-6 mb-3">

<label>Name</label>

<input 
type="text"
name="name"
class="form-control"
required
>

</div>



<div class="col-md-6 mb-3">

<label>Email</label>

<input 
type="email"
name="email"
class="form-control"
required
>

</div>



<div class="col-md-6 mb-3">

<label>Phone</label>

<input 
type="text"
name="phone"
class="form-control"
>

</div>



<div class="col-md-6 mb-3">

<label>Subject</label>

<input 
type="text"
name="subject"
class="form-control"
required
>

</div>



<div class="col-md-12 mb-3">


<label>Message</label>


<textarea 
name="message"
class="form-control"
rows="5"
required
></textarea>


</div>




<div class="col-md-6 mb-3">


<label>Status</label>


<select 
name="status"
class="form-control">


<option value="New">
New
</option>


<option value="Read">
Read
</option>


<option value="Replied">
Replied
</option>


</select>


</div>


</div>



<button class="btn btn-primary">

Save Message

</button>


<a href="{{ route('admin.contact-messages.index') }}"
class="btn btn-secondary">

Back

</a>



</form>


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
