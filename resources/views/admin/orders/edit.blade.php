
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

    <h4 class="fw-bold mb-4">

        Edit Order
        <span class="text-muted">
            {{ $order->order_number }}
        </span>

    </h4>


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.orders.update', $order) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $order->name) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $order->email) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">Phone</label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone', $order->phone) }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">City</label>

                        <input type="text"
                               name="city"
                               class="form-control"
                               value="{{ old('city', $order->city) }}">

                    </div>


                    <div class="col-md-8 mb-3">

                        <label class="form-label">Address</label>

                        <textarea name="address"
                                  class="form-control">{{ old('address', $order->address) }}</textarea>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">Postal Code</label>

                        <input type="text"
                               name="postal_code"
                               class="form-control"
                               value="{{ old('postal_code', $order->postal_code) }}">

                    </div>

                </div>


                <hr>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">Subtotal</label>

                        <input type="number"
                               step="0.01"
                               name="subtotal"
                               class="form-control"
                               value="{{ old('subtotal', $order->subtotal) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">Delivery</label>

                        <input type="number"
                               step="0.01"
                               name="delivery"
                               class="form-control"
                               value="{{ old('delivery', $order->delivery) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">Total</label>

                        <input type="number"
                               step="0.01"
                               name="total"
                               class="form-control"
                               value="{{ old('total', $order->total) }}">

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Payment Method
                        </label>

                        <input type="text"
                               name="payment_method"
                               class="form-control"
                               value="{{ old('payment_method', $order->payment_method) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Payment Status
                        </label>

                        <select name="payment_status"
                                class="form-select">

                            @foreach(['Pending', 'Paid', 'Failed'] as $status)

                                <option value="{{ $status }}"
                                    {{ $order->payment_status == $status ? 'selected' : '' }}>

                                    {{ $status }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Fulfillment Status
                        </label>

                        <select name="fulfillment_status"
                                class="form-select">

                            @foreach(['Unfulfilled', 'Fulfilled'] as $status)

                                <option value="{{ $status }}"
                                    {{ $order->fulfillment_status == $status ? 'selected' : '' }}>

                                    {{ $status }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Delivery Status
                        </label>

                        <select name="delivery_status"
                                class="form-select">

                            @foreach(['Pending', 'Shipped', 'Delivered'] as $status)

                                <option value="{{ $status }}"
                                    {{ $order->delivery_status == $status ? 'selected' : '' }}>

                                    {{ $status }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Delivery Method
                        </label>

                        <input type="text"
                               name="delivery_method"
                               class="form-control"
                               value="{{ old('delivery_method', $order->delivery_method) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Order Status
                        </label>

                        <select name="status"
                                class="form-select">

                            @foreach(['Pending', 'Processing', 'Completed', 'Cancelled'] as $status)

                                <option value="{{ $status }}"
                                    {{ $order->status == $status ? 'selected' : '' }}>

                                    {{ $status }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                <button type="submit"
                        class="btn btn-primary">

                    Update Order

                </button>


                <a href="{{ route('admin.orders.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

</div>





 @include('admin.js')


 </body>
</html>