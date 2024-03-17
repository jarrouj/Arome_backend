<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Cart;
use App\Models\Size;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderProducts;
use App\Http\Controllers\Controller;
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
            // Save the order
            $order->save();

            // Get the cart items from session
            $cartProductIds = session()->get('cart.products', []);

            // Calculate the total USD price for the order
            $totalUSD = 0;

            $totalPoints = 0;

            foreach ($cartProductIds as $cartItem) {
                $productId = $cartItem['product_id'];
                $sizeId = $cartItem['size'];
                $qty = $cartItem['quantity'];

                // Retrieve the size information
                $size = Size::find($sizeId);

                if ($size) {
                    // Calculate the total price for the current order product based on the size price and quantity
                    $totalPrice  = $size->price * $qty;
                    $totalPts    = $size->points * $qty;

                    // Add the total price to the total USD
                    $totalUSD += $totalPrice;

                    //Sum the points
                    $totalPoints += $totalPts;


                    // Create a new OrderProduct instance
                    $newOrderProduct = new OrderProducts();
                    $newOrderProduct->order_id = $order->id;
                    $newOrderProduct->product_id = $productId;
                    $newOrderProduct->size_id = $sizeId;
                    $newOrderProduct->qty = $qty;

                    $newOrderProduct->save();
                }
            }

            // Update the total_usd attribute of the Order model
            $order->total_usd = $totalUSD;
            $order->total_pts = $totalPoints;
            $order->save();
        }

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
