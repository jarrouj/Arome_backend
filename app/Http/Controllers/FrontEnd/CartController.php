<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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



    // public function add_cart(Request $request, $id)
    // {
    //     // Validate the incoming request data
    //     $request->validate([
    //         'size' => 'required',
    //         'qty' => 'required|integer|min:1',
    //     ]);

    //     // Retrieve the product ID from the URL parameter
    //     $productId = $id;

    //     // Retrieve the size and quantity from the request body
    //     $size = $request->input('size');
    //     $quantity = $request->input('qty');

    //     // Check if the user is authenticated
    //     if (Auth::check()) {
    //         $user = Auth::user();

    //         // Create a new cart item for the authenticated user
    //         $cart = new Cart();
    //         $cart->user_id = $user->id;
    //         $cart->product_id = $productId;
    //         $cart->size = $size;
    //         $cart->quantity = $quantity;
    //         $cart->save();
    //     } else {
    //         // Get the existing cart array from the session
    //         $cart = session()->get('cart.products', []);

    //         // Add the product data to the cart array
    //         $cart[] = [
    //             'product_id' => $productId,
    //             'size' => $size,
    //             'quantity' => $quantity
    //         ];

    //         // Store the updated cart array in the session
    //         session()->put('cart.products', $cart);
    //     }

    //     return response()->json(['data' => $cart]);
    // }

    public function add_cart(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'size' => 'required',
            'qty' => 'required|integer|min:1',
        ]);

        try {
            // Retrieve the product ID from the URL parameter
            $productId = $id;

            // Retrieve the size and quantity from the request body
            $size = $request->input('size');
            $quantity = $request->input('qty');

            // Create a new cart item
            $cart = new Cart();
            $cart->user_id = 2;
            $cart->product_id = $productId;
            $cart->size_id = $size;
            $cart->qty = $quantity;
            $cart->save();

            return response()->json(['data' => $cart]);
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['error' => 'Failed to add item to cart'], 500);
        }
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

//     public function deleteOldCartItems()
// {
//     // Get the current date and time
//     $now = Carbon::now();

//     // Calculate the date and time 10 days ago
//     $tenDaysAgo = $now->subDays(10);

//     // Check if the user is authenticated
//     if (Auth::check()) {
//         // If authenticated, delete the old items from the user's cart in the database
//         Cart::where('user_id', Auth::user()->id)
//             ->where('created_at', '<', $tenDaysAgo)
//             ->delete();
//     } else {
//         // If user is not authenticated, remove the old items from the session cart
//         $cartProductIds = session()->get('cart.products', []);

//         // Filter out the old items
//         $updatedCartProductIds = array_filter($cartProductIds, function ($item) use ($tenDaysAgo) {
//             return Carbon::parse($item['created_at'])->greaterThanOrEqualTo($tenDaysAgo);
//         });

//         // Update the session with the filtered array
//         session()->put('cart.products', $updatedCartProductIds);
//     }
// }

public function deleteOldCartItems()
{
    $now = Carbon::now();

    $oneMinuteAgo = $now->subMinutes(1);

    if (Auth::check()) {
        Cart::where('user_id', Auth::user()->id)
            ->where('created_at', '<', $oneMinuteAgo)
            ->delete();
    } else {
        $cartProductIds = session()->get('cart.products', []);

        $updatedCartProductIds = array_filter($cartProductIds, function ($item) use ($oneMinuteAgo) {
            return Carbon::parse($item['created_at'])->greaterThanOrEqualTo($oneMinuteAgo);
        });

        session()->put('cart.products', $updatedCartProductIds);
    }
}

}
