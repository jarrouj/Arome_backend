<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show_order()
    {
        $order = Order::latest()->paginate(10);
        $users = User::all();

        return view('admin.order.show_order' , compact('order' , 'users'));
    }

    public function add_order($lol)
    {
        // $order = new Order;

        // $user = User::find($request->user_id);

        // //Get Data from the user Table
        // $order->user_id    = $user->id;
        // $order->f_name     = $user->f_name;
        // $order->l_name     = $user->l_name;
        // $order->address    = $user->address;

        // $order->email      = $user->email;
        // $order->phone      = $user->phone;

        // $order->paid       = $request->paid;
        // $order->method     = $request->method;
        // $order->delivered  = $request->delivered;
        // $order->registered = $request->registered;
        // $order->offer      = $request->offer;
        // $order->total_lbp  = $request->total_lbp;
        // $order->total_pts  = $request->total_pts;
        // $order->total_usd  = $request->total_usd;

        // $order->save();

        // return redirect()->back()->with('message' , 'Order Added');

        $order = new order;

        $order->f_name = $lol['f_name'];
        $order->l_name = $lol['l_name'];

        return $lol;

        // $order = new order;

        // if (Auth::user())
        // {
        //     $user = user::find(Auth::id());

        //     $order->user_id    = $user->id;
        //     $order->f_name     = $user->f_name;
        //     $order->l_name     = $user->l_name;
        //     $order->address    = $user->address;
        //     $order->email      = $user->email;
        //     $order->phone      = $user->phone;

        //     $order->paid       = $request->paid;
        //     $order->method     = $request->method;
        //     $order->delivered  = $request->delivered;
        //     $order->registered = $request->registered;
        //     $order->offer      = $request->offer;
        //     $order->total_lbp  = $request->total_lbp;
        //     $order->total_pts  = $request->total_pts;
        //     $order->total_usd  = $request->total_usd;

        //     return response()->json($order);

        // }
        // else
        // {
        //     return false;
        // }
    }

    public function api_add_order(Request $request)
    {
        $lol = [
            "f_name" => $request->f_name,
            "l_name" => $request->l_name,
        ];

        return $this->add_order($lol);
    }

    public function update_order($id)
    {
        $order  = Order::find($id);
        $users = User::all();

        return view('admin.order.update_order' , compact('order' , 'users'));
    }

    public function update_order_confirm(Request $request, $id)
    {
        $order = Order::find($id);

        $user = User::find($request->user_id);

        //Get Data from the user Table
        $order->user_id    = $user->id;
        $order->f_name     = $user->f_name;
        $order->l_name     = $user->l_name;
        $order->address    = $user->address;
        $order->email      = $user->email;
        $order->phone      = $user->phone;

        $order->paid       = $request->paid;
        $order->method     = $request->method;
        $order->delivered  = $request->delivered;
        $order->registered = $request->registered;
        $order->offer      = $request->offer;
        $order->total_lbp  = $request->total_lbp;
        $order->total_pts  = $request->total_pts;
        $order->total_usd  = $request->total_usd;

        $order->save();

        return redirect('/admin/show_order')->with('message', 'Order Updated');
    }


    public function delete_order($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->back()->with('message' , 'Order Deleted');
    }

    public function update_status(Request $request, $id)
    {
        // Find the order by ID
        $order = Order::find($id);

        // Check if confirmation is nullable and set the status
        if ($order->confirm === null) {
            // Update status based on the button clicked
            $order->confirm = $request->conf;
            $order->save();

            // Set message based on the value of $request->conf
            $message = $request->conf == 1 ? 'Order Confirmed' : 'Order Canceled';

            return redirect()->back()->with('message', $message);
        } else {
            return response()->json(['fail' => false, 'message' => 'Confirmation cannot be updated']);
        }
    }

}
