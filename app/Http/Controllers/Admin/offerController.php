<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class offerController extends Controller
{
    public function show_offer()
    {
        $offer    = Offer::latest()->paginate(10);
        $product  = Product::all();

        return view('admin.offer.show_offer', compact('offer', 'product'));
    }

    public function add_offer()
    {
        $products = Product::all();
        $category = Category::all();

        // Group images by product_id and retrieve the first image for each product
        $productImages = ProductImage::all()->groupBy('product_id')->map(function ($images) {
            return $images->first();
        });

        return view('admin.offer.add_offer', compact('products', 'productImages', 'category'));
    }

    public function add_offer_confirm(Request $request)
    {
        // Check if product_id is not null
        if (!is_null($request->product_id) && is_array($request->product_id)) {

            foreach ($request->product_id as $product_id) {

                $offer = new Offer();

                $img = $request->img;


                if ($img) {
                    $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

                    //Save the original image
                    $request->img->move('offer', $imgname);

                    //change the image quality using Intervention Image
                    $img = Image::make(public_path('offer/' . $imgname));

                    $img->encode($img->extension, 10)->save(public_path('offer/' . $imgname));

                    $offer->img = $imgname;
                }

                $offer->name   = $request->name;
                $offer->all_products = $request->all_products;
                $offer->price  = $request->price;
                $offer->active = $request->active;

                $offer->product_id = $product_id;

                $offer->save();
            }
        } else { //if all_product is checked
            $offer = new Offer();

            $img = $request->img;


            if ($img) {
                $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

                //Save the original image
                $request->img->move('offer', $imgname);

                //change the image quality using Intervention Image
                $img = Image::make(public_path('offer/' . $imgname));

                $img->encode($img->extension, 10)->save(public_path('offer/' . $imgname));

                $offer->img = $imgname;
            }

            $offer->name   = $request->name;
            $offer->all_products = $request->all_products;
            $offer->price  = $request->price;
            $offer->active = $request->active;

            $offer->save();
        }

        return redirect('/admin/show_offer')->with('success', 'Offer created');
    }

    public function update_offer($id)
    {
        $offer = Offer::find($id);

        // Find all product IDs with the same offer name
        $productIds = Offer::where('name', $offer->name)->pluck('product_id')->toArray();

        // Fetch products and category
        $products = Product::all();
        $category = Category::all();

        // Group images by product_id and retrieve the first image for each product
        $productImages = ProductImage::all()->groupBy('product_id')->map(function ($images) {
            return $images->first();
        });

        $selectedProductIds = [];

        return view('admin.offer.update_offer', compact('products', 'productImages', 'category', 'offer', 'productIds', 'selectedProductIds'));
    }




    public function update_offer_confirm(Request $request, $id)
    {
        // Retrieve the existing offer
        $existingOffer = Offer::find($id);

        // Retrieve offers with the same name
        $offersWithSameName = Offer::where('name', $existingOffer->name)->get();

        // Check if "all_products" is selected
        if ($request->all_products === 0) {
            // Delete all offers with the same name
            foreach ($offersWithSameName as $offerWithSameName) {
                $offerWithSameName->delete();
            }

            // Create a new offer with "all_products" value
            $newOffer = new Offer();
            $newOffer->name = $request->name;
            $newOffer->product_id = null;
            $newOffer->price = $request->price;
            $newOffer->active = $request->active;
            $newOffer->all_products = $request->all_products;
            $newOffer->img = $existingOffer->img; // Copy image if necessary
            $newOffer->save();

            return redirect('/admin/show_offer')->with('success', 'Offer updated');
        }

        // Convert single product_id to an array
        $requestProductIds = is_array($request->product_id) ? $request->product_id : [$request->product_id];

        foreach ($offersWithSameName as $offerWithSameName) {
            // Retrieve existing product ID for the current offer with the same name
            $existingProductId = $offerWithSameName->product_id;

            // Check if the existing product ID is not present in the requested product IDs
            if (!in_array($existingProductId, $requestProductIds)) {
                // Delete the offer if it has a missing product ID
                $offerWithSameName->delete();
            }
        }

        // Update the existing offer
        $existingOffer->name = $request->name;
        $existingOffer->price = $request->price;
        $existingOffer->all_products = $request->all_products;
        $existingOffer->active = $request->active;

        $img = $request->img;
        if ($img) {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();
            // Save the original image
            $request->img->move('offer', $imgname);
            // Change the image quality using Intervention Image
            $img = Image::make(public_path('offer/' . $imgname));
            $img->encode($img->extension, 10)->save(public_path('offer/' . $imgname));
            $existingOffer->img = $imgname;
        }

        $existingOffer->save();

        // Add new offers with the same name for new product IDs
        $existingProductId = $existingOffer->product_id; // Update the existing product ID
        $newProductIds = array_diff($requestProductIds, [$existingProductId]);
        foreach ($newProductIds as $newProductId) {
            $newOffer = new Offer();
            $newOffer->name = $existingOffer->name;
            $newOffer->product_id = $newProductId;
            // Copy other attributes if necessary
            $newOffer->price = $existingOffer->price;
            $newOffer->all_products = $existingOffer->all_products;
            $newOffer->active = $existingOffer->active;
            $newOffer->img = $existingOffer->img; // Copy image if necessary
            $newOffer->save();
        }

        return redirect('/admin/show_offer')->with('success', 'Offer updated');
    }


    public function delete_offer($id)
    {
        $offer = Offer::find($id);


        $offerName = $offer->name;

        // Delete all offers with the same name
        Offer::where('name', $offerName)->delete();

        $offer->delete();

        return redirect()->back()->with('message', 'Offer deleted');
    }

    public function view_offer($id)
    {
        $offer = Offer::find($id);
        $category = Category::all();
        $productImages = ProductImage::all()->groupBy('product_id')->map(function ($images) {
            return $images->first();
        });

        $products = [];

        if ($offer->all_products !== 1) {

            // Fetch product IDs associated with the offer name
            $productIds = Offer::where('name', $offer->name)->pluck('product_id')->toArray();

            // Retrieve products based on the fetched IDs
            $products = Product::whereIn('id', $productIds)->latest()->paginate(10);
        } else {
            // If all_product is 0, fetch all products
            $products = Product::latest()->paginate(10);
        }
        // dd($products);

        return view('admin.offer.view_offer', compact('offer', 'products', 'productImages', 'category'));
    }

    public function search_product_offer(Request $request)
    {
        $query = $request->get('query');

        $offerProducts = Product::where('name' , 'like' , "%$query%")->get();

        return response()->json($offerProducts);

    }

    public function search_offer(Request $request)
    {
        $query = $request->get('query');

        $offers = Offer::where('name' , 'like' , "%$query%")->get();

        return response()->json($offers);

    }
}
