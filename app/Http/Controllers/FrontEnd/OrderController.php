<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    private function api_add_order(Request $request)
{
    if (Auth::user()) {
        $user = Auth::user();

        // Create a new order instance
        $order = new Order();
        $order->user_id   = $user->id;
        $order->f_name    = $user->f_name;
        $order->l_name    = $user->l_name;
        $order->address   = $user->address;
        $order->email     = $user->email;
        $order->phone     = $user->phone;
        $order->total_lbp = $request->total_lbp;
        $order->total_pts = $request->total_pts;
        $order->total_usd = $request->total_usd;

        $order->save();

        // Get the cart items for the authenticated user
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Create OrderProducts for each cart item
        foreach ($cartItems as $cartItem) {
            $orderProduct = new OrderProducts();
            $orderProduct->order_id   = $order->id;
            $orderProduct->product_id = $cartItem->product_id;
            // $orderProduct->offer      = $order->offer;
            $orderProduct->save();
        }
    } else {
        // Store user data in session if not authenticated
        session()->put('order.userinfo', [
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email'  => $request->email,
            'phone'  => $request->phone

        ]);

        // Create a new order instance
        $order = new Order();
        $order->f_name    = $request->f_name;
        $order->l_name    = $request->l_name;
        $order->address   = $request->address;
        $order->email     = $request->email;
        $order->phone     = $request->phone;
        $order->total_lbp = $request->total_lbp;
        $order->total_pts = $request->total_pts;
        $order->total_usd = $request->total_usd;
        // Save the order
        $order->save();


        // Get the cart items from session
        $cartProductIds = session()->get('cart.products', []);

        // Create OrderProducts for each cart item
        foreach ($cartProductIds as $productId) {
            $orderProduct = new OrderProducts();
            $orderProduct->order_id   = $order->id;
            $orderProduct->product_id = $productId;
            // $orderProduct->offer      = $order->offer;
            $orderProduct->save();
        }
    }

    // Update order details
    // $order->total_lbp = $request->total_lbp;
    // $order->total_pts = $request->total_pts;
    // $order->total_usd = $request->total_usd;
    // $order->save();

    return response()->json(['order' => $order]);
}


    public function add_order(Request $request)
    {
        return $this->api_add_order($request);
    }


    public function get_userInfo()
{
    $userInfo = session()->get('order.userinfo', []);

    return response()->json(['user_data' => $userInfo]);
}


}
