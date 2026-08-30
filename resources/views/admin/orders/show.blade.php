
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

    <div class="d-flex justify-content-between mb-4">

        <h4 class="fw-bold">

            Order Details

            <span class="text-muted">
                {{ $order->order_number }}
            </span>

        </h4>


        <a href="{{ route('admin.orders.index') }}"
           class="btn btn-secondary">

            Back

        </a>

    </div>


    <div class="row">

        {{-- Customer Information --}}

        <div class="col-md-6">

            <div class="card mb-4">

                <div class="card-body">

                    <h5>Customer Information</h5>

                    <hr>

                    <p>
                        <strong>Name:</strong>
                        {{ $order->name }}
                    </p>

                    <p>
                        <strong>Email:</strong>
                        {{ $order->email }}
                    </p>

                    <p>
                        <strong>Phone:</strong>
                        {{ $order->phone }}
                    </p>

                    <p>
                        <strong>Address:</strong>
                        {{ $order->address }}
                    </p>

                    <p>
                        <strong>City:</strong>
                        {{ $order->city }}
                    </p>

                    <p>
                        <strong>Postal Code:</strong>
                        {{ $order->postal_code }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Order Information --}}

        <div class="col-md-6">

            <div class="card mb-4">

                <div class="card-body">

                    <h5>Order Information</h5>

                    <hr>

                    <p>
                        <strong>Order Number:</strong>
                        {{ $order->order_number }}
                    </p>

                    <p>
                        <strong>Subtotal:</strong>
                        Rs. {{ number_format($order->subtotal, 2) }}
                    </p>

                    <p>
                        <strong>Delivery:</strong>
                        Rs. {{ number_format($order->delivery, 2) }}
                    </p>

                    <p>
                        <strong>Total:</strong>
                        Rs. {{ number_format($order->total, 2) }}
                    </p>

                    <p>
                        <strong>Payment Method:</strong>
                        {{ $order->payment_method }}
                    </p>

                    <p>
                        <strong>Payment Status:</strong>
                        {{ $order->payment_status }}
                    </p>

                    <p>
                        <strong>Order Status:</strong>
                        {{ $order->status }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- Order Items --}}

    <div class="card">

        <div class="card-body">

            <h5>Order Items</h5>

            <hr>


            <table class="table">

                <thead>

                    <tr>

                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($order->items as $item)

                        <tr>

                            <td>{{ $item->name }}</td>

                            <td>{{ $item->item_type }}</td>

                            <td>
                                Rs. {{ number_format($item->price, 2) }}
                            </td>

                            <td>
                                {{ $item->quantity }}
                            </td>

                            <td>
                                Rs. {{ number_format($item->total, 2) }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center">

                                No items found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>



 @include('admin.footer')


 @include('admin.js')


 </body>
</html>