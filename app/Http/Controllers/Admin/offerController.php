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


                if($img)
                {
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


            if($img)
            {
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
        $products = Product::all();
        $category = Category::all();

        // Group images by product_id and retrieve the first image for each product
        $productImages = ProductImage::all()->groupBy('product_id')->map(function ($images) {
            return $images->first();
        });

        return view('admin.offer.update_offer', compact('products', 'productImages', 'category'));
    }

    public function update_offer_confirm(Request $request , $id)
    {

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

        if ($offer->all_products !== 0 ) {

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

    


}
