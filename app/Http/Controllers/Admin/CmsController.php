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
    public function dash()
    {
        $user                       =  User::latest()->paginate(5); // all users
        $NumberOfUsers              =  User::where('usertype' , 0)->count(); // Customers non admin users
        $NumberOfOrdersConfirmed    = Order::where('confirm' , 1)->count(); //Total Number of Confirmed Orders
        $NumberOfOrdersNonConfirmed = Order::where('confirm' , null)->count(); //Total Number of Confirmed Orders
        $NumberOfActiveOffers       = Offer::where('active' , 1)->count(); //Total Number of Active Offers
        $NumberOfProducts           = Product::all()->count(); // Total number of products
        $NumberOfSubscribers        = Subscriber::all()->count(); // Total subscribers

        $Dates = session()->get('selected_date_range', []);

        $startDate = $Dates[0] ?? null;
        $endDate   = $Dates[1] ?? null;

        //Revenue
        $Revenue = 0;

        if ($startDate && $endDate) {
            $order = Order::where('confirm' , 1)->where('method' , 1)->whereBetween('created_at' , [$startDate , $endDate])->get();

            foreach($order as $orders)
            {
                $Revenue += $orders->total_usd;
            }
        }else
        {
            $order = Order::where('confirm' , 1)->where('method' , 1)->get();

            foreach($order as $orders)
            {
                $Revenue += $orders->total_usd;
            }
        }



        return view('admin.home', compact('user' ,
                                          'NumberOfUsers' ,
                                          'NumberOfOrdersConfirmed' ,
                                          'Revenue' ,
                                          'NumberOfOrdersNonConfirmed' ,
                                          'NumberOfActiveOffers' ,
                                          'NumberOfProducts' ,
                                          'NumberOfSubscribers'
                                        ));
    }


    public function filterDate(Request $request)
    {
        $fromDate = $request->input('start_date');
        $toDate = $request->input('end_date');


        session()->put('selected_date_range', [$fromDate, $toDate]);

        // $session = session()->get('selected_date_range', []);

        // dd($session);

        return redirect()->back();
    }
}
