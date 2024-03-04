<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CartController extends Controller
{
    public function show_cart()
    {
        $cart          = Cart::latest()->paginate(10);
        $product       = Product::where('id' , '=' , $cart->product_id)->get();
        $productImage  = ProductImage::where('product_id' , '=' , $product->id)->first();
        // $size          = Size::where('product_id' , '=' , $product->id);

        return view('admin.cart.show_cart' , compact('cart' , 'product' , 'productImage'));
    }

    public function add_cart(Request $request)
    {
        $cart = new Cart;

        $cart->user_id    = $request->user_id;
        $cart->product_id = $request->product_id;

        $cart->save();

        return redirect()->back()->with('message' , 'Cart Added');
    }

    public function update_cart(Request $request , $id)
    {
        $cart = Cart::find($id);

        $cart->user_id    = $request->user_id;
        $cart->product_id = $request->product_id;

        $cart->save();

        return redirect()->back()->with('message' , 'Cart Updated');

    }

    public function delete_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message' , 'Cart Deleted');
    }
}
