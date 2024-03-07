<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductImageController extends Controller
{

    public function add_product_image(Request $request)
    {
        $product_id = $request->product_id;

        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $image) {
                $imgname = Str::random(20) . '.' . $image->getClientOriginalExtension();

                // Save the original image
                $image->move('productimage', $imgname);

                // Change the image quality using Intervention Image (optional)
                $img = Image::make(public_path('productimage/' . $imgname));
                $img->encode($img->extension, 10)->save(public_path('productimage/' . $imgname));

                // Save image details to database
                $productImage = new ProductImage();
                $productImage->product_id = $product_id;
                $productImage->img = $imgname;
                $productImage->save();
            }
        }

        return redirect()->back()->with('message', 'Images Added');
    }


    public function update_product_image(Request $request, $id)
    {
        $productImage = ProductImage::find($id);

        $img = $request->img;

        if ($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('productimage', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('productimage/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('productimage/' . $imgname));

            $productImage->img = $imgname;
        }

        $productImage->save();

        return redirect()->back()->with('message' , 'Image Updated');

    }

    public function  delete_product_image($id)
    {
        $productImage = ProductImage::find($id);

        $productImage->delete();

        return redirect()->back()->with('message' , 'Image Deleted');
    }
}
