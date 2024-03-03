<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductImageController extends Controller
{

    // public function add_product_image(Request $request)
    // {
    //     $productImage = new ProductImage;

    //     $img = $request->file('img');

    //     if ($img) {
    //         foreach ($img as $image) {
    //             $imgname = Str::random(20) . '.' . $image->getClientOriginalExtension();

    //             // Save the original image
    //             $image->move('productimage', $imgname);

    //             // Change the image quality using Intervention Image (optional)
    //             $img = Image::make(public_path('productimage/' . $imgname));
    //             $img->encode($img->extension, 10)->save(public_path('productimage/' . $imgname));

    //             // Assuming $productImage is an instance of your ProductImage model and 'img' is the attribute to store the image filename
    //             $productImage = new ProductImage();
    //             $productImage->img = $imgname;
    //             $productImage->save();
    //         }
    //     }
    // }


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
