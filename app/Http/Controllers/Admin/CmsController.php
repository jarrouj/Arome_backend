<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Date;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscriber;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;


class CmsController extends Controller
{

    // public function dash(Request $request)
    // {
    //     $user                       =  User::latest()->paginate(5); // all users
    //     $NumberOfUsers              =  User::where('usertype' , 0)->count(); // Customers non admin users
    //     $NumberOfOrdersConfirmed    = Order::where('confirm' , 1)->count(); //Total Number of Confirmed Orders
    //     $NumberOfOrdersNonConfirmed = Order::where('confirm' , null)->count(); //Total Number of Confirmed Orders
    //     $NumberOfActiveOffers       = Offer::where('active' , 1)->count(); //Total Number of Active Offers
    //     $NumberOfProducts           = Product::all()->count(); // Total number of products
    //     $NumberOfSubscribers        = Subscriber::all()->count(); // Total subscribers

    //     $Dates = session()->get('selected_date_range', []);

    //     $startDate = $Dates[0] ?? null;
    //     $endDate   = $Dates[1] ?? null;

    //     $start_date = Carbon::now()->format('d-m-Y');
    //     $end_date = Carbon::now()->format('d-m-Y');

    //     // if ($start_date != Carbon::now()->format('d/m/Y') && $end_date != Carbon::now()->format('d/m/Y'))
    //     // {
    //     //     $start_date = $request->start_date;
    //     //     $end_date = $request->end_date;
    //     // }

    //     if ($request->start_date && $request->end_date)
    //     {
    //         $start_date = $request->start_date;
    //         $end_date = $request->end_date;
    //     }

    //     $filter = $this->filterDate($start_date , $end_date);

    //   // Calculate revenue
    // $Revenue = 0;

    // if ($startDate && $endDate) {
    //     $orders = Order::where('confirm', 1)
    //         ->where('method', 1)
    //         ->whereBetween('created_at', [$startDate, $endDate])
    //         ->get();

    //     foreach ($orders as $order) {
    //         $Revenue += $order->total_usd;
    //     }
    // } else {
    //     $orders = Order::where('confirm', 1)
    //         ->where('method', 1)
    //         ->get();

    //     foreach ($orders as $order) {
    //         $Revenue += $order->total_usd;
    //     }
    // }

    // // Generate revenue data for each day
    // $revenue = [];

    // if ($startDate && $endDate) {
    //     // Loop through each day in the date range
    //     $currentDate = new DateTime($startDate);
    //     $endDateObj = new DateTime($endDate);

    //     while ($currentDate <= $endDateObj) {
    //         $formattedDate = $currentDate->format('Y-m-d');
    //         $revenue[$formattedDate] = $orders->where('created_at', 'like', $formattedDate . '%')->sum('total_usd');
    //         $currentDate->modify('+1 day');
    //     }
    // }



    //     return view('admin.home', compact('user' ,
    //                                       'NumberOfUsers' ,
    //                                       'NumberOfOrdersConfirmed' ,
    //                                       'Revenue' ,
    //                                       'NumberOfOrdersNonConfirmed' ,
    //                                       'NumberOfActiveOffers' ,
    //                                       'NumberOfProducts' ,
    //                                       'NumberOfSubscribers',
    //                                       'revenue',
    //                                       'startDate',
    //                                       'endDate',
    //                                       'start_date',
    //                                       'end_date'
    //                                     ));
    // }

    public function dash(Request $request)
    {

        $Dates = session()->get('selected_date_range', []);

        $startDate = $Dates[0] ?? null;
        $endDate = $Dates[1] ?? null;

        $user = User::latest()->paginate(5); // all users
        $NumberOfUsers = User::where('usertype', 0)->count(); // Customers non-admin users

        $NumberOfOrdersConfirmed = Order::where('confirm', 1) // number of confirmed orders
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

        $NumberOfOrdersNonConfirmed = Order::whereNull('confirm')// number of order nor confirmed nor canceled
        ->whereBetween('created_at', [$startDate, $endDate])
        ->count();

        $NumberOfActiveOffers = Offer::where('active', 1)->count(); // Total Number of Active Offers
        $NumberOfProducts = Product::all()->count(); // Total number of products
        $NumberOfSubscribers = Subscriber::all()->count(); // Total subscribers



        $start_date = Carbon::now()->format('d-m-Y');
            $end_date = Carbon::now()->format('d-m-Y');

            // if ($start_date != Carbon::now()->format('d/m/Y') && $end_date != Carbon::now()->format('d/m/Y'))
            // {
            //     $start_date = $request->start_date;
            //     $end_date = $request->end_date;
            // }

            if ($request->start_date && $request->end_date)
            {
                $start_date = $request->start_date;
                $end_date = $request->end_date;
            }

            // $filter = $this->filterDate($start_date , $end_date);


         // Calculate revenue
    $Revenue = 0;

    if ($startDate && $endDate) {
        $orders = Order::where('confirm', 1)
            ->where('method', 1)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        foreach ($orders as $order) {
            $Revenue += $order->total_usd;
        }
    } else {
        $orders = Order::where('confirm', 1)
            ->where('method', 1)
            ->get();

        foreach ($orders as $order) {
            $Revenue += $order->total_usd;
        }
    }

        // Calculate revenue for each day within the date range
        $revenue = [];

        if ($startDate && $endDate) {
            $startDateObj = Carbon::parse($startDate);
            $endDateObj = Carbon::parse($endDate);

            // Loop through each day in the date range
            while ($startDateObj <= $endDateObj) {
                $revenue[$startDateObj->format('Y-m-d')] = Order::where('confirm', 1)
                    ->where('method', 1)
                    ->whereDate('created_at', $startDateObj->format('Y-m-d'))
                    ->sum('total_usd');

                $startDateObj->addDay(); // Move to the next day
            }
        }

        // Calculate total revenue for each month
        $monthlyRevenue = Order::where('confirm', 1)
            ->where('method', 1)
            ->whereBetween('created_at', [$startDate ?? now()->startOfMonth(), $endDate ?? now()->endOfMonth()])
            ->orderByRaw('DATE_FORMAT(created_at, "%Y-%m")')
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, SUM(total_usd) as revenue')
            ->groupBy('month')
            ->pluck('revenue', 'month');

        return view('admin.home', compact(
            'user',
            'NumberOfUsers',
            'NumberOfOrdersConfirmed',
            'NumberOfOrdersNonConfirmed',
            'NumberOfActiveOffers',
            'NumberOfProducts',
            'NumberOfSubscribers',
            'revenue',
            'Revenue' ,

            'startDate',
            'endDate',
            'monthlyRevenue',
            'start_date',
            'end_date',
        ));
    }

    // public function filterDate($start_date, $end_date)
    // {
    //     $fromDate = $start_date;
    //     $toDate = $end_date;


    //     session()->put('selected_date_range', [$fromDate, $toDate]);

    //     // $session = session()->get('selected_date_range', []);

    //     // dd($session);

    //     return redirect()->back();
    // }

    public function filterDate(Request $request)
    {
        $fromDate = $request->start_date;
        $toDate = $request->end_date;



        session()->put('selected_date_range', [$fromDate, $toDate]);

        // $session = session()->get('selected_date_range', []);

        // dd($session);

        return redirect()->back();
    }

    public function clearDateSession()
    {
        session()->forget('selected_date_range');


        return redirect()->back();
    }

}
