<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show_cart(Request $request)
    {
        $products = Product::all();
        // Session::forget('cart.products');


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
        $productData = $request->only('product_id', 'size', 'qty');
        $productIds = (array) $productData['product_id'];
        $sizes = (array) $productData['size'];
        $quantities = (array) $productData['qty'];

        if (Auth::user()) {
            $user = Auth::user();

            foreach ($productIds as $index => $productId) {
                $cart = new Cart();

                $cart->user_id = $user->id;
                $cart->product_id = $productId;
                $cart->size = $sizes[$index];
                $cart->quantity = $quantities[$index];

                $cart->save();
            }
        } else {
            // Get the existing cart array from the session
            $cart = session()->get('cart.products', []);

            // Merge the existing cart array with the new product data
            foreach ($productIds as $index => $productId) {
                $cart[] = [
                    'product_id' => $productId,
                    'size' => $sizes[$index],
                    'quantity' => $quantities[$index]
                ];
            }

            // Store the updated cart array in the session
            session()->put('cart.products', $cart);
        }

        return response()->json(['data' => $cart]);
    }

    public function delete_cart($id)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // If authenticated, delete the product from the user's cart in the database
            $cart = Cart::where('user_id', Auth::user()->id)
                ->where('product_id', $id)
                ->delete();

                return response()->json(['data' => $cart], 200);

        } else {

            // If user is not authenticated, remove the product from the session cart
            $cartProductIds = session()->get('cart.products', []);

            // Filter out the product ID to be removed
            $updatedCartProductIds = array_filter($cartProductIds, function ($item) use ($id) {
                return $item['product_id'] != $id;
            });

            // Check if any items were removed
            if (count($cartProductIds) !== count($updatedCartProductIds)) {

                // Update the session with the filtered array
                session()->put('cart.products', $updatedCartProductIds);

                return response()->json(['data' => $updatedCartProductIds], 200);
            } else {
                return response()->json(['message' => 'Product not found in session cart'], 404);
            }
        }

    }

}
