<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | CURRENT DATE & TIME
        |--------------------------------------------------------------------------
        */

        $now = Carbon::now('Asia/Karachi');

        $todayStart = $now->copy()->startOfDay();

        $todayEnd = $now->copy()->endOfDay();

        $currentYear = $now->year;

        $currentMonth = $now->month;


        /*
        |--------------------------------------------------------------------------
        | TOTAL COUNTS
        |--------------------------------------------------------------------------
        */

        $totalOrders = Order::count();

        $totalProducts = Product::count();

        $totalUsers = User::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL REVENUE
        |--------------------------------------------------------------------------
        | All Completed orders.
        */

        $totalRevenue = (float) Order::where(
            'status',
            'Completed'
        )->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TODAY'S ORDERS
        |--------------------------------------------------------------------------
        | Orders CREATED today.
        */

       $todayOrders = Order::whereDate(
    'created_at',
    $now->toDateString()
)->count();


        /*
        |--------------------------------------------------------------------------
        | TODAY'S SALES
        |--------------------------------------------------------------------------
        | Completed orders UPDATED today.
        |
        | This counts orders that were changed to Completed today,
        | even if they were originally created on an earlier date.
        */

        $todayRevenue = (float) Order::where(
            'status',
            'Completed'
        )
        ->whereBetween(
            'updated_at',
            [
                $todayStart,
                $todayEnd
            ]
        )
        ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | THIS MONTH'S REVENUE
        |--------------------------------------------------------------------------
        | Completed orders for the current month.
        |
        | Using updated_at because this represents when the order
        | was completed/updated.
        */

        $monthlyRevenue = (float) Order::where(
            'status',
            'Completed'
        )
        ->whereYear(
            'updated_at',
            $currentYear
        )
        ->whereMonth(
            'updated_at',
            $currentMonth
        )
        ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | ORDER STATUS COUNTS
        |--------------------------------------------------------------------------
        */

        $pendingOrders = Order::where(
            'status',
            'Pending'
        )->count();


        $confirmedOrders = Order::where(
            'status',
            'Confirmed'
        )->count();


        $processingOrders = Order::where(
            'status',
            'Processing'
        )->count();


        $shippedOrders = Order::where(
            'status',
            'Shipped'
        )->count();


        $deliveredOrders = Order::where(
            'status',
            'Completed'
        )->count();


        $cancelledOrders = Order::where(
            'status',
            'Cancelled'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | MONTHLY REVENUE DATA
        |--------------------------------------------------------------------------
        | Revenue grouped by the month an order was completed.
        */

        $monthlyRevenueData = Order::select(

            DB::raw(
                'MONTH(updated_at) as month'
            ),

            DB::raw(
                'SUM(total) as revenue'
            )

        )
        ->where(
            'status',
            'Completed'
        )
        ->whereYear(
            'updated_at',
            $currentYear
        )
        ->groupBy(
            DB::raw(
                'MONTH(updated_at)'
            )
        )
        ->pluck(
            'revenue',
            'month'
        )
        ->toArray();


        /*
        |--------------------------------------------------------------------------
        | CREATE 12 MONTH ARRAY
        |--------------------------------------------------------------------------
        */

        $monthlyRevenueChart = [];

        for ($month = 1; $month <= 12; $month++) {

            $monthlyRevenueChart[] =
                isset($monthlyRevenueData[$month])

                ? (float) $monthlyRevenueData[$month]

                : 0;
        }


        /*
        |--------------------------------------------------------------------------
        | RECENT ORDERS
        |--------------------------------------------------------------------------
        */

        $recentOrders = Order::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.index',
            compact(

                'totalOrders',
                'totalProducts',
                'totalUsers',

                'totalRevenue',
                

                'todayRevenue',
                'monthlyRevenue',

                'todayOrders',

                'pendingOrders',
                'confirmedOrders',
                'processingOrders',
                'shippedOrders',
                'deliveredOrders',
                'cancelledOrders',

                'monthlyRevenueChart',

                'recentOrders'
            )
        );
    }
}
