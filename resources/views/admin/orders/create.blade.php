
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
        Create Order
    </h4>


    <div class="card">

        <div class="card-body">

            <form action="{{ route('admin.orders.store') }}"
                  method="POST">

                @csrf


                <h5 class="mb-3">
                    Customer Information
                </h5>


                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Phone
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone') }}">

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            City
                        </label>

                        <input type="text"
                               name="city"
                               class="form-control"
                               value="{{ old('city') }}">

                    </div>


                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            Address
                        </label>

                        <textarea name="address"
                                  class="form-control">{{ old('address') }}</textarea>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Postal Code
                        </label>

                        <input type="text"
                               name="postal_code"
                               class="form-control"
                               value="{{ old('postal_code') }}">

                    </div>

                </div>


                <hr>


                <h5 class="mb-3">
                    Order Amount
                </h5>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Subtotal
                        </label>

                        <input type="number"
                               step="0.01"
                               name="subtotal"
                               class="form-control"
                               value="{{ old('subtotal', 0) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Delivery
                        </label>

                        <input type="number"
                               step="0.01"
                               name="delivery"
                               class="form-control"
                               value="{{ old('delivery', 0) }}">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Total
                        </label>

                        <input type="number"
                               step="0.01"
                               name="total"
                               class="form-control"
                               value="{{ old('total', 0) }}">

                    </div>

                </div>


                <hr>


                <h5 class="mb-3">
                    Order Status
                </h5>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Payment Method
                        </label>

                        <select name="payment_method"
                                class="form-select">

                            <option value="Cash on Delivery">
                                Cash on Delivery
                            </option>

                            <option value="Online Payment">
                                Online Payment
                            </option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Payment Status
                        </label>

                        <select name="payment_status"
                                class="form-select">

                            <option value="Pending">Pending</option>

                            <option value="Paid">Paid</option>

                            <option value="Failed">Failed</option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Fulfillment Status
                        </label>

                        <select name="fulfillment_status"
                                class="form-select">

                            <option value="Unfulfilled">
                                Unfulfilled
                            </option>

                            <option value="Fulfilled">
                                Fulfilled
                            </option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Delivery Status
                        </label>

                        <select name="delivery_status"
                                class="form-select">

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Shipped">
                                Shipped
                            </option>

                            <option value="Delivered">
                                Delivered
                            </option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Delivery Method
                        </label>

                        <input type="text"
                               name="delivery_method"
                               class="form-control"
                               value="Standard Delivery">

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Order Status
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Processing">
                                Processing
                            </option>

                            <option value="Completed">
                                Completed
                            </option>

                            <option value="Cancelled">
                                Cancelled
                            </option>

                        </select>

                    </div>

                </div>


                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        Create Order

                    </button>


                    <a href="{{ route('admin.orders.index') }}"
                       class="btn btn-secondary">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>



 @include('admin.footer')


 @include('admin.js')


 </body>
</html>