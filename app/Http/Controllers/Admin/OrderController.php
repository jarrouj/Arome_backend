<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\OrderProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function show_order()
    {
        $Dates = session()->get('selected_date_range', []);

        $startDate = $Dates[0] ?? null;
        $endDate   = $Dates[1] ?? null;

        if ($startDate && $endDate) {

            $order = Order::whereBetween('created_at', [$startDate, $endDate])->latest()->paginate(10);
        } else {

            $order = Order::latest()->paginate(10);
        }

        $users = User::all();

        return view('admin.order.show_order', compact('order', 'users'));
    }

    public function update_order($id)
    {
        $order  = Order::find($id);
        $users  = User::all();

        return view('admin.order.update_order', compact('order', 'users'));
    }

    public function update_order_confirm(Request $request, $id)
    {
        $order = Order::find($id);



        $order->paid       = $request->paid;
        $order->method     = $request->method;
        $order->delivered  = $request->delivered;
        $order->registered = $request->registered;
        $order->offer      = $request->offer;

        $order->save();

        return redirect('/admin/show_order')->with('message', 'Order Updated');
    }


    public function delete_order($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->back()->with('message', 'Order Deleted');
    }

    public function update_status(Request $request, $id)
    {
        $order = Order::find($id);


        if ($order->confirm === null) {

            $order->confirm = $request->conf;
            $order->save();

            $message = $request->conf == 1 ? 'Order Confirmed' : 'Order Canceled';

            if ($request->conf == 1) {

                $transaction = new Transaction();

                $transaction->user_id = $order->user_id;
                $transaction->f_name  = $order->f_name;
                $transaction->l_name  = $order->l_name;
                $transaction->email   = $order->email;
                $transaction->phone   = $order->phone;
                $transaction->addsub  = $order->method; //if method= 1 then cash =>we add the pts else the client paid with points then we remove points
                $transaction->points += $order->total_pts;


                $transaction->save();
            }

            if ($order->user_id != null) // Update the user points in the user table
            {
                $user = User::find($order->user_id);
                if ($order->method == 1) // if the user paid with cash we add to his points
                {
                    $user->points += $order->total_pts;
                } else if ($order->method == 2) // if the user paid with points we reduce from his points
                {
                    $user->points -= $order->total_pts;
                }

                $user->save();
            }
           
            return redirect()->back()->with('message', $message);
        } else {
            return response()->json(['fail' => false, 'message' => 'Confirmation cannot be updated']);
        }
    }

    public function view_order($id)
    {

        $order         = Order::find($id);
        $orderProducts = OrderProducts::where('order_id', $order->id)->get();
        // $size          = Size::find('product_id' , '=' , $orderProducts->product_id)->get();

        // Retrieve all order products associated with the order
        $orderProducts = OrderProducts::where('order_id', '=', $id)->get();

        // Retrieve product images for each product
        $productImages = [];
        foreach ($orderProducts as $orderProduct) {
            $productId = $orderProduct->product_id;

            // Retrieve the product images for the current product
            $productImagesForProduct = ProductImage::where('product_id', '=', $productId)->get();
            if ($productImagesForProduct->isNotEmpty()) {
                // Add the product images to the array
                $productImages[] = [
                    'orderProduct' => $orderProduct,
                    'productImages' => $productImagesForProduct,
                ];
            }
        }

        return view('admin.order.view_order', compact('order', 'orderProducts', 'productImages'));
    }

    public function search_order(Request $request)
    {
        $Dates = session()->get('selected_date_range', []);

        $startDate = $Dates[0] ?? null;
        $endDate   = $Dates[1] ?? null;

        $query = $request->get('query');


        if ($startDate && $endDate) {
            $orders = Order::whereBetween('created_at', [$startDate, $endDate]);
        }

        $order = $orders->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('id', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->orWhere('phone', 'like', "%$query%")
                ->orWhere('f_name', 'like', "%$query%")
                ->orWhere('l_name', 'like', "%$query%");
        })->get();

        return response()->json($order);
    }
}
