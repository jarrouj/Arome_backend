<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\Smell;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function show_product()
    {
        $product  = Product::latest()->paginate(10);
        $category = Category::all();
        $tag      = Tag::all();

        return view('admin.product.show_product', compact('product', 'category', 'tag'));
    }

    public function add_product(Request $request)
    {
        $product      = new Product;
        $productImage = new ProductImage;
        $size         = new Size;
        $smell         = new Smell;

        //Product Data
        $product->category_id   = $request->category_id;

        //Adding Category Name threw the requested category_id
        $catName                = Category::find($request->category_id);
        $product->category_name = $catName->name;

        $product->name          = $request->name;
        $product->description   = $request->description;
        $product->tag_id        = $request->tag_id;

        $product->save();

        //Product Image Data
        $productImage->product_id = $product->id;

        $img = $request->file('img');

        if ($img)
        {
            foreach ($img as $image) {
                // Generate a unique filename for each image
                $imgname = Str::random(20) . '.' . $image->getClientOriginalExtension();

                // Save the original image
                $image->move('productimage', $imgname);

                // Change the image quality using Intervention Image (optional)
                $img = Image::make(public_path('productimage/' . $imgname));
                $img->encode($img->extension, 10)->save(public_path('productimage/' . $imgname));

                $productImage = new ProductImage();

                $productImage->img = $imgname;

                $productImage->product_id = $product->id;

                $productImage->save();
            }
        }


        // Size Data

        $size->size       = $request->size;
        $size->points     = $request->points;
        $size->price      = $request->price;
        $size->qty_tq     =  $request->qty_tq;
        $size->product_id = $product->id;

        $size->save();

        //Smell Data

        $smell->smell     = $request->smell;
        $smell->product_id = $product->id;

        $smell->save();

        return redirect()->back()->with('message', 'Product Added');
    }

    public function update_product($id)
    {
        $product      = Product::find($id);
        $productImage = ProductImage::where('product_id', $id)->get();
        $size         = Size::where('product_id', $id)->get();
        $smell         = Smell::where('product_id', $id)->get();
        $category     = Category::all();
        $tag          = Tag::all();

        return view('admin.product.update_product', compact('product', 'category', 'tag' , 'productImage' , 'size' , 'smell'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);

        //Product Data
        $product->category_id   = $request->category_id;

        //Adding Category Name threw the requested category_id
        $catName                = Category::find($request->category_id);
        $product->category_name = $catName->name;

        $product->name          = $request->name;
        $product->description   = $request->description;
        $product->tag_id        = $request->tag_id;

        $product->save();

        return redirect('/admin/show_product')->with('message', 'Product Updated');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);


        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted');
    }
}