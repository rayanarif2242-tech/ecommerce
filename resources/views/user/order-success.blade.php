
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Order Confirmed | Kaira</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        body {
            background: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        .success-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .success-card {
            background: #fff;
            border: 1px solid #ddd;
            max-width: 650px;
            width: 100%;
            padding: 55px 40px;
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: #eaf7ef;
            color: #198754;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 38px;
        }

        .success-title {
            font-size: 34px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .success-text {
            color: #666;
            font-size: 14px;
            line-height: 1.7;
        }

        .order-number {
            background: #f7f7f7;
            border: 1px solid #ddd;
            padding: 18px;
            margin: 25px 0;
        }

        .order-number span {
            display: block;
            color: #777;
            font-size: 11px;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .order-number strong {
            font-size: 15px;
        }

        .order-details {
            text-align: left;
            border-top: 1px solid #eee;
            padding-top: 20px;
            margin-top: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 13px;
        }

        .home-btn {
            display: inline-block;
            background: #111;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-top: 25px;
        }

        .home-btn:hover {
            background: #333;
            color: #fff;
        }

    </style>

</head>

<body>

<div class="success-page">

    <div class="success-card">

        <div class="success-icon">

            <i class="bi bi-check-lg"></i>

        </div>


        <h1 class="success-title">
            Order Confirmed!
        </h1>


        <p class="success-text">

            Thank you, {{ $order->name }}.

            Your order has been successfully placed.

            We will contact you regarding delivery.

        </p>


        <div class="order-number">

            <span>
                Order Number
            </span>

            <strong>
                {{ $order->order_number }}
            </strong>

        </div>


        <div class="order-details">

            <div class="detail-row">

                <span>
                    Total
                </span>

                <strong>
                    Rs. {{ number_format($order->total, 2) }}
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    Payment
                </span>

                <strong>
                    {{ $order->payment_method }}
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    Status
                </span>

                <strong>
                    {{ $order->status }}
                </strong>

            </div>


            <div class="detail-row">

                <span>
                    Delivery City
                </span>

                <strong>
                    {{ $order->city }}
                </strong>

            </div>

        </div>


        <a
            href="{{ url('/') }}"
            class="home-btn"
        >
            Continue Shopping
        </a>

    </div>

</div>

</body>

</html>