
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

        <h4 class="fw-bold mb-0">
            Orders
        </h4>

        <a href="{{ route('admin.orders.create') }}"
           class="btn btn-primary">

            <i class="bx bx-plus"></i>
            Add Order

        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif


    <div class="card">

        <div class="table-responsive text-nowrap">

            <table class="table">

                <thead>

                    <tr>

                        <th>#</th>
                        <th>Order Number</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($orders as $order)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>


                            <td>

                                <strong>
                                    {{ $order->order_number }}
                                </strong>

                            </td>


                            <td>

                                <strong>
                                    {{ $order->name }}
                                </strong>

                                <br>

                                <small class="text-muted">
                                    {{ $order->email }}
                                </small>

                            </td>


                            <td>

                                {{ $order->phone }}

                            </td>


                            <td>

                                <strong>
                                    Rs. {{ number_format($order->total, 2) }}
                                </strong>

                            </td>


                            <td>

                                <span class="badge bg-label-info">

                                    {{ $order->payment_status }}

                                </span>

                            </td>


                            <td>

                                <span class="badge bg-label-warning">

                                    {{ $order->status }}

                                </span>

                            </td>


                            <td>

                                <a href="{{ route('admin.orders.show', $order) }}"
                                   class="btn btn-sm btn-info">

                                    <i class="bx bx-show"></i>

                                </a>


                                <a href="{{ route('admin.orders.edit', $order) }}"
                                   class="btn btn-sm btn-primary">

                                    <i class="bx bx-edit"></i>

                                </a>


                                <form
                                    action="{{ route('admin.orders.destroy', $order) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this order?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">

                                        <i class="bx bx-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-4">

                                No orders found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <div class="mt-4">

        {{ $orders->links() }}

    </div>

</div>



 @include('admin.footer')


 @include('admin.js')


 </body>
</html>