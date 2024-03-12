<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class CartController extends Controller
{



    public function update_cart(Request $request, $id)
    {
        $cart = Cart::find($id);

        $cart->user_id    = $request->user_id;
        $cart->product_id = $request->product_id;

        $cart->save();

        return redirect()->back()->with('message', 'Cart Updated');
    }

    public function delete_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message', 'Cart Deleted');
    }
}
