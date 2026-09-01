
<style>
    /* =========================================================
       DASHBOARD
    ========================================================= */

    .dashboard-small-card {
        height: 100%;
    }

    .dashboard-small-card .card-body {
        padding: 1.25rem;
        overflow: hidden;
    }

    .dashboard-small-card .avatar {
        margin-bottom: .75rem !important;
    }

    .dashboard-small-card .avatar img {
        width: 42px;
        height: 42px;
        object-fit: contain;
    }

    .dashboard-amount {
        font-size: 1.45rem;
        line-height: 1.25;
        font-weight: 700;
        margin: 0;
        white-space: nowrap;
    }

    .dashboard-small-card small {
        display: block;
        line-height: 1.4;
    }

    .revenue-amount {
        font-size: 1.15rem;
        word-break: break-word;
    }

    #totalRevenueChart {
        min-height: 300px;
    }

    #orderStatisticsChart {
        min-height: 180px;
        min-width: 180px;
    }

    #incomeChart {
        min-height: 100px;
    }

    @media (max-width: 1399px) {
        .dashboard-amount {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 991px) {
        .dashboard-amount {
            font-size: 1.4rem;
        }
    }

    @media (max-width: 575px) {
        .dashboard-small-card .card-body {
            padding: 1rem;
        }

        .dashboard-amount {
            font-size: 1.05rem;
        }
    }
</style>


<div class="content-wrapper">

    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- =====================================================
            FIRST ROW
        ====================================================== --}}

        <div class="row">

            {{-- WELCOME --}}
            <div class="col-lg-8 mb-4 order-0">

                <div class="card">

                    <div class="d-flex align-items-end row">

                        <div class="col-sm-7">

                            <div class="card-body">

                                <h5 class="card-title text-primary">
                                    Welcome,
                                    {{ Auth::guard('admin')->user()->name ?? 'Admin' }}! 🎉
                                </h5>

                                <p class="mb-4">

                                    Today you have received

                                    <span class="fw-bold">
                                        {{ $todayOrders ?? 0 }}
                                    </span>

                                    new orders.

                                </p>

                                <a
                                    href="{{ route('admin.orders.index') }}"
                                    class="btn btn-sm btn-outline-primary"
                                >
                                    View Orders
                                </a>

                            </div>

                        </div>


                        <div class="col-sm-5 text-center">

                            <div class="card-body pb-0 px-0 px-md-4">

                                <img
                                    src="{{ asset('admins/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140"
                                    alt="Admin Dashboard"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png"
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- TOP REVENUE CARDS --}}
            <div class="col-lg-4 mb-4 order-1">

                <div class="row g-4">

                    {{-- TOTAL REVENUE --}}
                    <div class="col-6">

                        <div class="card dashboard-small-card">

                            <div class="card-body">

                                <div class="avatar flex-shrink-0">

                                    <img
                                        src="{{ asset('admins/assets/img/icons/unicons/chart-success.png') }}"
                                        alt="Revenue"
                                        class="rounded"
                                    >

                                </div>

                                <span class="fw-semibold d-block mb-1">
                                    Total Revenue
                                </span>

                                <h4 class="dashboard-amount mb-2">
                                    Rs. {{ number_format($totalRevenue ?? 0) }}
                                </h4>

                                <small class="text-muted">
                                    Completed orders
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- TODAY SALES --}}
                    <div class="col-6">

                        <div class="card dashboard-small-card">

                            <div class="card-body">

                                <div class="avatar flex-shrink-0">

                                    <img
                                        src="{{ asset('admins/assets/img/icons/unicons/wallet-info.png') }}"
                                        alt="Today's Sales"
                                        class="rounded"
                                    >

                                </div>

                                <span class="fw-semibold d-block mb-1">
                                    Today's Sales
                                </span>

                                <h4 class="dashboard-amount mb-2">
                                    Rs. {{ number_format($todayRevenue ?? 0) }}
                                </h4>

                                <small class="text-muted">
                                    {{ $todayOrders ?? 0 }} orders today
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                REVENUE OVERVIEW
            ====================================================== --}}

            <div class="col-12 col-lg-8 order-2 mb-4">

                <div class="card">

                    <div class="row row-bordered g-0">

                        {{-- CHART --}}
                        <div class="col-md-8">

                            <h5 class="card-header m-0 me-2 pb-3">
                                Revenue Overview
                            </h5>

                            <div
                                id="totalRevenueChart"
                                class="px-2"
                            ></div>

                        </div>


                        {{-- MONTHLY SUMMARY --}}
                        <div class="col-md-4">

                            <div class="card-body">

                                <div class="text-center">

                                    <span class="btn btn-sm btn-outline-primary">
                                        {{ now()->year }}
                                    </span>

                                </div>

                            </div>


                            <div class="text-center pt-2">

                                <div class="avatar mx-auto mb-3">

                                    <span class="avatar-initial rounded bg-label-primary">

                                        <i class="bx bx-money fs-3"></i>

                                    </span>

                                </div>


                                <div class="fw-semibold mb-2">
                                    Monthly Revenue
                                </div>


                                <h4 class="mb-1 revenue-amount">

                                    Rs. {{ number_format($monthlyRevenue ?? 0) }}

                                </h4>


                                <small class="text-muted">

                                    {{ now()->format('F Y') }}

                                </small>

                            </div>


                            <div class="px-4 pb-4 mt-4">

                                <div class="d-flex align-items-center">

                                    <div class="me-3">

                                        <span class="badge bg-label-success p-2">

                                            <i class="bx bx-check"></i>

                                        </span>

                                    </div>


                                    <div>

                                        <small class="text-muted d-block">
                                            Revenue Status
                                        </small>

                                        <h6 class="mb-0 text-success">
                                            Completed Orders
                                        </h6>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                RIGHT SIDE
            ====================================================== --}}

            <div class="col-12 col-lg-4 order-3">

                <div class="row g-4">

                    {{-- MONTHLY REVENUE --}}
                    <div class="col-6">

                        <div class="card dashboard-small-card">

                            <div class="card-body">

                                <div class="avatar flex-shrink-0">

                                    <img
                                        src="{{ asset('admins/assets/img/icons/unicons/paypal.png') }}"
                                        alt="Monthly Revenue"
                                        class="rounded"
                                    >

                                </div>

                                <span class="d-block mb-1">
                                    Monthly Revenue
                                </span>

                                <h4 class="dashboard-amount mb-2">
                                    Rs. {{ number_format($monthlyRevenue ?? 0) }}
                                </h4>

                                <small class="text-muted">
                                    {{ now()->format('F') }}
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- TOTAL ORDERS --}}
                    <div class="col-6">

                        <div class="card dashboard-small-card">

                            <div class="card-body">

                                <div class="avatar flex-shrink-0">

                                    <img
                                        src="{{ asset('admins/assets/img/icons/unicons/cc-primary.png') }}"
                                        alt="Orders"
                                        class="rounded"
                                    >

                                </div>

                                <span class="fw-semibold d-block mb-1">
                                    Total Orders
                                </span>

                                <h4 class="dashboard-amount mb-2">
                                    {{ number_format($totalOrders ?? 0) }}
                                </h4>

                                <small class="text-muted">
                                    All customer orders
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- STORE SUMMARY --}}
                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">

                                    <div>

                                        <h5 class="mb-2">
                                            Store Summary
                                        </h5>

                                        <span class="badge bg-label-primary rounded-pill mb-3">
                                            LIVE DATA
                                        </span>

                                        <div>

                                            <small class="text-success fw-semibold">

                                                <i class="bx bx-package"></i>

                                                {{ $totalProducts ?? 0 }}
                                                Products

                                            </small>

                                        </div>

                                    </div>


                                    <div class="text-end">

                                        <h4 class="mb-1">
                                            {{ $deliveredOrders ?? 0 }}
                                        </h4>

                                        <small class="text-muted">
                                            Delivered Orders
                                        </small>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
            SECOND ROW
        ====================================================== --}}

        <div class="row">


            {{-- ORDER STATISTICS --}}
            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card h-100">

                    <div class="card-header">

                        <h5 class="m-0">
                            Order Statistics
                        </h5>

                        <small class="text-muted">
                            Real order status data
                        </small>

                    </div>


                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div class="text-center">

                                <h2 class="mb-1">
                                    {{ number_format($totalOrders ?? 0) }}
                                </h2>

                                <span>
                                    Total Orders
                                </span>

                            </div>


                            <div id="orderStatisticsChart"></div>

                        </div>


                        <ul class="p-0 m-0 list-unstyled">

                            {{-- PENDING --}}
                            <li class="d-flex mb-4">

                                <div class="avatar flex-shrink-0 me-3">

                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-time"></i>
                                    </span>

                                </div>

                                <div class="d-flex w-100 justify-content-between align-items-center">

                                    <div>

                                        <h6 class="mb-0">
                                            Pending
                                        </h6>

                                        <small class="text-muted">
                                            Waiting for confirmation
                                        </small>

                                    </div>

                                    <strong>
                                        {{ $pendingOrders ?? 0 }}
                                    </strong>

                                </div>

                            </li>


                            {{-- PROCESSING --}}
                            <li class="d-flex mb-4">

                                <div class="avatar flex-shrink-0 me-3">

                                    <span class="avatar-initial rounded bg-label-info">
                                        <i class="bx bx-loader-circle"></i>
                                    </span>

                                </div>

                                <div class="d-flex w-100 justify-content-between align-items-center">

                                    <div>

                                        <h6 class="mb-0">
                                            Processing
                                        </h6>

                                        <small class="text-muted">
                                            Orders being processed
                                        </small>

                                    </div>

                                    <strong>
                                        {{ $processingOrders ?? 0 }}
                                    </strong>

                                </div>

                            </li>


                            {{-- SHIPPED --}}
                            <li class="d-flex mb-4">

                                <div class="avatar flex-shrink-0 me-3">

                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="bx bx-car"></i>
                                    </span>

                                </div>

                                <div class="d-flex w-100 justify-content-between align-items-center">

                                    <div>

                                        <h6 class="mb-0">
                                            Shipped
                                        </h6>

                                        <small class="text-muted">
                                            Orders on delivery
                                        </small>

                                    </div>

                                    <strong>
                                        {{ $shippedOrders ?? 0 }}
                                    </strong>

                                </div>

                            </li>


                            {{-- DELIVERED --}}
                            <li class="d-flex">

                                <div class="avatar flex-shrink-0 me-3">

                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-check"></i>
                                    </span>

                                </div>

                                <div class="d-flex w-100 justify-content-between align-items-center">

                                    <div>

                                        <h6 class="mb-0">
                                            Delivered
                                        </h6>

                                        <small class="text-muted">
                                            Successfully delivered
                                        </small>

                                    </div>

                                    <strong>
                                        {{ $deliveredOrders ?? 0 }}
                                    </strong>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            {{-- REVENUE SUMMARY --}}
            <div class="col-md-6 col-lg-4 mb-4">

                <div class="card h-100">

                    <div class="card-header">

                        <h5 class="m-0">
                            Revenue Summary
                        </h5>

                    </div>


                    <div class="card-body">

                        <div class="d-flex align-items-center mb-4">

                            <div class="avatar flex-shrink-0 me-3">

                                <span class="avatar-initial rounded bg-label-primary">

                                    <i class="bx bx-money fs-4"></i>

                                </span>

                            </div>


                            <div>

                                <small class="text-muted d-block">
                                    Total Revenue
                                </small>

                                <h5 class="mb-0">
                                    Rs. {{ number_format($totalRevenue ?? 0) }}
                                </h5>

                            </div>

                        </div>


                        {{-- MINI REVENUE BAR --}}
                        <div id="incomeChart"></div>


                        <hr>


                        <div class="d-flex justify-content-between">

                            <div>

                                <small class="text-muted">
                                    Today's Revenue
                                </small>

                                <h6 class="mb-0">
                                    Rs. {{ number_format($todayRevenue ?? 0) }}
                                </h6>

                            </div>


                            <div class="text-end">

                                <small class="text-muted">
                                    Monthly Revenue
                                </small>

                                <h6 class="mb-0">
                                    Rs. {{ number_format($monthlyRevenue ?? 0) }}
                                </h6>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RECENT ORDERS --}}
            <div class="col-md-12 col-lg-4 mb-4">

                <div class="card h-100">

                    <div class="card-header d-flex align-items-center justify-content-between">

                        <h5 class="card-title m-0">
                            Recent Orders
                        </h5>

                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="btn btn-sm btn-outline-primary"
                        >
                            View All
                        </a>

                    </div>


                    <div class="card-body">

                        <ul class="p-0 m-0 list-unstyled">

                            @forelse($recentOrders as $order)

                                <li class="d-flex mb-4">

                                    <div class="avatar flex-shrink-0 me-3">

                                        <span class="avatar-initial rounded bg-label-primary">

                                            <i class="bx bx-package"></i>

                                        </span>

                                    </div>


                                    <div class="d-flex w-100 justify-content-between align-items-center">

                                        <div>

                                            <small class="text-muted d-block">

                                                {{ $order->order_number ?? 'Order' }}

                                            </small>


                                            <h6 class="mb-0">

                                                {{ $order->name }}

                                            </h6>


                                            <small class="text-muted">

                                                {{ $order->status }}

                                            </small>

                                        </div>


                                        <div class="text-end">

                                            <h6 class="mb-0">

                                                Rs. {{ number_format($order->total ?? 0) }}

                                            </h6>

                                        </div>

                                    </div>

                                </li>

                            @empty

                                <div class="text-center text-muted py-5">

                                    <i class="bx bx-package fs-1 d-block mb-2"></i>

                                    No orders yet.

                                </div>

                            @endforelse

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    console.log('Dashboard charts loading...');

    if (typeof ApexCharts === 'undefined') {
        console.error('ApexCharts is not loaded!');
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | DATA
    |--------------------------------------------------------------------------
    */

    const monthlyRevenue = @json(
        isset($monthlyRevenueChart)
            ? $monthlyRevenueChart
            : array_fill(0, 12, 0)
    );

    const pendingOrders = {{ $pendingOrders ?? 0 }};
    const processingOrders = {{ $processingOrders ?? 0 }};
    const shippedOrders = {{ $shippedOrders ?? 0 }};
    const deliveredOrders = {{ $deliveredOrders ?? 0 }};


    /*
    |--------------------------------------------------------------------------
    | REVENUE OVERVIEW CHART
    |--------------------------------------------------------------------------
    */

    const revenueElement = document.querySelector('#totalRevenueChart');

    if (revenueElement) {

        revenueElement.innerHTML = '';

        const revenueOptions = {

            series: [{
                name: 'Revenue',
                data: monthlyRevenue
            }],

            chart: {
                type: 'area',
                height: 300,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },

            stroke: {
                curve: 'smooth',
                width: 3
            },

            dataLabels: {
                enabled: false
            },

            markers: {
                size: 4
            },

            xaxis: {
                categories: [
                    'Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'Jun', 'Jul', 'Aug',
                    'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },

            yaxis: {
                labels: {
                    formatter: function (value) {
                        return 'Rs. ' + Number(value).toLocaleString();
                    }
                }
            },

            tooltip: {
                y: {
                    formatter: function (value) {
                        return 'Rs. ' + Number(value).toLocaleString();
                    }
                }
            },

            fill: {
                type: 'gradient',
                gradient: {
                    opacityFrom: 0.5,
                    opacityTo: 0.1
                }
            },

            grid: {
                strokeDashArray: 4
            }

        };

        const revenueChart = new ApexCharts(
            revenueElement,
            revenueOptions
        );

        revenueChart.render();
    }


    /*
    |--------------------------------------------------------------------------
    | ORDER STATISTICS DONUT
    |--------------------------------------------------------------------------
    */

    const orderElement = document.querySelector('#orderStatisticsChart');

    if (orderElement) {

        orderElement.innerHTML = '';

        const orderOptions = {

            series: [
                pendingOrders,
                processingOrders,
                shippedOrders,
                deliveredOrders
            ],

            labels: [
                'Pending',
                'Processing',
                'Shipped',
                'Delivered'
            ],

            chart: {
                type: 'donut',
                height: 220
            },

            legend: {
                show: false
            },

            dataLabels: {
                enabled: false
            },

            tooltip: {
                y: {
                    formatter: function (value) {
                        return value + ' Orders';
                    }
                }
            }

        };

        const orderChart = new ApexCharts(
            orderElement,
            orderOptions
        );

        orderChart.render();
    }


    /*
    |--------------------------------------------------------------------------
    | REVENUE SUMMARY MINI CHART
    |--------------------------------------------------------------------------
    */

    const incomeElement = document.querySelector('#incomeChart');

    if (incomeElement) {

        incomeElement.innerHTML = '';

        const incomeOptions = {

            series: [{
                name: 'Revenue',
                data: monthlyRevenue
            }],

            chart: {
                type: 'bar',
                height: 100,

                sparkline: {
                    enabled: true
                }
            },

            plotOptions: {
                bar: {
                    columnWidth: '55%',
                    borderRadius: 4
                }
            },

            dataLabels: {
                enabled: false
            },

            tooltip: {
                y: {
                    formatter: function (value) {
                        return 'Rs. ' + Number(value).toLocaleString();
                    }
                }
            }

        };

        const incomeChart = new ApexCharts(
            incomeElement,
            incomeOptions
        );

        incomeChart.render();
    }

});
</script>