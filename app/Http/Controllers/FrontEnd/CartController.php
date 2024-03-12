<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show_cart(Request $request)
    {
        $products = Product::all();

        if (Auth::user()) {
            // $cart = Cart::latest()->paginate(10);
            $user = Auth::user()->id;

            return response()->json([
                // 'cart' => $cart,
                'products' => $products,
                'user' => $user,
            ]);
        } else {
            $cartProductIds = $request->session()->get('cart.products', []);

            return response()->json([
                'cartProductIds' => $cartProductIds
            ]);
        }
    }

    public function add_cart(Request $request)
    {
        return $this->api_add_cart($request);
    }

    private function api_add_cart(Request $request)
    {
        if (Auth::user()) {
            $cart             = new Cart();
            $cart->user_id    = Auth::user()->id;
            $cart->product_id = $request->product_id;
            $cart->save();
        } else {
            $product_id     = $request->product_id;

            $cart   = session()->get('cart.products', []);

            $cart[] = $product_id;

            session()->put('cart.products', $cart);
        }

        return response()->json(['data' => $cart]);
    }

    public function delete_cart(Request $request)
{
    $id = $request->input('product_id');

    if (Auth::check()) {
        // If user is authenticated, delete from the database
        $UserCart = Cart::where('user_id', Auth::user()->id)
                        ->where('product_id', $id)
                        ->delete();

        return response()->json(['message' => 'Cart item deleted'], 200);
    } else {
        $productIds = session()->get('cart.products', []);
        $updatedProductIds = [];

        // Loop through products in the session
        foreach ($productIds as $productId) {
            // If product ID matches, skip it
            if ($productId == $id) {
                continue;
            }
            // Otherwise, add it to the updated array
            $updatedProductIds[] = $productId;
        }

        // Update session with the updated product IDs
        session()->put('cart.products', $updatedProductIds);

        // Check if product was found and deleted from the session
        if (count($productIds) !== count($updatedProductIds)) {
            return response()->json(['message' => 'Product removed from session cart'], 200);
        } else {
            return response()->json(['message' => 'Product not found in session cart'], 404);
        }
    }
}





}
