<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Cart;
use App\Models\Size;
use App\Models\User;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Promo;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\SendMailOnOrder;
use App\Models\OrderProducts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    private function api_add_order(Request $request)
    {
        if (Auth::user())
        {
            $user = Auth::user();

            // Create a new order instance
            $order = new Order();
            $order->user_id   = $user->id;
            $order->f_name    = $user->f_name;
            $order->l_name    = $user->l_name;
            $order->address   = $user->address;
            $order->email     = $user->email;
            $order->phone     = $user->phone;


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
            Mail::to('georgesjarrouj3@gmail.com')->send(new SendMailOnOrder($order , $orderProduct));

        } else {


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

            $orderProducts = [];


            foreach ($cartProductIds as $cartItem) {
                $productId = $cartItem['product_id'];
                $sizeId = $cartItem['size'];
                $qty = $cartItem['quantity'];


                // Retrieve the size information
                $size = Size::find($sizeId);

                if ($size) {
                    // Initialize variables to store total price and points
                    $totalPrice = $size->price * $qty;
                    $totalPts = $size->points * $qty;

                    // Check if the product has an active offer
                    $offer = Offer::where('product_id', $productId)->where('active', 1)->first();

                    if ($offer) {
                        // Calculate the discount based on the percentage
                        $discountPercentage = $offer->price / 100;
                        $discountAmount = $totalPrice * $discountPercentage;

                        // Apply the discount to the total price
                        $totalPrice -= $discountAmount;
                    }

                    // Add the total price to the total USD
                    $totalUSD += $totalPrice;

                    // Sum the points
                    $totalPoints += $totalPts;

                    // Create a new OrderProduct instance
                    $newOrderProduct = new OrderProducts();
                    $newOrderProduct->order_id = $order->id;
                    $newOrderProduct->product_id = $productId;
                    $newOrderProduct->size_id = $sizeId;
                    $newOrderProduct->qty = $qty;




                    $newOrderProduct->save();

                    $orderProducts[] = $newOrderProduct;


                }
            }




            //   $orders = [
            //     'fname' => $order->fname,
            //     'lname' => $order->lname,
            //     'address' => $order->address,
            //     'email' => $order->email,
            //     'phone' => $order->phone,
            //     'total_lbp' => $order->total_lbp,
            //     'total_usd' => $totalUSD,
            //     'total_points' => $totalPoints,
            // ];



            Mail::to('georgesjarrouj3@gmail.com')->send(new SendMailOnOrder($order , $orderProducts));

            $promoCode = Promo::where('promo', '=', $request->promo)->first();

            if ($promoCode) {
                // Check if the promo exists and is active

                if ($promoCode->active == 1) {

                    $order->promo = $request->promo;

                    // Calculate the discount based on the percentage
                    $discountPercentage = 1 - $promoCode->discount / 100;
                    $discountAmount = $totalUSD * $discountPercentage;

                    $order->total_usd = $discountAmount;
                } else {
                    $order->total_usd = $totalUSD;
                }
            }

            if (!$promoCode) //if promo not found
            {
                $order->total_usd = $totalUSD;
            }


            $order->total_pts = $totalPoints;
            $order->save();
        }


        return response()->json(['order' => $order]);
    }




    public function add_order(Request $request)
    {
        return $this->api_add_order($request);
    }


}
