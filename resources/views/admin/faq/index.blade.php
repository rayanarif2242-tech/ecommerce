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


<div class="card-header d-flex justify-content-between align-items-center">

<h4 class="mb-0">
FAQ Management
</h4>


<a href="{{route('admin.faq.create')}}"
class="btn btn-primary">

Add FAQ

</a>


</div>



<div class="card-body">


<form method="GET"
action="{{route('admin.faq.index')}}">


<div class="row mb-3">


<div class="col-md-5">


<input 
type="text"
name="search"
class="form-control"
placeholder="Search FAQ..."
value="{{request('search')}}">


</div>



<div class="col-md-3">


<select name="status"
class="form-select">


<option value="">
All Status
</option>


<option value="Active"
{{request('status')=='Active'?'selected':''}}>
Active
</option>


<option value="Inactive"
{{request('status')=='Inactive'?'selected':''}}>
Inactive
</option>


</select>


</div>



<div class="col-md-2">


<button class="btn btn-primary">

Search

</button>


</div>


</div>


</form>





<table class="table table-bordered">


<thead>

<tr>

<th>#</th>

<th>Question</th>

<th>Status</th>

<th width="180">
Action
</th>

</tr>

</thead>



<tbody>


@foreach($faqs as $faq)


<tr>


<td>
{{$loop->iteration}}
</td>


<td>
{{$faq->question}}
</td>


<td>


@if($faq->status=="Active")


<span class="badge bg-success">
Active
</span>


@else


<span class="badge bg-danger">
Inactive
</span>


@endif


</td>



<td>


<a href="{{route('admin.faq.edit',$faq->uuid)}}"
class="btn btn-warning btn-sm">

<i class="bx bx-edit"></i>

</a>




<form action="{{route('admin.faq.destroy',$faq->uuid)}}"
method="POST"
class="delete-form d-inline">


@csrf

@method('DELETE')


<button type="button"
class="btn btn-danger btn-sm delete-btn">

<i class="bx bx-trash"></i>

</button>


</form>


</td>


</tr>


@endforeach


</tbody>


</table>



{{$faqs->appends(request()->query())->links()}}



</div>


</div>


</div>




<script>

document.querySelectorAll('.delete-btn')
.forEach(button=>{


button.addEventListener('click',function(){


let form=this.closest('.delete-form');


Swal.fire({

title:'Are you sure?',

text:'This FAQ will be deleted permanently!',

icon:'warning',

showCancelButton:true,

confirmButtonText:'Yes, Delete',

cancelButtonText:'Cancel'


}).then((result)=>{


if(result.isConfirmed){

form.submit();

}


});


});


});

</script>




@if(session('success'))


<script>


Swal.fire({

icon:'success',

title:"{{session('success')}}",

timer:2000,

showConfirmButton:false

});


</script>


@endif
            <!-- / Content -->

          
          
            <!-- / Footer -->

    </div>
    <!-- / Layout wrapper -->


    @include('admin.js')
  </body>
</html>
