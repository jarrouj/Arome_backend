<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function add_transaction()
    {
        if (Auth::user())
        {
           $transaction = new Transaction();

           $user = Auth::user();
           $order = Order::where('user_id' , '=' , $user->id)->latest();

           $transaction->user_id = $user->id;
           $transaction->f_name  = $user->f_name;
           $transaction->l_name  = $user->l_name;
           $transaction->email   = $user->email;
           $transaction->phone   = $user->phone;
           $transaction->addsub  = $order->method; //if method= 1 then cash =>we add the pts else the client paid with points then we remove points

           if($order->method == 1)
           {
            $transaction->points += $order->total_pts;
           }
           else
           {
            $transaction->points -= $order->total_pts;
           }

           $transaction->save();

        }
        else//user not auth
        {
            $userInfo = session()->get('order.userinfo', []);

            $transaction = new Transaction();

            $order = Order::where('email', '=', $userInfo['email'])->latest()->first();

            $transaction->f_name  = $userInfo['f_name'];
            $transaction->l_name  = $userInfo['l_name'];
            $transaction->email   = $userInfo['email'];
            $transaction->phone   = $userInfo['phone'];
            $transaction->addsub  = $order->method; //if method= 1 then cash =>we add the pts else the client paid with points then we remove points

            if($order->method == 1)
            {
             $transaction->points += $order->total_pts;
            }
            else
            {
             $transaction->points -= $order->total_pts;
            }

            $transaction->save();

        }

        return response()->json(['transaction' => $transaction]);
    }


}
