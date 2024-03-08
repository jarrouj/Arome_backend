<?php

namespace App\Http\Controllers\Admin;

use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class offerController extends Controller
{
    public function show_offer()
    {
        $offer    = Offer::latest()->paginate(10);
        $product  = Product::all();

        return view('admin.offer.show_offer' , compact('offer' , 'product' ));

    }

    public function add_offer()
    {
        $products = Product::all();
        $category = Category::all();

        // Group images by product_id and retrieve the first image for each product
        $productImages = ProductImage::all()->groupBy('product_id')->map(function ($images) {
          return $images->first();
        });

        return view('admin.offer.add_offer' , compact('products' , 'productImages' , 'category'));
    }

    public function add_offer_confirm(Request $request)
    {
        $offer = new offer;

        $offer->product_id = $request->product_id;
        $offer->active     = $request->active;
        $offer->price      = $request->price;

        $offer->save();

        return redirect('/admin/show_offer')->with('message' , 'Offer Added');
    }
}
